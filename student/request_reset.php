<?php
// request_reset.php
$conn = mysqli_connect("localhost", "root", "", "smartstudy");

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['student_id'];

// Prevent multiple requests within 24 hours
$check = $conn->prepare("SELECT id FROM reset_requests WHERE student_id = ? AND DATE(request_time) = CURDATE()");
$check->bind_param("i", $student_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "You have already requested today."]);
    exit;
}

// Log request in DB (table: reset_requests)
$query = "INSERT INTO reset_requests (student_id, status, request_time) VALUES (?, 'pending', NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Request submitted."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to submit request."]);
}
?>