<html>
    <head>
        <title> REGISTRATION FORM</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function checkpass(){
                check1 = document.getElementById("pass1").value;
                check2 = document.getElementById("pass2").value;
                c=document.getElementById("area");
                if (check1 == check2){
                    c.innerHTML = "<font color = 'green'> Password Matching</font>"
                    return true;
                }
                else{
                     c.innerHTML = "<font color = 'red'> Password not Matching</font>"
                     return false;
                }
            }
        </script>
        <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 30px;
        }

        form {
            width: 400px;
            margin: auto;
            background: #fff;
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
            background: #2980b9;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            margin: 10px 5px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background: #3498db;
        }

        #area {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
    </head>    
    <body>
        <form method="post" action="">
            <table>
                <tr>
                    <h1 align="center">
                        Login Here
                    </h1>
                </tr>
                <tr>
                    <td>Student E-mail</td>
                    <td>
                        <input type="email" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>Student Password</td>
                    <td>
                        <input type="password" name="pass1" id="pass1">
                    </td>
                </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" value="Login" name="submit">
                 </td>
                    
                </tr>
            </table>
            <?php
              if (isset($_POST["submit"])) {
              $con = mysqli_connect("localhost", "root", "", "smartstudy");
               if (!$con) {
                    die("Connection failed: ");
                    }

              $s="select * from registration where email='$email' and pass1='$pass1'";
              $a=mysqli_query($con,$s);
              echo mysqli_affected_rows($con);
              if(mysqli_affected_rows($con)>0) {
                ?>
                <script>
                Swal.fire({
                icon: 'success',
                title: 'Login Successful!',
                text: 'Redirecting to admin dashboard...',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
                }).then((result) => {
                 if (result.isConfirmed) {
                 window.location = "admindash.php";
                  }
                });
                </script>
                <?php
               } 
    else {
        ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed!',
            text: 'Incorrect password. Please try again.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Retry'
        });
        </script>
        <?php
    }
}
?>

</form>
    </body>
</html>