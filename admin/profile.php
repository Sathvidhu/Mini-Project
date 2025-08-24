<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #343a40;
            text-align: center;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            font-size: 18px;
            color: #495057;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 30px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }
        .top-buttons {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 20px auto;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .edit-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 30px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px auto;
            align: center;
        }
    </style>
    <?php
    $uname = $_SESSION["uname"];
    $con = mysqli_connect("localhost", "root", "", "smartstudy");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM admin_login WHERE uname = '$uname'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'No user found.'
                });
             </script>";
        exit();
    }
    ?>
</head>
<body>

<h1>Welcome <?php echo htmlspecialchars($row['uname']); ?></h1>

<!-- Back Button -->
<div class="top-buttons">
    <button class="btn btn-secondary" onclick="location.href='index.php'">← Back</button>
</div>

<!-- Profile Table -->
<table>
    <tr><th>Username</th><td><?php echo htmlspecialchars($row['uname']); ?></td></tr>
    <tr><th>Full Name</th><td><?php echo htmlspecialchars($row['fullname']); ?></td></tr>
    <tr><th>Email</th><td><?php echo htmlspecialchars($row['email']); ?></td></tr>
    <tr><th>Phone</th><td><?php echo htmlspecialchars($row['phone']); ?></td></tr>
</table>

<!-- Edit Button -->
<button align="center" class="edit-btn" onclick="location.href='editprofile.php'">Edit Profile</button>

</body>
</html>
