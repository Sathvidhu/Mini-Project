<html>
    <head>
        <title>search and edit</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <style>
    body{
        background-color: blanchedalmond;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    #btn{
         width: 40%;
            padding: 5px;
            border: 2px solid transparent;
            border-radius: 10px;
            background-color: rgb(88, 73, 110);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
    }
    #btn:hover{
            background-color: rgb(255, 255, 255);
            color: rgb(30, 85, 166);
            border: 2px solid rgb(34, 84, 159);
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
    }
   </style>
    </head>
    <body>
        <form action="" method="get">
        <table align="center">
            <br><br><br><br>
            <tr>
            <td style="font-size: 20px;">Email:</td>
            <td><input type="text" name="email"  required ></td>
            </tr>
            <tr>
                
                <td colspan="2"><input type="submit" value="search" id="btn" name="search"></td>
            </tr>
        </table>
</form>
        <?php
        if(isset($_GET['search'])){
            $email=$_GET['email'];
            $conn=mysqli_connect('localhost','root','','question_analyzer');
            $s="select * from register where email='$email'";
            $result=mysqli_query($conn, $s);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    ?>
                <table border="1" align="center">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Mobile</th> 
                <th>Email</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Qualification</th>
                <th>Username</th>
                <th>Password</th>
                <th id="action">Action</th>
            </tr>
             <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['qualification']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td id="action"><a href="searchedit.php?edit=<?php echo $row['email'];  ?>"> <input style="margin-left: 30px;" type="button" value="Edit"></a>
                  <a href="searchedit.php?delete=<?php echo $row['email'];  ?>">  <input style="margin-left: 20px;" type="button" value="Delete"></a></td>
            </tr>
            </table>
        <?php
                }
            }
            else{
                echo '<script>
                    Swal.fire({
                    title: "Error!",
                    text: "Data not found",
                    icon: "error",
                    confirmButtonText: "OK"
                    }).then(() => {
                    window.location.href = "searchedit.php";
                    });
                    </script>';

            }
        }
           if(isset($_GET['delete'])){
                $email=$_GET['delete'];
                $conn=mysqli_connect('localhost','root','','question_analyzer');
                $s="DELETE FROM register WHERE email='$email'";
                $result=mysqli_query($conn, $s);
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>
                    Swal.fire({
                    title: "Success!",
                    text: "Record data deleted successfully.",
                    icon: "success",
                    confirmButtonText: "OK"
                    }).then(() => {
                    window.location.href = "searchedit.php";
                    });
                    </script>';    
                } 
                }
            if(isset($_GET['edit'])){
                $email=$_GET['edit'];
                $conn=mysqli_connect('localhost','root','','question_analyzer');
                $s="SELECT * FROM register WHERE email='$email'";
                $result=mysqli_query($conn, $s);
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <form action="" method="post">
                        <table align="center">
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td><input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td><input type="text" name="dob" value="<?php echo $row['dob']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Qualification</td>
                                <td><input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="save" value="Save"></td>
                            </tr>
   
                <?php
                }
            }
                    if(isset($_POST['save'])){
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $address=$_POST['address'];
                    $mobile=$_POST['mobile'];
                    $gender=$_POST['gender'];
                    $dateofbirth=$_POST['dob'];
                    $qualification=$_POST['qualification'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                      $conn=mysqli_connect("localhost","root","","question_analyzer");
                $s= "update register set firstname='$firstname',lastname='$lastname',address='$address',mobile='$mobile' ,gender='$gender',dob='$dateofbirth',qualification='$qualification',username='$username',password='$password' where email='$email'";
                mysqli_query($conn,$s);
                if(mysqli_affected_rows($conn)>0){
                    ?>
                    <script>
                    Swal.fire({
                    title: "Success!",
                    text: "Record updated successfully.",
                    icon: "success",
                    confirmButtonText: "OK"
                    }).then(() => {
                    window.location.href = "searchedit.php?email=<?php echo $email; ?>&search=search";
                    });
                    </script>
                    <?php
                    

                    }
                }

        ?>
                </table>
            </form>
    </body>
</html>