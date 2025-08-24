<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "smartstudy");

// Student details from session
$email = $_SESSION['email'] ?? null;
$fname = $_SESSION['fname'] ?? 'Guest';
$class = $_SESSION['class'] ?? null;

// Subjects (static for now)
$subjects = ["Biology", "Chemistry", "Physics", "Maths"];

// Get selected subject & chapter
$subject = $_GET['subject'] ?? null;
$chapter = $_GET['chapter'] ?? null;

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $subject && $chapter) {
    foreach ($_POST['answers'] as $question_id => $selected) {
        // Get correct answer
        $correct_sql = "SELECT id FROM mocktest_options WHERE question_id=$question_id AND is_correct=1";
        $correct_res = mysqli_query($con, $correct_sql);
        $correct_row = mysqli_fetch_assoc($correct_res);
        $correct_option_id = $correct_row['id'];

        $is_correct = ($selected == $correct_option_id) ? 1 : 0;

        // Save result
        $stmt = $con->prepare("INSERT INTO mocktest_results 
            (student_email, student_name, class, subject, question_id, selected_option, is_correct, chapter) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisis", $email, $fname, $class, $subject, $question_id, $selected, $is_correct, $chapter);
        $stmt->execute();
        $stmt->close();
    }

    echo "<script>alert('Mock test submitted successfully!');</script>";
    echo "<script>window.location.href='dashboard.php';</script>";
    exit();
}

// Fetch questions only if subject & chapter selected
$q_res = null;
if ($subject && $chapter) {
    $q_sql = "SELECT * FROM mocktest_questions WHERE class='$class' AND subject='$subject' AND chapter_number='$chapter'";
    $q_res = mysqli_query($con, $q_sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mock Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta charset="utf-8">
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
    <?php if ($subject && $chapter): ?>
    <!-- ✅ Back button to chapter selection -->
    <a href="?subject=<?= urlencode($subject) ?>" class="btn btn-secondary mb-3">⬅ Back to Chapters</a>

<?php elseif ($subject && !$chapter): ?>
    <!-- ✅ Back button to subject selection -->
    <a href="take_mocktest.php" class="btn btn-secondary mb-3">⬅ Back to Subjects</a>
<?php endif; ?>
    <!-- Navbar End -->
    <div class="container mt-4">
        
    <h3>Mock Test - Class <?= htmlspecialchars($class) ?></h3>
    <p>Student: <strong><?= htmlspecialchars($fname) ?></strong> (<?= htmlspecialchars($email) ?>)</p>

    

    <!-- Subject Selection -->
    <div class="mb-4">
        <h5>Select Subject:</h5>
        <?php foreach ($subjects as $sub): ?>
            <a href="?subject=<?= urlencode($sub) ?>" 
               class="btn btn-outline-primary me-2 <?= ($sub == $subject ? 'active' : '') ?>">
                <?= $sub ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if ($subject && !$chapter): ?>
        <!-- Ask for Chapter Selection -->
        <h5>Select Chapter for <?= htmlspecialchars($subject) ?>:</h5>
        <?php for ($i=1; $i<=5; $i++): ?>
            <a href="?subject=<?= urlencode($subject) ?>&chapter=<?= $i ?>" 
               class="btn btn-outline-success me-2">
                Chapter <?= $i ?>
            </a>
        <?php endfor; ?>

    <?php elseif ($subject && $chapter): ?>
        <h4>Subject: <?= htmlspecialchars($subject) ?> | Chapter <?= htmlspecialchars($chapter) ?></h4>
        <form method="POST">
            <?php while ($q = mysqli_fetch_assoc($q_res)) : ?>
                <div class="card mb-3">
                    <div class="card-header">
                        Q<?= $q['id'] ?>: <?= htmlspecialchars($q['question']) ?>
                    </div>
                    <div class="card-body">
                        <?php
                        $opts = mysqli_query($con, "SELECT * FROM mocktest_options WHERE question_id=" . $q['id']);
                        while ($o = mysqli_fetch_assoc($opts)) :
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                       name="answers[<?= $q['id'] ?>]" 
                                       value="<?= $o['id'] ?>" required>
                                <label class="form-check-label">
                                    <?= htmlspecialchars($o['option_text']) ?>
                                </label>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endwhile; ?>

            <button type="submit" class="btn btn-success">Submit Test</button>
        </form>
    <?php else: ?>
        <div class="alert alert-info">👉 Please select a subject to start the test.</div>
    <?php endif; ?>

</div>

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
