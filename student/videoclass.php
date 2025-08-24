<?php
session_start();
$con = new mysqli("localhost", "root", "", "smartstudy");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Student details
$class = $_SESSION['class'] ?? "10";
$subject = $_GET['subject'] ?? "Physics"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #videoContainer {
            display: none;
            margin-top: 30px;
            text-align: center;
        }
        #videoFrame {
            width: 90%;
            height: 500px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="container py-5">

<h2 class="mb-4 text-primary"><?= htmlspecialchars($subject) ?> Video Classes - Class <?= htmlspecialchars($class) ?></h2>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Chapter Name</th>
                <th>Watch</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $con->prepare("SELECT chapter_number, chapter_name, video_id FROM youtube_links WHERE class=? AND subject=? ORDER BY chapter_number ASC");
            $stmt->bind_param("ss", $class, $subject);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['chapter_name']) . "</td>";
                    echo "<td><button class='btn btn-sm btn-primary' onclick=\"playVideo('" . htmlspecialchars($row['video_id']) . "', '" . $row['chapter_number'] . "')\">View</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No videos uploaded yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Video Player (Bottom) -->
<div id="videoContainer">
    <div id="player"></div>
</div>

<script>
let currentChapter = null;

// Load YouTube API
let tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '500',
        width: '90%',
        videoId: '',
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

function playVideo(videoId, chapterNumber) {
    currentChapter = chapterNumber;
    document.getElementById("videoContainer").style.display = "block";
    player.loadVideoById(videoId);
    document.getElementById("videoContainer").scrollIntoView({ behavior: "smooth" });
}

// Detect video end
function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.ENDED && currentChapter) {
        Swal.fire({
            title: "Great job! 🎉",
            text: "You’ve finished Chapter " + currentChapter + ". Do you want to attempt the mock test now?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, take test",
            cancelButtonText: "Later"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "take_mocktest.php?chapter=" + currentChapter + "&subject=<?= $subject ?>&class=<?= $class ?>";
            }
        });
    }
}
</script>

</body>
</html>
