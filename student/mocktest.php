<!DOCTYPE html>
<html>
<head>
    <title>Mock Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0px;
            background-color: #f4f4f4;
        }
        .question {
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 6px rgba(0,0,0,0.1);
        }
        .question h4 {
            margin-bottom: 10px;
        }
        .btnn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        .btnn:hover {
            background-color: #0056b3;
        }
        #result {
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
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

<h2>Mock Test - Auto Graded</h2>
<form id="mockTestForm">

    <div class="question">
        <h4>1. Capital of France?</h4>
        <label><input type="radio" name="q1" value="a"> Paris</label><br>
        <label><input type="radio" name="q1" value="b"> Rome</label><br>
        <label><input type="radio" name="q1" value="c"> Madrid</label>
    </div>

    <div class="question">
        <h4>2. 5 + 3 = ?</h4>
        <label><input type="radio" name="q2" value="a"> 6</label><br>
        <label><input type="radio" name="q2" value="b"> 8</label><br>
        <label><input type="radio" name="q2" value="c"> 10</label>
    </div>

    <div class="question">
        <h4>3. Red Planet?</h4>
        <label><input type="radio" name="q3" value="a"> Mars</label><br>
        <label><input type="radio" name="q3" value="b"> Jupiter</label><br>
        <label><input type="radio" name="q3" value="c"> Venus</label>
    </div>

    <div class="question">
        <h4>4. Author of Hamlet?</h4>
        <label><input type="radio" name="q4" value="a"> Dickens</label><br>
        <label><input type="radio" name="q4" value="b"> Shakespeare</label><br>
        <label><input type="radio" name="q4" value="c"> Chaucer</label>
    </div>

    <div class="question">
        <h4>5. Boiling point of water?</h4>
        <label><input type="radio" name="q5" value="a"> 90°C</label><br>
        <label><input type="radio" name="q5" value="b"> 100°C</label><br>
        <label><input type="radio" name="q5" value="c"> 110°C</label>
    </div>

    <div class="question">
        <h4>6. Currency of Japan?</h4>
        <label><input type="radio" name="q6" value="a"> Won</label><br>
        <label><input type="radio" name="q6" value="b"> Yuan</label><br>
        <label><input type="radio" name="q6" value="c"> Yen</label>
    </div>

    <div class="question">
        <h4>7. HTML stands for?</h4>
        <label><input type="radio" name="q7" value="a"> Hyper Text Markup Language</label><br>
        <label><input type="radio" name="q7" value="b"> High Text Machine Language</label><br>
        <label><input type="radio" name="q7" value="c"> Hyperlinks Text Management Language</label>
    </div>

    <div class="question">
        <h4>8. Smallest prime number?</h4>
        <label><input type="radio" name="q8" value="a"> 1</label><br>
        <label><input type="radio" name="q8" value="b"> 2</label><br>
        <label><input type="radio" name="q8" value="c"> 3</label>
    </div>

    <div class="question">
        <h4>9. Plants absorb?</h4>
        <label><input type="radio" name="q9" value="a"> Oxygen</label><br>
        <label><input type="radio" name="q9" value="b"> Nitrogen</label><br>
        <label><input type="radio" name="q9" value="c"> Carbon Dioxide</label>
    </div>

    <div class="question">
        <h4>10. H₂O is?</h4>
        <label><input type="radio" name="q10" value="a"> Oxygen</label><br>
        <label><input type="radio" name="q10" value="b"> Hydrogen</label><br>
        <label><input type="radio" name="q10" value="c"> Water</label>
    </div>

    <div class="ml-auto"><input type="button" value="Submit" class="btnn" onclick="gradeTest()"></div>
</form>

<div id="result"></div>

<script>
function gradeTest() {
    const answers = {
        q1: "a",
        q2: "b",
        q3: "a",
        q4: "b",
        q5: "b",
        q6: "c",
        q7: "a",
        q8: "b",
        q9: "c",
        q10: "c"
    };

    let score = 0;
    for (let q in answers) {
        const selected = document.querySelector(`input[name="${q}"]:checked`);
        if (selected && selected.value === answers[q]) {
            score++;
        }
    }

    document.getElementById("result").innerHTML = `You scored <strong>${score}/10</strong>.`;
}
</script>

</body>
</html>
