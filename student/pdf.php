<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "smartstudy"); // your DB connection file

// Get class from session
$class = $_SESSION['class'] ?? 'N/A';
if (!$class) {
    die("Class not set in session.");
}

// Fetch distinct subjects for the student's class
$subjectQuery = $con->prepare("SELECT DISTINCT subject FROM pdf_uploads WHERE class = ?");
$subjectQuery->bind_param("s", $class);
$subjectQuery->execute();
$subjectsResult = $subjectQuery->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View PDFs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <style>
        .subject-card { margin-bottom: 15px; }
    </style>
</head>
<body>
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
    <div class="container mt-4">
        <h2 class="mb-4">Available PDFs for Class: <?php echo htmlspecialchars($class); ?></h2>

    <?php if ($subjectsResult->num_rows > 0): ?>
        <div class="accordion" id="subjectAccordion">
            <?php 
            $i = 1;
            while ($subjectRow = $subjectsResult->fetch_assoc()): 
                $subject = $subjectRow['subject'];

                // Fetch PDFs chapter-wise for this subject
                $pdfQuery = $con->prepare("SELECT * FROM pdf_uploads WHERE class = ? AND subject = ? ORDER BY chapter_number ASC");
                $pdfQuery->bind_param("ss", $class, $subject);
                $pdfQuery->execute();
                $pdfs = $pdfQuery->get_result();
            ?>
            <div class="accordion-item subject-card">
                <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                        <?php echo htmlspecialchars($subject); ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#subjectAccordion">
                    <div class="accordion-body">
                        <?php if ($pdfs->num_rows > 0): ?>
                            <ul class="list-group">
                                <?php while ($pdf = $pdfs->fetch_assoc()): ?>
                                    <li class="list-group-item">
                                        Chapter <?php echo htmlspecialchars($pdf['chapter_number']); ?> - 
                                        <a href="smartstudy/<?php echo htmlspecialchars($pdf['file_path']); ?>" target="_blank">View PDF</a>

                                        
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <p>No PDFs available for this subject.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php 
                $i++;
            endwhile; 
            ?>
        </div>
    <?php else: ?>
        <p>No subjects found for your class.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
