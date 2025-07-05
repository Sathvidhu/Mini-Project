<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Page</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Add any Bootstrap or custom styles you need -->
</head>
<body>
  <div class="registration-box" method="post" action="">
    <h2>Register</h2>
    <form method="post" action="" onsubmit="return checkpass();">
      <div class="form-group">
        <input type="text" name="name" placeholder="Name" required />
      </div>
      <div class="form-group">
        <input type="date" name="dob" placeholder="Date of Birth" required />
      </div>
      <div class="form-group">
        <input type="text" name="school" placeholder="Name of School" required />
      </div>

      <div class="form-group">
        <label>Standard:</label><br />
        <input type="radio" name="std" value="eig" required /> 8
        <input type="radio" name="std" value="nine" required /> 9
        <input type="radio" name="std" value="ten" required /> 10
      </div>

      <div class="form-group">
        <label>Gender:</label><br />
        <input type="radio" name="gender" value="male" required /> Male
        <input type="radio" name="gender" value="female" required /> Female
      </div>

      <div class="form-group">
        <input type="text" name="phn" placeholder="Phone Number" required />
      </div>
      <div class="form-group">
        <input type="text" name="gphn" placeholder="Guardian's Phone Number" required />
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" id="pass11" placeholder="Password" pattern="[A-Za-z0-9]{8,}" required />
      </div>
      <div class="form-group">
        <input type="password" id="pass22" placeholder="Re-enter Password" pattern="[A-Za-z0-9]{8,}" required onchange="checkpass()" />
      </div>

      <button type="submit" name="reg">Register</button>
    </form>
  </div>

  <script>
    function checkpass() {
      var pass1 = document.getElementById('pass11').value;
      var pass2 = document.getElementById('pass22').value;
      if (pass1 !== pass2) {
        alert("Passwords do not match.");
        return false;
      }
      return true;
    }
  </script>

  <?php
  if (isset($_POST["reg"])) {
    $con = mysqli_connect("localhost", "root", "", "smart");
    extract($_POST);
    $query = "INSERT INTO registration(name, dob, school, std, gender, phn, gphn, email, password) 
              VALUES('$name','$dob','$school','$std','$gender','$phn','$gphn','$email','$password')";
    if (mysqli_query($con, $query)) {
      echo "<script>alert('Registered Successfully'); window.location='login.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');</script>";
    }
  }
  ?>
</body>
</html>
