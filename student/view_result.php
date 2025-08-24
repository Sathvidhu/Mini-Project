<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "smartstudy");

$email = $_SESSION['email'] ?? null;
$fname = $_SESSION['fname'] ?? 'Guest';
$class = $_SESSION['class'] ?? null;

// Which subject student clicked
$subject = $_GET['subject'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Mock Test</title>
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
    <h3>Mock Test - Class <?= htmlspecialchars($class) ?></h3>
    <p>Student: <strong><?= htmlspecialchars($fname) ?></strong> (<?= htmlspecialchars($email) ?>)</p>

    <!-- Subject Selection -->
    <div class="mb-3">
        <h5>Select Subject:</h5>
        <a href="?subject=Biology" class="btn btn-outline-primary me-2">Biology</a>
        <a href="?subject=Chemistry" class="btn btn-outline-success me-2">Chemistry</a>
        <a href="?subject=Physics" class="btn btn-outline-warning me-2">Physics</a>
        <a href="?subject=Maths" class="btn btn-outline-info">Maths</a>
    </div>

    <?php if ($subject): ?>
        <hr>
        <h4>Subject: <?= htmlspecialchars($subject) ?></h4>

        <?php
        // Get score for this subject
        $score_sql = "SELECT COUNT(*) as correct 
                      FROM mocktest_results 
                      WHERE student_email='$email' AND class='$class' AND subject='$subject' AND is_correct=1";
        $score_res = mysqli_query($con, $score_sql);
        $correct = mysqli_fetch_assoc($score_res)['correct'] ?? 0;

        $total_sql = "SELECT COUNT(*) as total 
                      FROM mocktest_results 
                      WHERE student_email='$email' AND class='$class' AND subject='$subject'";
        $total_res = mysqli_query($con, $total_sql);
        $total = mysqli_fetch_assoc($total_res)['total'] ?? 0;
        ?>

        <div class="alert alert-info">
            <h5>Your Score: <?= $correct ?> / <?= $total ?></h5>
        </div>

        <button class="btn btn-primary mb-3" onclick="document.getElementById('answersDiv').style.display='block'">Show Answers</button>

        <div id="answersDiv" style="display:none;">
        <?php
        $q_sql = "SELECT q.id, q.question 
                  FROM mocktest_questions q 
                  JOIN mocktest_results r ON q.id = r.question_id 
                  WHERE r.student_email='$email' AND r.class='$class' AND r.subject='$subject'";
        $q_res = mysqli_query($con, $q_sql);

        while ($q = mysqli_fetch_assoc($q_res)) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-header'><strong>Q: " . htmlspecialchars($q['question']) . "</strong></div>";
            echo "<div class='card-body'>";

            $opts = mysqli_query($con, "SELECT * FROM mocktest_options WHERE question_id=" . $q['id']);
            $student_ans = mysqli_fetch_assoc(mysqli_query($con, "SELECT selected_option FROM mocktest_results WHERE question_id=" . $q['id'] . " AND student_email='$email'"))['selected_option'];

            while ($o = mysqli_fetch_assoc($opts)) {
                $isCorrect = $o['is_correct'] ? " <span class='badge bg-success'>Correct</span>" : "";
                $selected = ($o['id'] == $student_ans) ? "checked" : "";
                
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' disabled $selected>";
                echo "<label class='form-check-label'>" . htmlspecialchars($o['option_text']) . " $isCorrect</label>";
                echo "</div>";
            }
            echo "</div></div>";
        }
        ?>
        </div>
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
