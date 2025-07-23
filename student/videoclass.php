<?php
session_start();
$class = $_SESSION['class'] ?? 'N/A';
?>



<!DOCTYPE html>
<html lang="en">

<head>
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
    <script>
function playVideo(videoId) {
    const frame = document.getElementById('videoFrame');
    const container = document.getElementById('videoPlayerContainer');

    frame.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
    container.style.display = 'block';

    // Optional smooth scroll to player
    container.scrollIntoView({ behavior: 'smooth' });
}
</script>

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


    <!-- Header Start -->
<!--Class 8-->
     <?php
$subject = $_GET['subject'] ?? '';

// Optional: Normalize subject name for case-insensitive match
$subject = ucfirst(strtolower($subject));
?>
    <?php if (($subject == "Physics") && ($class == "8")): ?>
    <div class="container py-5">
    <h1 class="text-center text-primary mb-4">Physics Video Classes For Class 8</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php elseif (($subject == "Chemistry") && ($class == "8")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Chemistry Video Classes For Class 8</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php elseif (($subject == "Biology") && ($class == "8")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Biology Video Classes For Class 8</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
    <td>Chapter 1: Introduction</td>
    <td>
        <button class="btn btn-sm btn-primary" onclick="playVideo('abc123')">Watch Video</button>
    </td>
</tr>

                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php elseif (($subject == "Maths") && ($class == "8")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Maths Video Classes For Class 8</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!--Class 9-->
<?php elseif (($subject == "Physics") && ($class == "9")): ?>
    <div class="container py-5">
    <h1 class="text-center text-primary mb-4">Physics Video Classes For Class 9</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php elseif (($subject == "Chemistry") && ($class == "9")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Chemistry Video Classes For Class 9</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php elseif (($subject == "Biology") && ($class == "9")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Biology Video Classes For Class 9</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php elseif (($subject == "Maths") && ($class == "9")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Maths Video Classes For Class 9</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!--class 10-->

<?php elseif (($subject == "Physics") && ($class == "10")): ?>
    <div class="container py-5">
    <h1 class="text-center text-primary mb-4">Physics Video Classes For Class 10</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
    <td>Chapter 1: Introduction</td>
    <td>
        <button class="btn btn-sm btn-primary" onclick="playVideo('Llss1aRo8tw')">Watch Video</button>
    </td>
</tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php elseif (($subject == "Chemistry") && ($class == "10")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Chemistry Video Classes For Class 10</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php elseif (($subject == "Biology") && ($class == "10")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Biology Video Classes For Class 10</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php elseif (($subject == "Maths") && ($class == "10")): ?>
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Maths Video Classes For Class 10</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Chapter Name</th>
                    <th>YouTube Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chapter 1: Introduction</td>
                    <td><a href="https://youtu.be/abc123" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 2: Basics</td>
                    <td><a href="https://youtu.be/def456" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 3: Data Structures</td>
                    <td><a href="https://youtu.be/ghi789" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 4: Functions</td>
                    <td><a href="https://youtu.be/jkl012" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 5: OOP Concepts</td>
                    <td><a href="https://youtu.be/mno345" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 6: File Handling</td>
                    <td><a href="https://youtu.be/pqr678" target="_blank">Watch Video</a></td>
                </tr>
                <tr>
                    <td>Chapter 7: Final Project</td>
                    <td><a href="https://youtu.be/stu901" target="_blank">Watch Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
    <div class="container py-5">
        <h1 class="text-center text-danger">Subject Not Found</h1>
        <p class="text-center">Please go back and select a valid subject.</p>
    </div>
<?php endif; ?>

    <!-- Header End -->
     <div id="videoPlayerContainer" class="mt-4" style="display: none;">
    <h4>Now Playing:</h4>
    <div class="ratio ratio-16x9">
        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
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