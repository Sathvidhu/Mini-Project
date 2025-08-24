<?php
session_start();
$conn = new mysqli("localhost", "root", "", "smartstudy"); // change DB if needed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['email'])) {
    die("No session email found. Please login first.");
}

$email = $_SESSION['email'];
$fname = $student['fname'];
$student = $conn->query("SELECT * FROM registration WHERE email='$email'")->fetch_assoc();

if (!$student) {
    die("Student not found in database.");
}

// Subjects + marks
$subjects = ["physics","chemistry","biology","maths"];
$marks = [];
foreach ($subjects as $s) {
    $marks[$s] = $student[$s];
}

// Difficulty levels
$minMark = min($marks);
$maxMark = max($marks);
$difficulty = [];
foreach ($marks as $sub=>$m) {
    if ($m == $minMark) $difficulty[$sub] = "Hard";
    elseif ($m == $maxMark) $difficulty[$sub] = "Easy";
    else $difficulty[$sub] = "Moderate";
}

// Helper: subtract minutes from school start
function subtractTime($timeStr, $minutes) {
    $time = new DateTime($timeStr);
    $time->modify("-{$minutes} minutes");
    return $time->format("H:i");
}

// Sessions
$sessions_weekend = [
    ["10:00","11:30"],["12:00","13:30"],
    ["17:00","18:30"],["19:00","20:30"],["21:00","22:30"]
];
$morning_start = subtractTime($student['time1'], 90);
$morning_end   = $student['time1'];
$sessions_weekday = [
    [$morning_start, $morning_end],
    ["17:00","18:30"],["19:00","20:30"],["21:00","22:30"]
];

// Generate timetable
$timetable = [];
$days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];

foreach ($days as $day) {
    $slots = ($day=="Saturday"||$day=="Sunday") ? $sessions_weekend : $sessions_weekday;
    $count = count($slots);
    for ($i=0; $i<$count; $i++) {
        if ($i==0 || $i==$count-1) {
            $subj = array_search("Easy",$difficulty) ?: "maths";
        } else {
            // rotate other subjects
            $subj = $subjects[$i % count($subjects)];
        }
        $timetable[] = [
            "day"=>$day,
            "start"=>$slots[$i][0],
            "end"=>$slots[$i][1],
            "subject"=>$subj,
            "level"=>$difficulty[$subj]
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Study Timetable</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        .container { width: 90%; margin: 30px auto; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #007bff; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
        .easy { color: green; font-weight: bold; }
        .moderate { color: orange; font-weight: bold; }
        .hard { color: red; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h2>Weekly Study Timetable for <?php echo htmlspecialchars($student['fname']); ?></h2>
    <table>
        <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Difficulty</th>
        </tr>
        <?php foreach ($timetable as $row): ?>
            <tr>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['start']." - ".$row['end']; ?></td>
                <td><?php echo ucfirst($row['subject']); ?></td>
                <td class="<?php echo strtolower($row['level']); ?>">
                    <?php echo $row['level']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
