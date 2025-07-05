<html>
    <head>
        <title>Register Here</title>
        <script>
          
            function checkpass(){
                pass1 = document.getElementById("pass1").value;
                pass2 = document.getElementById("pass2").value;
                c = document.getElementById("area")
                if(pass1 == pass2){
                    c.innerHTML = "<font color = 'green'> Password  Matching</font>"
                    return true;
                }
                else{
                    c.innerHTML = "<font color = 'red'> Password not Matching</font>"
                    return false;
                }
            }
        </script>
    </head>
    <body>
        
        <form method="post" action="action.php" onchange="return checkpass();">
            <table align="center">
                <caption><h2>Register!</h2></caption>

                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Date Of Birth:</td>
                    <td><input type="date" name="dob" required></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" required ></td>
                </tr>
                <tr>
                    <td>
                        Gender
                    </td>
                    <td>
                        <input type="radio" name="x" required>Male
                        <input type="radio" name="x" required>Female
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="pass1" pattern=".{8,}" title="Eight or more characters" required></td>
                </tr>
                <tr>
                    <tr><td>Reenter Password</td><td> <input type="password" name="" id="pass2" required><div id="area"></div></td></tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Register">
                    </td>
                    <td><input type="reset" ></td>
                </tr>
            </table>
        </form>
    </body>
</html>
