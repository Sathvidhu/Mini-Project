<?php
session_start();
?>
<html>
<head>
    <title>Admin Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
        }
        td {
            padding: 10px;
            font-size: 20px;
            color: #495057;
        }

        th {
            text-align: left;
            margin: 20px;
            padding: 10px;
            color: #495057;
            font-size: 20px;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 40px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        
    </style>
    <?php
    $uname = $_SESSION["uname"];
    $con = mysqli_connect("localhost", "root", "", "admin");
    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the logged-in user's email from the session
//$email = $_SESSION['email'];

// Fetch all details of the admin with this email
$query = "SELECT * FROM login WHERE uname = '$uname'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No user found.";
    exit();
}
    ?>
</head>
<body>
    <h1 align="center">Welcome <?php echo htmlspecialchars($row['uname']); ?></h1>
    <button name="btn" onclick="location.href='index.php'" style="color: white; background-color: #007bff; margin: 20px;">Back</button>
    <table align="center" border="1" text-align="center">
    <tr><th>Username</th><td><?php echo $row['uname']; ?></td></tr>
    <tr><th>Full Name</th><td><?php echo $row['fullname']; ?></td></tr>
    <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
    <tr><th>Phone</th><td><?php echo $row['phone']; ?></td></tr>
    <!--tr><th>Password</th><td><?php echo $row['password']; ?></td></tr>-->
</table>

</body>
</html>