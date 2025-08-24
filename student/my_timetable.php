<?php 
session_start();
include "connection.php";
if(isset($_SESSION["user_name"])){
    $qu = mysqli_query($con, "SELECT * FROM table_user WHERE user_name='".mres($con, $_SESSION["user_name"])."'");
    $row = mysqli_fetch_array($qu);
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_name"] = $row["user_name"];
    $_SESSION["category"] = $row["top_category_id"];
}
?>
<?php


if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Get student's subject rankings with study hours needed (harder subjects need more time)
$ranked_subjects = mysqli_query($con, "
    SELECT c.*, r.difficulty_level, 
           CASE 
               WHEN r.difficulty_level = 5 THEN 3  -- Very Hard: 3 sessions
               WHEN r.difficulty_level = 4 THEN 2  -- Hard: 2 sessions
               ELSE 1                             -- Others: 1 session
           END as required_sessions
    FROM table_student_subject_ranking r
    JOIN table_category c ON r.category_id = c.category_id
    WHERE r.user_id = ".mres($con, $_SESSION["user_id"])."
    ORDER BY r.difficulty_level DESC
");

// Initialize timetable with 5 weekdays and 5 time slots per day
$time_slots = [
    'Morning (8-10)' => array_fill(0, 5, 'Free time'),
    'Late Morning (10-12)' => array_fill(0, 5, 'Free time'),
    'Afternoon (1-3)' => array_fill(0, 5, 'Free time'),
    'Late Afternoon (3-5)' => array_fill(0, 5, 'Free time'),
    'Evening (5-7)' => array_fill(0, 5, 'Free time')
];

// Create subject pool with required sessions
$subject_pool = [];
while($row = mysqli_fetch_array($ranked_subjects)) {
    for($i = 0; $i < $row['required_sessions']; $i++) {
        $subject_pool[] = $row;
    }
}

// Distribute subjects intelligently
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$time_slot_keys = array_keys($time_slots);
$current_day = 0;
$current_slot = 0;

foreach($subject_pool as $subject) {
    // Find next available slot
    $placed = false;
    $attempts = 0;
    
    while(!$placed && $attempts < count($time_slots) * count($days)) {
        // Try current slot first
        if($time_slots[$time_slot_keys[$current_slot]][$current_day] === 'Free time') {
            $time_slots[$time_slot_keys[$current_slot]][$current_day] = 
                $subject['category_name'] . "<br><small>(" . getDifficultyText($subject['difficulty_level']) . ")</small>";
            $placed = true;
            
            // Move to next slot/day
            $current_slot++;
            if($current_slot >= count($time_slots)) {
                $current_slot = 0;
                $current_day = ($current_day + 1) % count($days);
            }
        } else {
            // Slot taken, try next one
            $current_slot++;
            if($current_slot >= count($time_slots)) {
                $current_slot = 0;
                $current_day = ($current_day + 1) % count($days);
            }
        }
        $attempts++;
    }
    
    if(!$placed) {
        // If we couldn't place it after many attempts, just find any free slot
        foreach($time_slots as $slot_name => &$days) {
            foreach($days as &$day) {
                if($day === 'Free time') {
                    $day = $subject['category_name'] . "<br><small>(" . getDifficultyText($subject['difficulty_level']) . ")</small>";
                    $placed = true;
                    break 2;
                }
            }
        }
    }
}

// Ensure no two hard subjects are back-to-back
foreach($days as $day_index => $day_name) {
    for($i = 0; $i < count($time_slot_keys) - 1; $i++) {
        $current = $time_slots[$time_slot_keys[$i]][$day_index];
        $next = $time_slots[$time_slot_keys[$i+1]][$day_index];
        
        if(strpos($current, '(Very Hard)') !== false && strpos($next, '(Hard)') !== false) {
            // Swap with a lighter subject if possible
            for($j = $i+2; $j < count($time_slot_keys); $j++) {
                if(strpos($time_slots[$time_slot_keys[$j]][$day_index], '(Medium)') !== false || 
                   strpos($time_slots[$time_slot_keys[$j]][$day_index], '(Easy)') !== false) {
                    $temp = $time_slots[$time_slot_keys[$i+1]][$day_index];
                    $time_slots[$time_slot_keys[$i+1]][$day_index] = $time_slots[$time_slot_keys[$j]][$day_index];
                    $time_slots[$time_slot_keys[$j]][$day_index] = $temp;
                    break;
                }
            }
        }
    }
}

// Add breaks after intensive sessions
foreach($days as $day_index => $day_name) {
    for($i = 0; $i < count($time_slot_keys); $i++) {
        if(strpos($time_slots[$time_slot_keys[$i]][$day_index], '(Very Hard)') !== false ||
           strpos($time_slots[$time_slot_keys[$i]][$day_index], '(Hard)') !== false) {
            // If next slot isn't free, make it a break
            if($i+1 < count($time_slot_keys) && 
               $time_slots[$time_slot_keys[$i+1]][$day_index] !== 'Free time') {
                $time_slots[$time_slot_keys[$i+1]][$day_index] = '<em>Break</em>';
            }
        }
    }
}
?>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Optimized Study Timetable</div>
        <div class="panel-body">
            <p>This timetable is optimized based on your subject difficulty ratings:</p>
            <ul>
                <li>Very Hard subjects get 3 study sessions per week</li>
                <li>Hard subjects get 2 study sessions per week</li>
                <li>Other subjects get 1 study session per week</li>
                <li>Breaks are added after intensive study sessions</li>
                <li>No back-to-back hard subjects</li>
            </ul>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Time Slot</th>
                            <?php foreach($days as $day): ?>
                            <th><?php echo $day; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($time_slots as $slot => $days): ?>
                        <tr>
                            <td><?php echo $slot; ?></td>
                            <?php foreach($days as $day): ?>
                            <td><?php echo $day; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="alert alert-info">
                <strong>Study Tips:</strong>
                <ul>
                    <li>Schedule your most challenging subjects during your peak energy hours</li>
                    <li>Take short breaks between intensive study sessions</li>
                    <li>Use free time for review or lighter study activities</li>
                </ul>
            </div>
            
            <a href="rank_subjects.php" class="btn btn-primary">Update Subject Rankings</a>
        </div>
    </div>
</div>

<?php 
function getDifficultyText($level) {
    $levels = [
        1 => 'Very Easy',
        2 => 'Easy',
        3 => 'Medium',
        4 => 'Hard',
        5 => 'Very Hard'
    ];
    return $levels[$level] ?? '';
}

include "footer.php"; 
?>