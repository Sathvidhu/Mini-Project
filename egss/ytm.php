<!DOCTYPE html>
<html>
<head>
    <title>Video with Quiz</title>
</head>
<body>

<!-- Video Trigger -->
<table align="center" border="1">
    <tr>
        <th>Chapter 1</th>
        <td><a href="#" onclick="player.playVideo()">Click here</a></td>
    </tr>
</table>

<!-- YouTube Video Player -->
<div id="player"></div>

<!-- Hidden Quiz -->
<div id="quiz" style="display:none; margin-top: 20px;">
    <h3>Quiz: What was the video about?</h3>
    <form id="quizForm">
        <label><input type="radio" name="answer" value="A"> Option A</label><br>
        <label><input type="radio" name="answer" value="B"> Option B</label><br>
        <label><input type="radio" name="answer" value="C"> Option C</label><br>
        <label><input type="radio" name="answer" value="D"> Option D</label><br><br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>
    <p id="result" style="font-weight: bold;"></p>
</div>

<!-- YouTube API -->
<script src="https://www.youtube.com/iframe_api"></script>

<script>
    let player;
    let secondsWatched = 0;
    let timer;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: 'biP_DcN4sPs',
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
            timer = setInterval(() => {
                secondsWatched++;
                if (secondsWatched >= 30) {
                    clearInterval(timer);
                    showQuiz();
                }
            }, 1000);
        } else {
            clearInterval(timer);
        }
    }

    function showQuiz() {
        document.getElementById('quiz').style.display = 'block';
        player.stopVideo();
    }

    function submitQuiz() {
        const selected = document.querySelector('input[name="answer"]:checked');
        const result = document.getElementById("result");

        if (!selected) {
            result.innerText = "Please select an answer!";
            result.style.color = "red";
            return;
        }

        if (selected.value === "B") {  // change as per correct answer
            result.innerText = "Correct!";
            result.style.color = "green";
        } else {
            result.innerText = "Incorrect. Please review the video.";
            result.style.color = "red";
        }
    }
</script>

</body>
</html>
