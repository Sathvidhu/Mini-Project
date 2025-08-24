<?php
session_start();
$email= $_SESSION['email'];
$con = mysqli_connect("localhost", "root", "", "smartstudy");
$time_spent = isset($_POST['time_spent']) ? intval($_POST['time_spent']) : 0;
//$email = isset($_SESSION['email']);
$page = 'dashboard.php';
$sql = "INSERT INTO page_time (email, time_spent, page, visited_at)
        VALUES ('$email', '$time_spent', '$page', NOW())";
mysqli_query($con, $sql);
mysqli_close($con);
?>
