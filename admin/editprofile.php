<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$con = mysqli_connect("localhost", "root", "", "smartstudy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$updated = false; // flag for success alert

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if ($password != $re_password) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'Passwords do not match.'
        });
        </script>";
    } else {
        $update = "UPDATE admin_login SET fullname='$fullname', email='$email', phone='$phone', password='$password' WHERE uname='$uname'";

        if (mysqli_query($con, $update)) {
            $updated = true; // set flag for SweetAlert
        } else {
            echo "Error updating profile: " . mysqli_error($con);
        }
    }
}

// Fetch current user details
$uname = $_SESSION["uname"];
$query = "SELECT * FROM admin_login WHERE uname = '$uname'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No user found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile Edit</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
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
            padding: 10px;
            color: #495057;
            font-size: 20px;
            text-align: left;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
            width: 80%;
            padding: 8px;
            font-size: 16px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            margin: 20px auto;
            display: block;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1 align="center">Edit Profile - <?php echo htmlspecialchars($row['uname']); ?></h1>

<form method="POST" action="">
    <input type="hidden" name="uname" value="<?php echo $row['uname']; ?>">
    <table align="center" border="1">
        <tr>
            <th>Full Name</th>
            <td><input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><input type="tel" name="phone" value="<?php echo $row['phone']; ?>" required></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="password" value="<?php echo $row['password']; ?>" required></td>
        </tr>
        <tr>
            <th>Re Enter Password</th>
            <td><input type="password" name="re_password" value="<?php echo $row['password']; ?>" required></td>
        </tr>
    </table>
    <button type="submit" class="btn">Update Profile</button>
</form>

<button onclick="location.href='index.php'" class="btn" style="background-color: gray;">Back</button>

<?php if ($updated): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Updated!',
    text: 'Profile updated successfully.',
    confirmButtonText: 'OK'
}).then(() => {
    window.location.href = 'index.php';
});
</script>
<?php endif; ?>

</body>
</html>
