<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Components - Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	 <style>
        body {
            font-family: Arial, sans-serif;
        }

        .search-container {
            margin: 10px ;
            width: 350px;
            padding: 10px;
            background-color: #fffefeff;
            border-radius: 10px;
           
            text-align: center;
        }

        .search-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .search-container input[type="email"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .search-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
	<style>
    /* Style only the table with class 'student-table' */
    table.student-table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        font-family: Arial, sans-serif;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table.student-table th {
        background-color: #323b2eff;
        color: #fff;
        padding: 12px;
        font-size: 16px;
        text-align: center;
    }

    table.student-table td {
        padding: 10px 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    table.student-table tr:hover {
        background-color: #f2f2f2;
    }

    table.student-table td input[type="button"] {
        padding: 6px 14px;
        margin: 4px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.2s;
    }

    table.student-table td a:first-child input[type="button"] {
        background-color: #28a745;
        color: white;
    }

    table.student-table td a:first-child input[type="button"]:hover {
        background-color: #218838;
    }

    table.student-table td a:last-child input[type="button"] {
        background-color: #dc3545;
        color: white;
    }

    table.student-table td a:last-child input[type="button"]:hover {
        background-color: #c82333;
    }
</style>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.php" class="logo">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="index.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="student.php">
								<i class="la la-table"></i>
								<p>Student Details</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="parent.php">
								<i class="la la-keyboard-o"></i>
								<p>Parent Details</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="material.php">
								<i class="la la-th"></i>
								<p>Materials</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Student's Information</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Student Details</h4>
										<p class="card-category">Search By E-Mail</p>
									</div>
									<div class="search-container">
        								
        								<form method="get" action="">
            								<input type="email" name="email" placeholder="Enter Email Address" required>
            								<br>
            								<input type="submit" name="search1" value="Search">
        								</form>
    								</div>
											<table>
												<?php
        if (isset($_GET['search1'])){
            $email=$_GET['email'];
			
            $conn=mysqli_connect('localhost','root','','smartstudy');
            $s="select * from registration where email='$email'";
            $result=mysqli_query($conn, $s);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    ?>
                <table border="1" class="student-table" >
                <th>fname</th>
                <th>class</th>
                <th>age</th>
                <th>email</th> 
                <th>gender</th>
				<th>School Name</th>
				
                
                <th id="action" style="text: center">Action</th>
            </tr>
             <tr>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
				<td><?php echo $row['sname']; ?></td>
                <td id="action"><a href="student.php?edit=<?php echo $row['email'];  ?>"> <input style="margin-left: 30px;" type="button" value="Edit"></a>
                  <a href="student.php?delete=<?php echo $row['email'];  ?>">  <input style="margin-left: 20px;" type="button" value="Delete"></a></td>
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
                    window.location.href = "student.php";
                    });
                    </script>';

            }
        }
           if(isset($_GET['delete'])){
                $email=$_GET['delete'];
                $conn=mysqli_connect('localhost','root','','smart');
                $s="DELETE FROM registration WHERE email='$email'";
                $result=mysqli_query($conn, $s);
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>
                    Swal.fire({
                    title: "Success!",
                    text: "Record data deleted successfully.",
                    icon: "success",
                    confirmButtonText: "OK"
                    }).then(() => {
                    window.location.href = "student.php";
                    });
                    </script>';    
                } 
                }
            if(isset($_GET['edit'])){
                $email=$_GET['edit'];
                $conn=mysqli_connect('localhost','root','','smartstudy');
                $s="SELECT * FROM registration WHERE email='$email'";
                $result=mysqli_query($conn, $s);
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <form action="" method="post">
                        <table align="center"class="student-table">
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="fname" value="<?php echo $row['fname']; ?>"></td>
                            </tr>
                            <tr>
                                <td>class:</td>
                                <td><input type="text" name="class" value="<?php echo $row['class']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="age" value="<?php echo $row['age']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
                            </tr>
							<tr>
                                <td>Age:</td>
                                <td><input type="text" name="age" value="<?php echo $row['age']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="save" value="Save" style="background-color: #137c9cff; color: white; padding: 10px 20px; border: none; border-radius: 5px;"></td>
                            </tr>
   
                <?php
                }
            }
                    if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $conn = mysqli_connect("localhost", "root", "", "smartstudy");
    $s = "UPDATE registration SET fname='$fname', class='$class', age='$age', gender='$gender' WHERE email='$email'";

    if (mysqli_query($conn, $s)) {
        ?>
        <script>
        Swal.fire({
            title: "Success!",
            text: "Record saved (even if nothing changed).",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "student.php?email=<?php echo $email; ?>&search=search";
        });
        </script>
        <?php
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}

        ?>
											</table>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Attendance</h4>
										<p class="card-category">Here is a subtitle for this table</p>
									</div>
									<div class="card-body">
										<p class="demo">
											<button class="btn btn-default" disabled="disabled">Default</button>

											<button class="btn btn-primary" disabled="disabled">Primary</button>

											<button class="btn btn-info" disabled="disabled">Info</button>

											<button class="btn btn-success" disabled="disabled">Success</button>

											<button class="btn btn-warning" disabled="disabled">Warning</button>

											<button class="btn btn-danger" disabled="disabled">Danger</button>

											<button class="btn btn-link" disabled>Link</button>
										</p>
									</div>
								</div>
							</div>
							
							
							
							
							
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Progress Report</h4>
										<p class="card-category">View Progress Report</p>
									</div>
									<div class="card-body">
										<p class="demo">
											<div class="dropdown">

												<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">

													Dropdown

												</button>

												<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">

													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Something else here</a>

												</ul>

											</div>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Progress Bar</h4>
										<p class="card-category">Here is a subtitle for this table</p>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<p class="demo">
													<div class="progress">
														<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</p>
												<p class="demo">
													<div class="progress">
														<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</p>
												<p class="demo">
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</p>
												<p class="demo">
													<div class="progress">
														<div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="http://www.themekita.com">
										ThemeKita
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										Help
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="https://themewagon.com/license/#free-item">
										Licenses
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							2018, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
					<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script>
	$( function() {
		$( "#slider" ).slider({
			range: "min",
			max: 100,
			value: 40,
		});
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ]
		});
	} );
</script>

</html>