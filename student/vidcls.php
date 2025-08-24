<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Smart Study Planner</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script>
        function playVideo(videoId) {
    const frame = document.getElementById('videoFrame');
    const container = document.getElementById('videoPlayerContainer');
    frame.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
    container.style.display = 'block';
    container.scrollIntoView({ behavior: 'smooth' });
}

        
    </script>

    <style>
        .iframe {
            width: 100%;
            height: 650px;
            border: none;
        }
    </style>
</head>

<body>

<!-- Header -->
<div class="container-fluid bg-dark">
    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-white">
            <i class="fa fa-phone-alt mr-2"></i> +918882282828
            <span class="px-3">|</span>
            <i class="fa fa-envelope mr-2"></i> smartstudy@gmail.com
        </div>
    </div>
</div>

<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-user-graduate mr-3"></i>Smart Study Planner</h1>
        </a>
        <div class="ml-auto">
            <a href="dashboard.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">HOME</a>
        </div>
    </nav>
</div>

<?php
// Get subject and class from URL, fallback to default
$subject = ucfirst(strtolower($_GET['subject'] ?? 'Physics'));
$class = intval($_GET['class'] ?? 10);

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'class10');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume table name matches subject in lowercase—e.g., 'physics'
$table = strtolower($subject);

// Fetch row (assuming one row per subject/class combination)
$sql = "SELECT * FROM `$table` LIMIT 1";
$result = $conn->query($sql);

$chapterNames = [
    1 => "Chapter 1: Introduction",
    2 => "Chapter 2: Basics",
    3 => "Chapter 3: Data Structures",
    4 => "Chapter 4: Functions",
    5 => "Chapter 5: OOP Concepts",
    6 => "Chapter 6: File Handling",
    7 => "Chapter 7: Final Project"
];

if ($row = $result->fetch_assoc()): ?>
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4"><?= htmlspecialchars($subject) ?> Video Classes For Class <?= $class ?></h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Chapter Name</th>
                        <th>YouTube Link</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 1; $i <= 7; $i++):
                    $videoId = $row["chapter$i"];
                    ?>
                    <tr>
                        <td><?= $chapterNames[$i] ?></td>
                        <td>
                            <?php if($videoId && trim($videoId) != ""): ?>
                                <button class="btn btn-sm btn-primary" onclick="playVideo('<?= htmlspecialchars($videoId) ?>')">Watch Video</button>
                            <?php else: ?>
                                <span>No Video Available</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">No Video Classes Available</h1>
        <p class="text-center">Sorry, there are no video classes available for this subject and class.</p>
    </div>
<?php 
endif;
$conn->close();
?>
<!-- Video Player -->
<div id="videoPlayerContainer" class="container mt-4" style="display: none;">
    <h4>Now Playing:</h4>
    <div class="ratioratio-16x9">
        <iframe id="videoFrame" class="iframe" src="" allowfullscreen></iframe>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <h1 class="text-uppercase text-white"><i class="fa fa-user-graduate mr-3"></i>Smart Study Planner</h1>
                <p>Study Smart, Not Hard - Let Our Planner Guide Your Success.</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white-50 border-top py-4">
    <div class="container text-center">
        <p class="m-0">Designed by <a class="text-white" href="#">AJ & TEAM</a></p>
    </div>
</div>


<a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>