<?php
// Database connection
$con = new mysqli("localhost", "root", "", "smartstudy");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$class = $_GET['class'] ?? null;
$subject = $_GET['subject'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $chapter_number = $_POST['chapter_number'];
    $chapter_name = $_POST['chapter_name'];
    $yt_link = $_POST['youtube_link'];

    // ✅ Extract video ID from YouTube link
    parse_str(parse_url($yt_link, PHP_URL_QUERY), $yt_params);
    $video_id = $yt_params['v'] ?? null;

    if ($video_id) {
        $stmt = $con->prepare("INSERT INTO youtube_links (class, subject, chapter_name, chapter_number, video_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $class, $subject, $chapter_name, $chapter_number, $video_id);

        if ($stmt->execute()) {
            echo "<script>alert('YouTube link added successfully!');</script>";
            echo "<script>window.location.href = 'material.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    } else {
        echo "<script>alert('Invalid YouTube URL');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add YouTube Link</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h3>Add YouTube Link for <?= htmlspecialchars($subject) ?> - <?= htmlspecialchars($class) ?> Class</h3>

<form method="POST" class="mt-3">
    <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
    <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">

    <div class="mb-3">
        <label class="form-label">Chapter Number</label>
        <input type="number" name="chapter_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Chapter Name</label>
        <input type="text" name="chapter_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">YouTube Link</label>
        <input type="url" name="youtube_link" class="form-control" placeholder="Paste full YouTube URL here" required>
    </div>

    <button type="submit" class="btn btn-success">Add Link</button>
</form>

</body>
</html>
