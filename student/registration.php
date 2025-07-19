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
        <form method = "post" action="" onsubmit = "return checkpass();">
            <table align = "center">
                <tr>
                    <h1 align = "center">
                      Registration Form
                    </h1>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" placeholder = "NAME" id = "nm" name = "fname" required></td>
                </tr>
               <tr>
                    <td>Class</td>
                    <td>
                        <input type="radio" value="8" name="class" required>VIII
                        <input type="radio" value="9" name="class">IX
                        <input type="radio" value="10" name="class">X
                    </td>
               </tr>

               <tr>
                <td>
                    Age
                </td>
                <td>
                    <input type="number" value = "Age" placeholder = "AGE" id ="age" name="age">
                </td>
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
                <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="Male" required>Male
                        <input type="radio" name="gender" value="Female">Female
                    </td>
                </tr>

               <tr>
                <td> Password </td>
                <td><input type="password" id = "pass1" name="pass1"placeholder = "Password" ></td>
               </tr>
               <tr>
                <td>
                    Re Enter password
                </td>
                <td>
                    <input type="password" id = "pass2" placeholder = "Re- Enterpass" name="submit" onchange="return checkpass();" >
                    <div id="area"> </div>
                </td>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" value="Register">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
            </table>
<?php
 if(isset($_POST["submit"] ))
                {
 $corn = mysqli_connect("localhost","root","","smartstudy");
 extract ($_POST);
 $d ="insert into registration(fname ,class ,age ,email ,gender , pass1) values('$fname','$class','$age','$email','$gender','$pass1')";
 $a = mysqli_query($corn,$d);
  if($a){
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Registration Successful!',
        text: 'You will now be redirected to login page.\nEmail:<?php echo $email; ?>\nPassword:<?php echo $pass1; ?>',
        //html: ''
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "login.php";
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