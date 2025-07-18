<?php
session_start();
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SMART-STUDY PLANNER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <script>
        let startTime = Date.now();
        window.addEventListener('beforeunload', function () {
        let endTime = Date.now();
        let timeSpent = Math.floor((endTime - startTime) / 1000);
         navigator.sendBeacon('track_time.php', new URLSearchParams({
        time_spent: timeSpent
    }));
});
</script>
<script>
    std-nm {
        text-align: right;
        color: white;
        font-size: 20px;
        margin-top: 10px;
    }
</script>

<script>

<?php
 $con=mysqli_connect("localhost","root","","smartstudy");
 extract($_POST);
 $attandance = 0;
 $s="select * from registration where attandance='$attandance'";
 $a=mysqli_query($con,$s);
 echo mysqli_affected_rows($con);
 if($attandance == 1)
  {
    ?>
        <script>
        Swal.fire({
            icon: 'info',
            title: 'Complete Your Profile',
            text: 'Redirecting to Profile Page...',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "Profile.php";
            }
        });
        </script>
        <?php
  }
  else
   {
    ?>  
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error On Profile!',
            text: 'Incorrect password. Please try again.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Retry'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "login.php";
            }
        });
        </script>
        <?php
   }

?>
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
    <div class="row py-2 px-lg-5 align-items-center">
        <!-- Left side -->
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small><i class="fa fa-phone-alt mr-2"></i>+918882282828</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>smartstudy@gmail.com</small>
            </div>
        </div>

        <!-- Right side -->
        <div class="col-lg-6 text-center text-lg-right text-white">
            <small><i class="fa fa-user mr-2"></i>Welcome <?php echo $email; ?></small>
        </div>
    </div>
</div>



    <!-- Navbar Start -->
    <div align="center" class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5 justify-content-center">
    <a href="#" class="navbar-brand">
        <h1 class="m-0 text-uppercase text-primary">
            <i class="fa fa-user-graduate mr-3"></i>Smart Study Planner
        </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <!--<a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">Subjects</a>
                    <a href="course.html" class="nav-item nav-link active">Qes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.html" class="dropdown-item">Course Detail</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="team.html" class="dropdown-item">Instructors</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>-->
                </div>
                <a href="login.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">LOG OUT</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Study Materials</h1>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
            <h4 class="text-white display-3">Swipe Down</h4>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <div class="container text-center py-5">
                <div class="mx-auto mb-5" style="width: 100%; max-width: 500px;">
            </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                        <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="videoclass.php">
                        <img class="img-fluid" src="img/courses-1.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Video Classes</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="mocktest.php">
                        <img class="img-fluid" src="img/courses-2.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Mock Test</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="pdf.php">
                        <img class="img-fluid" src="img/courses-3.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">PDF'S</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="questionpaper.php">
                        <img class="img-fluid" src="img/courses-4.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Question Papaer</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="#">
                        <img class="img-fluid" src="img/courses-5.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Attandance</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="mark.php">
                        <img class="img-fluid" src="img/courses-6.jpg" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Mark List</h4>
                            <div class="border-top w-100 mt-3">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <!--<div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                          <li class="page-item disabled">
                            <a class="page-link rounded-0" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link rounded-0" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>-->
            </div>
        </div>
    </div>
    <!-- Courses End -->


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