<html>
    <head>
       <title>
        classes
       </title>
    </head>
    <body>
    <table align="center" border="1">
        <tr>
            <th>Chapter 1</th>
            <td><button id="playBtn" onclick="startVideo()" disabled>Click here</button></td>
        </tr>
    </table>
<div id="player" style="margin-top: 20px;"></div>

<!-- YouTube IFrame API -->
<script src="https://www.youtube.com/iframe_api"></script>

<script>
    let player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: 'biP_DcN4sPs', // Just the video ID
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        // Enable the button when player is ready
        document.getElementById('playBtn').disabled = false;
    }

    function startVideo() {
        if (player && typeof player.playVideo === 'function') {
            player.playVideo();
        }
    }
</script>

    
</body>

</html>