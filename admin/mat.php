<html>
    <head>
        <title>ADMIN LOGIN</title>
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
                      ADMIN
                 </h1>
                </tr>
               <tr>
                <td>yt link </td>
                <td><input type="text" id = "pass1" name="chapter1" placeholder = "Password" ></td>
               </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" name="submit" value="GO">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
                
            </table>
<?php
if (isset($_POST["submit"])) {
    $con = mysqli_connect("localhost", "root", "", "class8");
    if (!$con) {
        die("Connection failed: ");
    }

    $adpass = $_POST['adpass'];
    $d = "insert into biology(chapter1) values ('$chapter1') ";
    $a = mysqli_query($con, $d);

    if ($a) {
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
                window.location = "mat.php";
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