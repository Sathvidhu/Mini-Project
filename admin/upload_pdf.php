<?php
// Database connection
$con = new mysqli("localhost", "root", "", "smartstudy");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get class & subject from URL
$class = $_GET['class'] ?? null;
$subject = $_GET['subject'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf_file'])) {
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $chapter_number = $_POST['chapter_number']; // ✅ Fix: take from POST, not GET

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES['pdf_file']['name']);
    $filePath = $uploadDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $filePath)) {
    // Check if PDF already exists for this class + subject + chapter
    $check = $con->prepare("SELECT id FROM pdf_uploads WHERE class=? AND subject=? AND chapter_number=?");
    $check->bind_param("ssi", $class, $subject, $chapter_number);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A PDF already exists for this subject and chapter. Please delete it first or upload a new version.');</script>";
        echo "<script>window.location.href = 'material.php';</script>";
    } else {
        // Insert new PDF record
        $stmt = $con->prepare("INSERT INTO pdf_uploads (class, chapter_number, subject, file_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $class, $chapter_number, $subject, $filePath);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('PDF Uploaded Successfully!');</script>";
        echo "<script>window.location.href = 'material.php';</script>";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h3>Upload PDF for <?= htmlspecialchars($subject) ?> - <?= htmlspecialchars($class) ?> Class</h3>

<form method="POST" enctype="multipart/form-data" class="mt-3">
    <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
    <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">

    <div class="mb-3">
        <label class="form-label">Choose PDF File</label>
        <input type="file" name="pdf_file" accept="application/pdf" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Chapter Number</label>
        <input type="number" name="chapter_number" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Upload PDF</button>
</form>

</body>
</html>
