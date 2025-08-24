<?php
session_start();
?>


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
            width: 400px;
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
		.search-form {
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: center;
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
					Admin Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<!--<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>-->
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
						
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $_SESSION["uname"];?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4><?php echo $_SESSION["uname"];?></h4>
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
									<?php echo $_SESSION["uname"];?>
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
						<h4 class="page-title">Parents's Information</h4>



						


						<!-- Student Details Section -->	
						


						<!-- Parent Details Section -->
						 	<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Parent's List</h4>
										<p class="card-category">View Parent's Details</p>
									</div>
									<div class="card-body">
										<?php
    										// Connect to the database
											$conn = mysqli_connect('localhost', 'root', '', 'smartstudy');
											if (!$conn) {
												die("Connection failed: " . mysqli_connect_error());
											}

											// Use 'ppage' for parent pagination
											$page = isset($_GET['ppage']) ? (int)$_GET['ppage'] : 1;
											$parents_per_page = 5;
											$offset = ($page - 1) * $parents_per_page;

											$total_query = "SELECT COUNT(*) as total FROM registration";
											$total_result = mysqli_query($conn, $total_query);
											$total_row = mysqli_fetch_assoc($total_result);
											$total_parents = $total_row['total'];

											$query = "SELECT * FROM registration LIMIT $parents_per_page OFFSET $offset";
											$result = mysqli_query($conn, $query);

											echo '<div class="card-body">';
											if (mysqli_num_rows($result) > 0) {
												echo '<table border="1" class="student-table">';
												echo '<tr><th>Student Name</th><th>Full Name</th><th>Email</th></tr>';

												while ($row = mysqli_fetch_assoc($result)) {
													echo '<tr>
															<td>' . htmlspecialchars($row['fname']) . '</td>
															<td>' . htmlspecialchars($row['pname']) . '</td>
															<td>' . htmlspecialchars($row['pemail']) . '</td>
														</tr>';
												}

												echo '</table>';

												// Pagination Buttons
												$next_page = $page + 1;
												$prev_page = $page - 1;

												if ($offset + $parents_per_page < $total_parents) {
													echo '<br><a href="?ppage=' . $next_page . '" class="btn btn-primary">Next</a>';
												}
												if ($page > 1) {
													echo '<a href="?ppage=' . $prev_page . '" class="btn btn-secondary" style="margin-left: 10px;">Previous</a>';
												}
											}
											echo '</div>';
											mysqli_close($conn);
										?>


									</div>

								</div>
							</div>

							<!-- Parent Editing Section -->

							
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Parent's Details</h4>
											<p class="card-category">Search By E-Mail</p>
										</div>

										<div class="search-container">
											<form method="get" action="" class="search-form">
											<label for="email" class="fw-bold">Email:</label>
											<input type="email" name="pemail" placeholder="Enter Email Address" required>
											<input type="submit" name="search2" value="Search">
											</form>
										</div>

										<?php
										$conn = mysqli_connect('localhost', 'root', '', 'smartstudy');
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}

										// 🔍 HANDLE SEARCH
										if (isset($_GET['search2'])) {
											$pemail = $_GET['pemail'];
											$query = "SELECT * FROM registration WHERE pemail='$pemail'";
											$result = mysqli_query($conn, $query);

											if (mysqli_num_rows($result) > 0) {
												echo '<table border="1" class="student-table">';
												echo '<tr>
														<th>Parent Name</th>
														<th>Mobile Number</th>
														<th>E-mail</th>
														<th>Action</th>
													</tr>';
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>
															<td>{$row['pname']}</td>
															<td>{$row['mobilenumber']}</td>
															<td>{$row['pemail']}</td>
															<td id='action'>
																<a href='student.php?pedit={$row['pemail']}'><input type='button' value='Edit' style='margin-left: 30px;'></a>
																<a href='student.php?pdelete={$row['pemail']}'><input type='button' value='Delete' style='margin-left: 20px;'></a>
															</td>
														</tr>";
												}
												echo "</table>";
											} else {
												echo "<script>
													Swal.fire({
														title: 'Error!',
														text: 'No parent found with that email.',
														icon: 'error',
														confirmButtonText: 'OK'
													}).then(() => {
														window.location.href = 'student.php';
													});
												</script>";
											}
										}

										// 🧹 HANDLE DELETE
										if (isset($_GET['pdelete'])) {
											$pemail = $_GET['pdelete'];
											$delete_query = "DELETE FROM registration WHERE pemail='$pemail'";
											mysqli_query($conn, $delete_query);

											if (mysqli_affected_rows($conn) > 0) {
												echo "<script>
													Swal.fire({
														title: 'Deleted!',
														text: 'Parent details deleted successfully.',
														icon: 'success',
														confirmButtonText: 'OK'
													}).then(() => {
														window.location.href = 'student.php';
													});
												</script>";
											} else {
												echo "Failed to delete record.";
											}
										}

										// ✏️ HANDLE EDIT VIEW
										if (isset($_GET['pedit'])) {
											$pemail = $_GET['pedit'];
											$edit_query = "SELECT * FROM registration WHERE pemail='$pemail'";
											$result = mysqli_query($conn, $edit_query);

											while ($row = mysqli_fetch_assoc($result)) {
												?>
												<form action="" method="post">
												<table class="student-table" align="center">
													<tr>
													<td>Parent Name:</td>
													<td><input type="text" name="pname" value="<?php echo $row['pname']; ?>"></td>
													</tr>
													<tr>
													<td>Mobile Number:</td>
													<td><input type="text" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>"></td>
													</tr>
													<input type="hidden" name="pemail" value="<?php echo $row['pemail']; ?>">
													<tr>
													<td></td>
													<td><input type="submit" name="psave" value="Save" style="background-color: #137c9cff; color: white; padding: 10px 20px; border: none; border-radius: 5px;"></td>
													</tr>
												</table>
												</form>
												<?php
											}
										}

										// 💾 HANDLE SAVE
										if (isset($_POST['psave'])) {
											$pname = $_POST['pname'];
											$mobilenumber = $_POST['mobilenumber'];
											$pemail = $_POST['pemail'];

											$update_query = "UPDATE registration SET pname='$pname', mobilenumber='$mobilenumber' WHERE pemail='$pemail'";

											if (mysqli_query($conn, $update_query)) {
												echo "<script>
													Swal.fire({
														title: 'Saved!',
														text: 'Parent details updated successfully.',
														icon: 'success',
														confirmButtonText: 'OK'
													}).then(() => {
														window.location.href = 'student.php';
													});
												</script>";
											} else {
												echo "Failed to update record: " . mysqli_error($conn);
											}
										}

										mysqli_close($conn);
										?>
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
									<a class="nav-link" href="#">
										
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
							2025, made </i> by <a href="#">AJ And Team</a>
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