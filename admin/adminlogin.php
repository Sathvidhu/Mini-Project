
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
                      ADMIN LOGIN 
                 </h1>
                </tr>
               <tr>
                <td>
                    User Name
                </td>
                <td>
                    <input type="text"  id = "uname" placeholder = "UserName" name = "uname">
                </td>
               </tr>
               <tr>
                <td> Password </td>
                <td><input type="password" id = "pass1" name="password" placeholder = "Password" ></td>
               </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Register">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
                
            </table>
            <tr align="center">
                    <th><a href="adminpass.php" style="text-decoration: none;">New Admin?</a></th>
                </tr>
<?php
if(isset($_POST["submit"] ))
{
    
 $con=mysqli_connect("localhost","root","","admin");
 extract($_POST);
 $s="select * from login where uname='$uname' and password='$password'";
 $a=mysqli_query($con,$s);
 echo mysqli_affected_rows($con);
 if(mysqli_affected_rows($con)>0)
  {
    ?>
    <script>
        alert("LOGIN SUCCESFULL");
        window.location = "index.php";
    </script>
    <?php
   // session_start();
    // $_SESSION["name"]=$name;
    // header("Location:dashboard.php");
  }
  else
   {
     ?>
    <script>
        alert("LOGIN NOT SUCCESFULL");
        window.location = "adminlogin.php";
    </script>
    <?php
   }
}
?>
        </form>
    
</body>

</html>



















