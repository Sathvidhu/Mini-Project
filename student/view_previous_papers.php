<?php
session_start();
$con = new mysqli("localhost", "root", "", "smartstudy");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Student details from session
$class = $_SESSION['class'] ?? null;

// If subject is selected
$subject = $_GET['subject'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Previous Year Question Papers</title>
    <title class="fa fa-user-graduate mr-3">Smart Study Planner</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body >
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+918882282828</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>smartstudy@gmail.com</small>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-user-graduate mr-3"></i>Smart Studey Planner</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                
               <div class="ml-auto"> <a href="dashboard.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">HOME</a></div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
<div class="container mt-5">
    <h3 class="mb-4">Previous Year Papers - Class <?= htmlspecialchars($class) ?></h3>

<?php if (!$subject): ?>
    <h5>Select Subject</h5>
    <div class="list-group">
        <a href="?subject=Biology" class="list-group-item list-group-item-action">Biology</a>
        <a href="?subject=Chemistry" class="list-group-item list-group-item-action">Chemistry</a>
        <a href="?subject=Physics" class="list-group-item list-group-item-action">Physics</a>
        <a href="?subject=Maths" class="list-group-item list-group-item-action">Maths</a>
    </div>

<?php else: ?>
    <a href="view_previous_papers.php" class="btn btn-secondary mb-3">← Back to Subjects</a>
    <h5><?= htmlspecialchars($subject) ?> - Papers</h5>

    <?php
    // Fetch PDFs for this subject & class
    $stmt = $con->prepare("SELECT chapter_number, file_path FROM previous_papers WHERE class=? AND subject=? ORDER BY chapter_number ASC");
    $stmt->bind_param("ss", $class, $subject);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chapter</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>Chapter <?= htmlspecialchars($row['chapter_number']) ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank" class="btn btn-sm btn-primary">View PDF</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No previous year papers uploaded for this subject yet.</p>
    <?php endif; ?>
<?php endif; ?>
 </div>

 <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-user-graduate mr-3"></i>Smart Study Planner</h1>
                    </a>
                    <p class="m-0">Study Smart, Not Hard - Let Our Planner Guide Your Success.</p>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">AJ & TEAM</a></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
