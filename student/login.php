
<html>
    <head>
        <title> LOGIN FORM</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: rgb(40, 120, 235);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color:rgb(0, 0, 0);
            margin-top: 30px;
        }

        form {
            width: 400px;
            margin: auto;
            background:rgb(255, 255, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            background:rgb(40, 120, 235);
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            margin: 5px 2px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background: #3498db;
        }

        #area {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    </head>    
    <body>
        <form method = "post" action="" >
            <table align = "center">
                <tr>
                 <h1 align = "center">
                      LOGIN HERE
                 </h1>
                </tr>
               <tr>
                <td>
                    E-mail Address
                </td>
                <td>
                    <input type="email"  id = "eml" placeholder = "E-Mail" name = "email">
                </td>
               </tr>
               <tr>
                <td> Password </td>
                <td><input type="password" id = "pass1" name="pass1" placeholder = "Password" ></td>
               </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Register">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
                
            </table>
            <tr align="center">
                    <th><a href="registration.php" style="text-decoration: none;">Don't Have An Account?</a></th>
                </tr>
<?php
if (isset($_POST['submit'])) {

    /* ---- 1.  Connect safely ---------------------------------------------- */
    $con = new mysqli('localhost', 'root', '', 'smartstudy');
    if ($con->connect_error) {
        die('Database error: ' . $con->connect_error);
    }

    /* ---- 2.  Pull & sanitise user input ---------------------------------- */
    $email  = $_POST['email']  ?? '';
    $pass1  = $_POST['pass1']  ?? '';
    $email  = trim($email);
    $pass1  = trim($pass1);

    /* ---- 3.  Verify credentials with a prepared statement ---------------- */
    $stmt = $con->prepare(
        'SELECT attandance, last_attendance
         FROM   registration
         WHERE  email = ? AND pass1 = ?'
    );
    $stmt->bind_param('ss', $email, $pass1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {                // --- Wrong password ----
        showAlert('error',
                  'Login Not Successful!',
                  'Incorrect password. Please try again.',
                  'login.php');
        exit;
    }

    /* ---- 4.  Decide whether to add today’s attendance -------------------- */
    $row          = $result->fetch_assoc();
    $today        = date('Y-m-d');                // set your timezone at top if needed
    $attendance   = (int)$row['attandance'];
    $lastMarked   = $row['last_attendance'];

    if ($lastMarked !== $today) {                 // only first login of the day
        $attendance++;

        $upd = $con->prepare(
            'UPDATE registration
             SET    attandance      = ?,
                    last_attendance = ?
             WHERE  email = ?'
        );
        $upd->bind_param('iss', $attendance, $today, $email);
        $upd->execute();
    }

    /* ---- 5.  Success feedback ------------------------------------------- */
    showAlert('success',
              'Login Successful!',
              'Redirecting to Student Dashboard...',
              'dashboard.php');
}

/* ---------- Re‑usable SweetAlert helper ---------------------------------- */
function showAlert($icon, $title, $text, $redirect)
{
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script>
        Swal.fire({
          icon: '$icon',
          title: '$title',
          text: '$text',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
        }).then(() => window.location = '$redirect');
      </script>";
}
?>

        </form>
    
</body>

</html>



















