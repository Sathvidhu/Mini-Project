<?php
session_start();

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            width: 500px;
            margin: 20px auto;
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
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        input[type="time"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
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
    </style>
</head>
<body>

<h1>PROFILE</h1>

<form method="post" action="">
    <table>
        <!--<tr>
            <tr>
            <td><label>Profile Photo</label></td>
            <td colspan="3"><input type="file" placeholder="Upload Profile Photo" name="profile" accept="image/*" ></td>
        </tr>-->
        <tr>
            <td colspan="4" align="center"><strong>School Details</strong></td>
        </tr>
        <tr>
            <td><label for="schoolname">School Name</label></td>
            <td colspan="3"><input type="text" id="schoolname" name="sname" placeholder="School Name" required></td>
        </tr>
        
        <tr>
            <td><label for="timing">School Timing</label></td>
            <td><input type="time" id="timing" name="time1" required></td>
            <td align="center">To</td>
            <td><input type="time" id="timing2" name="time2" required></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>Previous Year Marks</strong></td>
        </tr>
        <tr>
            <td>Physics</td>
            <td><input type="number" name="physicsmark" placeholder="Marks" min="0" max="100"></td>
            <td>Chemistry</td>
            <td><input type="number" name="chemistrymark" placeholder="Marks" min="0" max="100"></td>
        </tr>
        <tr>
            <td>Maths</td>
            <td><input type="number" name="mathsmark" placeholder="Marks" min="0" max="100"></td>
            <td>Biology</td>
            <td><input type="number" name="biologymark" placeholder="Marks" min="0" max="100"></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>Extracurricular Activities / Hobbies</strong></td>
        </tr>
        <tr>
            <td><label for="extracurricular">Extracurricular Activities</label></td>
            <td colspan="3">
                <input type="text" id="extracurricular" name="extracurricular" placeholder="e.g., Sports, Music, Art">
            </td>
        </tr>
        <tr>
            <td><label for="hobbies">Hobbies</label></td>
            <td colspan="3">
                <input type="text" id="hobbies" name="hobbies" placeholder="e.g., Reading, Drawing, Coding">
            </td>
        </tr>
        
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Submit" name="submit"></td>
            <td colspan="2" align="center"><input type="reset"></td>
        </tr>
        
    </table>
    <?php
 if(isset($_POST["submit"] ))
    {
 $corn = mysqli_connect("localhost","root","","smartstudy");
 extract ($_POST);
$d = "UPDATE registration SET 
    sname = '$sname',
    time1 = '$time1',
    time2 = '$time2',
    physicsmark = '$physicsmark',
    chemistrymark = '$chemistrymark',
    mathsmark = '$mathsmark',
    biologymark = '$biologymark',
    extracurricular = '$extracurricular',
    hobbies = '$hobbies',
    profile = 1
WHERE email = '$email'";
 $a = mysqli_query($corn,$d);
  if($a){
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Profile Updated Successfully!',
        text: 'You will now be redirected to Dashboard.',
        //html: ''
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "dashboard.php";
        }
    });
    $profileOk++; // Set profileOk to 1 to indicate profile completion
</script>


      <?php
  }
  else{
    ?>
    <script>
        alert("Profile Not Updated");
        window.location ="profile.php";
        </script>
        <?php
  }
                }

?>
</form>

</body>
</html>
