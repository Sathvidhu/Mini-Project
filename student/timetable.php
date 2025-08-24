<?php
$conn = new mysqli("localhost", "root", "", "smartstudy");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Get email of the student (example: from session or request)
$email = "student@example.com"; // ← Replace with dynamic email if needed

// 2. Get student's marks from registration
$sql = "SELECT physicsmark, chemistrymark, mathsmark, biologymark 
        FROM registration WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("No student found with email: $email");
}

$row = $result->fetch_assoc();

// 3. Prepare subject marks
$subjects = [
    "Physics" => $row['physicsmark'],
    "Chemistry" => $row['chemistrymark'],
    "Maths" => $row['mathsmark'],
    "Biology" => $row['biologymark']
];

// 4. Calculate inverse weights (low marks = more repetitions)
$weights = [];
$inverse_total = 0;

foreach ($subjects as $subject => $mark) {
    $weight = 100 - $mark;  // Inverse logic
    $weights[$subject] = $weight;
    $inverse_total += $weight;
}

// 5. Calculate how many days each subject should appear
$subject_days = [];
foreach ($weights as $subject => $weight) {
    $subject_days[$subject] = round(($weight / $inverse_total) * 7);
}

// 6. Adjust to exactly 7 days
while (array_sum($subject_days) != 7) {
    $diff = 7 - array_sum($subject_days);
    foreach ($subject_days as $subject => &$count) {
        if ($diff == 0) break;
        $count += ($diff > 0) ? 1 : -1;
        $diff += ($diff > 0) ? -1 : 1;
    }
}

// 7. Create timetable array and shuffle
$timetable = [];
foreach ($subject_days as $subject => $count) {
    for ($i = 0; $i < $count; $i++) {
        $timetable[] = $subject;
    }
}
shuffle($timetable);

// 8. Define week days
$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

// 9. Remove old entries for this student
$conn->query("DELETE FROM timetable WHERE email='$email'");

// 10. Insert new timetable
for ($i = 0; $i < 7; $i++) {
    $day = $days[$i];
    $subject = $timetable[$i];
    $conn->query("INSERT INTO timetable (email, day, subject, start_time, end_time)
                  VALUES ('$email', '$day', '$subject', '19:00:00', '21:30:00')");
}

echo "Timetable generated successfully for $email!";
$conn->close();
?>
