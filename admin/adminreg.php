
<html>
    <head>
        <title> LOGIN FORM</title>
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
        <form method = "post" action="" onsubmit = "return checkpass();">
            <table align = "center">
                
                 <h1 align = "center">
                      Register
                 </h1>
                
                <tr><td>Full Name</td><td><input type="text" placeholder="Name" name="fullname" required></td></tr>
                <tr><td>Email</td><td><input type="email" placeholder="Email" name="email" required></td></tr>
                <tr><td>Phone</td><td><input type="tel" placeholder="Phone" name="phone" required></td></tr>
                <tr><td>Username</td><td><input type="text" placeholder="Username" name="uname" required></td></tr>
               <tr>
                <td> Password </td>
                <td><input type="password" id = "pass1" name="password" placeholder = "Password" required></td>
               </tr>
               <tr>
                <td>RE-Enter Password </td>
                <td><input type="password" id = "pass2" name="fpassword" placeholder = "Password" onchange="return checkpass();" required></td><div id="area"> </div>
               </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit"name="submit" value="Register">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
                
            </table>
            
<?php
if(isset($_POST["submit"] ))
{

 $con=mysqli_connect("localhost","root","","smartstudy");
 extract($_POST);
 $d ="insert into admin_login(uname , password, email, phone, fullname) values('$uname','$password','$email','$phone','$fullname')";
 $a = mysqli_query($con,$d);
  if($a){
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Registration Successful!',
        text: 'You will now be redirected to login page.',
        //html: ''
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "index.php";
        }
    });
</script>

      <?php
  }
  else{
    ?>
    <script>
        alert("Not Registered");
        window.location ="registeration.php";
        </script>
        <?php
  }
}
?>


        </form>
    
</body>

</html>



















