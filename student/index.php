<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smart Study Planner</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  function checkpass() {
    let pass = document.getElementById("pass11").value;
    let pass1 = document.getElementById("pass22").value;

    if (pass === pass1) {
        <?php
        echo "hii";
        ?>
            c.innerHTML="<font color = 'green'> Password Matching </font>";
            return true; 
    } else {
        <?php
        echo "hii";
        ?>
      Swal.fire({
        title: "Password Mismatch!",
        text: "Passwords do not match. Please try again.",
        icon: "error",
        confirmButtonText: "OK"
      });
      return false; // prevent form submission
    }
  }
</script>
        
    </script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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


    <!--scripit for sweet alert -->
    
    

 <!--scripit for sweet alert -->


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
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-user-graduate mr-3"></i>SmartStudy</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                   <!-- <a href="index.php" class="nav-item nav-link active">Home</a>-->
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="course.html" class="nav-item nav-link">Study Tips</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Classes</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Class 8</a>
                            <a href="feature.html" class="dropdown-item">Class 9</a>
                            <a href="team.html" class="dropdown-item">Class 10</a>
                           <!-- <a href="testimonial.html" class="dropdown-item">Testimonial</a>-->
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <button type="button" class="btn btn-primary py-2 px-4" onclick="window.location.href='login.php'">Login</button>
                 &nbsp; &nbsp; &nbsp; &nbsp;
                <button type="button" class="btn btn-primary py-2 px-3" onclick ="window.location.href='registration.php'">Register</button>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Plan Your Success</h1>
            <h1 class="text-white display-1 mb-5">Smart Study Planner</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Classes</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"  >Class 8</a>
                            <a class="dropdown-item" href="#">Class 9</a>
                            <a class="dropdown-item" href="#">Class 10</a>
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Subject">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                        <h1 class="display-4">Your Personal Guide to Smarter Studying</h1>
                    </div>
                    <p>Smart Study Planner is designed to help students take control of their academic journey. Whether you're preparing for exams, managing assignments, or creating efficient study routines, our platform makes planning simple and effective. With intuitive tools and personalized insights, we help you study smarter — not harder.</p>
                    <div class="row pt-3 mx-0">
                        <div class="col-3 px-0">
                            <div class="bg-success text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">40</h1>
                                <h6 class="text-uppercase text-white">Study<span class="d-block">Subjects</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-primary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">500</h1>
                                <h6 class="text-uppercase text-white">Custom<span class="d-block">Study Plans</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-secondary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">1500</h1>
                                <h6 class="text-uppercase text-white">Daily<span class="d-block">Active Users</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">1500</h1>
                                <h6 class="text-uppercase text-white">User<span class="d-block">Satisfaction</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

<div class="row justify-content-center bg-image mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5">
                    <h1 class="text-center mb-4">Why You Are Waiting!!</h1>
                    <form method="post" action="">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="padding: 30px 20px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="padding: 30px 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="custom-select bg-light border-0 px-3" style="height: 60px;">
                                    <option selected>Select Class</option>
                                    <option value="1">Class 8</option>
                                    <option value="2">Class 9</option>
                                    <option value="3">Class 10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary btn-block" type="submit" name="regi" id="regi" style="height: 60px;">Register Now</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Instructors</h6>
                <h1 class="display-4">Meet Our Team</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">Amrutha</h5>
                        <p class="mb-2">Physics Deparment</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">Kiran K</h5>
                        <p class="mb-2">Chemistry Department</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">Swetha</h5>
                        <p class="mb-2">Maths Deparment</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">Kamal</h5>
                        <p class="mb-2">Biology Department</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                        <h1 class="display-4">What Say Our Students</h1>
                    </div>
                    <p class="m-0">Dolor est dolores et nonumy sit labore dolores est sed rebum amet, justo duo ipsum sanctus dolore magna rebum sit et. Diam lorem ea sea at. Nonumy et at at sed justo est nonumy tempor. Vero sea ea eirmod, elitr ea amet diam ipsum at amet. Erat sed stet eos ipsum diam</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="img/testimonial-2.jpg" alt="">
                                <div>
                                    <h5>Student Name</h5>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="img/testimonial-1.jpg" alt="">
                                <div>
                                    <h5>Student Name</h5>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->


    


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-user-graduate mr-3"></i>SmartStudy</h1>
                    </a>
                    <p class="m-0">SmartStudy Planner is a user-friendly tool designed to help students organize their study schedules effectively. It allows users to plan their daily tasks, set goals, and keep track of their academic progress. With its clean interface and helpful features, SmartStudy Planner makes time management easier, helping students stay focused and reduce stress during exams and assignments.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Login Here</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-phone-alt mr-2"></i>+918882282828</p>
                    <p><i class="fa fa-envelope mr-2"></i>smartstudy@gmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Our Services</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Focus Sessions</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Time Management Tracker</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Crate Time Table</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chapterwise Question Paper</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Exams</a>
                    </div>
                </div>
                <!--<div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0"><a class="text-white" href="#"></a>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="#">AJ AND TEAM</a><a href="#" target="_blank"></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

<!-- Modal 
<div class="modal fade" id="exampleModal2" tabindex="-1" data-backdrop="static"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" onsubmit="return checkpass();" >
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" id="name" name="name" placeholder="Name" style="padding: 30px 20px;" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control bg-light border-0" placeholder="Date Of Birth" id="dob" name="dob" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Name of School" id="school" name="school" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-block mb-2">Standard</label>
                                   <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="std" id="eig" value="eig">
                                     <label class="form-check-label">8</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="std" id="nine" value="nine">
                                      <label class="form-check-label" >9</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="std" id="ten" value="ten">
                                      <label class="form-check-label" >10</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-block mb-2">Gender</label>
                                   <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                     <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                      <label class="form-check-label" for="female">Female</label>
                                     </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Phone Number" id="phn" name="phn" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Guardian's Phone Number" id="gphn" name="gphn" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control bg-light border-0" placeholder="E-Mail" name="email" id="email" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control bg-light border-0" placeholder="Password" pattern="[A-Za-z0-9]{8,}" id="pass11" name="password" style="padding: 30px 20px;" required>
                                </div>
                            </div>

                            <div class="col-sm-6" >
                                <div class="form-group" >
                                    <input type="password" class="form-control bg-light border-0"  placeholder="Re-Enter Password" pattern="[A-Za-z0-9]{8,}" id="pass22" onchange="checkpass()"; style="padding: 30px 20px;" required>
                                </div>
                            </div>
                        
                        
                         
                            <div class="col-sm-6" >
                                <button  class="btn btn-primary btn-block" type="submit" name="reg" id="reg" style="height: 60px;width:460px;">Register</button>
                            </div>
                            
                        </div>
                    </form>
      </div>
      
      <div class="modal-footer">
        <div><button type="button" class="btn btn-secondary" style="left: 15px; top: 15px;" data-dismiss="modal">Close</button></div>
        <button type="button" class="btn btn-primary">login</button>
      </div>
    </div>
  </div>
</div>
 Modal End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    

 <?php
 if (isset($_POST ["reg"])){
            // echo "j";
        
        $con = mysqli_connect("localhost","root","","smart");
        extract($_POST);
        $s="insert into registration(name,dob,school,std,gender,phn,gphn,email,password) values('$name','$dob','$school','$std','$gender','$phn','$gphn','$email','$password')";
        $z=mysqli_query($con,$s);
        if($z)
        {
           ?>
           '<script>
                    Swal.fire({
                    title: "Success!",
                    text: "Successfully",
                    icon: "success",
                    confirmButtonText: "OK"
                    }).then(() => {
                        sessionStorage.setItem('alertShown','true');
                    window.location.href = "login.php";
                    });
                    </script>';
           <?php
        }
        else {
            echo "hi";
            ?>
            <h1>hi</h1>
            <script type="text/javascript">
                alert("data unsuccessfully");
                window.location="course.php";
              </script>
            <?php
         
        }

}


?>


</body>

</html>

