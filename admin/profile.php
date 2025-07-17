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
    </style>
</head>
<body>
    <h1 align="center">Welcome to the Admin Profile</h1>
    <table align="center" >
        <form action="">
            <tr>
                <td><label for="adminName">Admin Name:</label></td>
                <td><input type="text" id="adminName" name="adminName" value="<?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?>" readonly></td>
            </tr>
        </form>
    </table>
</body>
</html>