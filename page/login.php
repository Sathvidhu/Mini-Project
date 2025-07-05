<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form Animation CSS | Coding Vibess</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="glowing-light"></div>
    <div class="login-box">
      <form action="#" method="post">
        <input type="checkbox" class="input-check" id="input-check" />
        <label for="input-check" class="toggle">
          <span class="text off">off</span>
          <span class="text on">on</span>
        </label>
        <div class="light"></div>

        <h2>Login</h2>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input type="email" required />
          <label>Email</label>
          <div class="input-line"></div>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input type="password" required />
          <label>Password</label>
          <div class="input-line"></div>
        </div>

        <div class="radio-group">
    <label>Standard</label>
      <div class="radio-options">
    <label>
      <input type="radio" name="std" value="8" required /> 8
    </label>
    <label>
      <input type="radio" name="std" value="9" /> 9
    </label>
    <label>
      <input type="radio" name="std" value="10" /> 10
    </label>
     </div>
       <div class="input-line"></div>
   </div>



        <div class="remember-forgot">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" id="login" name="login" >Login</button>
        <div class="register-link">
          <p>Don't have an account? <a href="#">Register</a></p>
        </div>
      </form>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <?php
if(isset($_POST["login"] ))
{
    
 $con=mysqli_connect("localhost","root","","smart");
 extract($_POST);
 $s="select * from registration where email='$email' and password='$password'";
 $a=mysqli_query($con,$s);
 echo mysqli_affected_rows($con);
 if(mysqli_affected_rows($con)>0)
  {
    session_start();
    $_SESSION["[password]"]=$password;


?>
           <script type="text/javascript">
               alert("Login successfully");
               window.location="loginpage.php";
             </script>
           <?php
  }
  else
   {
    ?>
           <script type="text/javascript">
               alert("Email / Password is Wrong!");
               window.location="login.php";
             </script>
           <?php
   }
}
?>
  </body>
</html>
