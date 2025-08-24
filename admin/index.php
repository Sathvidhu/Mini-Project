<?php
session_start();
$uname = $_SESSION["uname"];
?>
<?php

$conn = mysqli_connect("localhost", "root", "", "smartstudy");
$query = "SELECT COUNT(email) AS email_count FROM registration";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$email_count = $row['email_count'];


?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	

    <style>
		ul.list-group {
    max-height: 250px;
    overflow-y: auto;
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
					
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						

								<!-- SweetAlert2 -->
								<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
								<script>
								function handleRequest(student_id, request_id, student_name) {
									Swal.fire({
										title: 'Ranking Reset Request',
										text: student_name + ' requested to reset ranking.',
										icon: 'info',
										showCancelButton: true,
										confirmButtonText: 'Accept',
										cancelButtonText: 'Deny'
									}).then((result) => {
										if (result.isConfirmed) {
											// Accept request
											fetch('do_reset.php', {
												method: 'POST',
												headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
												body: 'student_id=' + student_id + '&request_id=' + request_id
											})
											.then(response => response.text())
											.then(data => {
												Swal.fire('Done!', 'Ranking has been reset.', 'success').then(()=> location.reload());
											});
										} else if (result.dismiss === Swal.DismissReason.cancel) {
											// Deny request
											fetch('deny_reset.php', {
												method: 'POST',
												headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
												body: 'request_id=' + request_id
											})
											.then(response => response.text())
											.then(data => {
												Swal.fire('Denied', 'Request has been denied.', 'error').then(()=> location.reload());
											});
										}
									});
								}
								</script>
						

						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="profile.php" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $_SESSION["uname"];?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4><?php echo $_SESSION["uname"];?></h4>
											
											<a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="profile.php"><i class="ti-user"></i>Messages</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="adminsettings.php"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" name="logout" href="adminlogin.php"><i class="fa fa-power-off"></i> Logout</a>
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
										<a href="profile.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="editprofile.php">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="link-collapse">Inbox</span>
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
						<h4 class="page-title">Dashboard</h4>
						<div class="row">
							<div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Students</p>
													<h4 class="card-title"><?php echo $email_count; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-success">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center text-primary">
													<i class="fa fa-book"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Top Subject</p>
													<h4 class="card-title">Mathematics</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center text-warning">
													<i class="fas fa-folder-open"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Materials Uploaded</p>
													<h4 class="card-title">240</h4> <!-- Replace with dynamic number if needed -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

							
						<!--<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center icon-warning">
													<i class="la la-pie-chart text-warning"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Number</p>
													<h4 class="card-title">150GB</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-bar-chart text-success"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Revenue</p>
													<h4 class="card-title">$ 1,345</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-times-circle-o text-danger"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Errors</p>
													<h4 class="card-title">23</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-heart-o text-primary"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Followers</p>
													<h4 class="card-title">+45K</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
					</div>
						<div class="row">
							<!-- <div class="col-md-3">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Task</h4>
										<p class="card-category">Complete</p>
									</div>
									<div class="card-body">
										<div id="task-complete" class="chart-circle mt-4 mb-3"></div>
									</div>
									<div class="card-footer">
										<div class="legend"><i class="la la-circle text-primary"></i> Completed</div>
									</div>
								</div>
							</div> -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Recent Activity</h4>
									</div>
									<div class="card-body">
										<ul class="list-group list-group-flush">
											<?php
											$conn = new mysqli("localhost", "root", "", "smartstudy");

											if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
											}

											// --- Pagination setup ---
											$limit = 5; // show 5 per page
											$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
											if ($page < 1) $page = 1;
											$offset = ($page - 1) * $limit;

											// --- Get total records for pagination ---
											$total_sql = "SELECT COUNT(*) as total FROM student_activity";
											$total_result = $conn->query($total_sql);
											$total_row = $total_result->fetch_assoc();
											$total_records = $total_row['total'];
											$total_pages = ceil($total_records / $limit);

											// --- Fetch activities for current page ---
											$sql = "SELECT student_email, activity, activity_time 
													FROM student_activity 
													ORDER BY activity_time DESC 
													LIMIT $limit OFFSET $offset";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo "<li class='list-group-item'>
															<i class='fas fa-user text-primary'></i> 
															<strong>{$row['student_email']}</strong> → {$row['activity']}
															<span class='text-muted float-end'>" . date("M d, g:i a", strtotime($row['activity_time'])) . "</span>
														</li>";
												}
											} else {
												echo "<li class='list-group-item text-muted'>No recent activity</li>";
											}
											?>
										</ul>

										<!-- Pagination buttons -->
										<div class="mt-3 d-flex justify-content-between">
											<?php if ($page > 1): ?>
												<a class="btn btn-sm btn-primary" href="?page=<?php echo $page-1; ?>">← Previous</a>
											<?php else: ?>
												<span></span>
											<?php endif; ?>

											<?php if ($page < $total_pages): ?>
												<a class="btn btn-sm btn-primary" href="?page=<?php echo $page+1; ?>">Next →</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="row row-card-no-pd">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<p class="fw-bold mt-1">Notifications</p>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<i class="fas fa-bell text-warning"></i> Assignment due in <strong>Physics</strong>.
												<span class="text-muted float-end">Today</span>
											</li>
											<li class="list-group-item">
												<i class="fas fa-user text-primary"></i> New parent <strong>Mrs. Das</strong> joined.
												<span class="text-muted float-end">2 hrs ago</span>
											</li>
											<li class="list-group-item">
												<i class="fas fa-book text-success"></i> New material added to <strong>Biology</strong>.
												<span class="text-muted float-end">4 hrs ago</span>
											</li>
											<li class="list-group-item">
												<i class="fas fa-calendar-alt text-info"></i> Meeting scheduled for <strong>Grade 10</strong>.
												<span class="text-muted float-end">Tomorrow</span>
											</li>
										</ul>
									</div>
									<div class="card-footer text-end">
										<a class="btn btn-sm btn-link" href="#"><i class="fas fa-eye"></i> View All</a>
									</div>
								</div>
							</div>

							<div class="col-md-5">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-3">📝 Task Reminders</h5>
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<i class="fas fa-upload text-primary"></i> Upload study material for <strong>Chemistry</strong>
													<span class="text-muted float-end">Due: Today</span>
												</li>
												<li class="list-group-item">
													<i class="fas fa-calendar-check text-success"></i> Confirm parent meeting for <strong>Grade 10</strong>
													<span class="text-muted float-end">Due: Tomorrow</span>
												</li>
												<li class="list-group-item">
													<i class="fas fa-chart-line text-warning"></i> Review performance reports
													<span class="text-muted float-end">Due: This Week</span>
												</li>
												<li class="list-group-item">
													<i class="fas fa-bell text-danger"></i> Send reminders for upcoming tests
													<span class="text-muted float-end">Due: 2 Days</span>
												</li>
											</ul>
										</div>
										<div class="card-footer text-end">
											<a class="btn btn-sm btn-link" href="#"><i class="fas fa-plus-circle"></i> Add Task</a>
										</div>
									</div>
							</div>

							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<p class="fw-bold mt-1">📅 Attendance Tracker</p>

										<!-- Today's Attendance -->
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center text-success">
													<i class="fas fa-user-check"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Present Today</p>
													<h4 class="card-title">86%</h4>
												</div>
											</div>
										</div>

										<hr/>

										<!-- Monthly Average -->
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center text-info">
													<i class="fas fa-chart-bar"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Monthly Avg.</p>
													<h4 class="card-title">91%</h4>
												</div>
											</div>
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

<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
</html>
<?php
if (isset($_POST['logout'])) {
	session_destroy();
	header("Location: adminlogin.php");
	exit();
}