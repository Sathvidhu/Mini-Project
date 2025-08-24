<?php
session_start();
// Expect the app to have already set $_SESSION['email'] at login
$email = $_SESSION['email'] ?? null;

// ---- DB Connection ----
$con = mysqli_connect("localhost", "root", "", "smartstudy");
if (!$con) {
    die("<h3 style='font-family:sans-serif;color:#b91c1c'>DB connection failed: " . htmlspecialchars(mysqli_connect_error()) . "</h3>");
}

// ---- Constants ----
$SUBJECTS = ["Maths", "Physics", "Chemistry", "Biology"];
$LEVELS = [
    1 => "Very Easy",
    2 => "Easy",
    3 => "Medium",
    4 => "Hard",
    5 => "Very Hard",
];

// Create table if it doesn't exist (idempotent safety)
mysqli_query($con, "CREATE TABLE IF NOT EXISTS table_student_subject_ranking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(191) NOT NULL,
    subject_name VARCHAR(100) NOT NULL,
    difficulty_level TINYINT NOT NULL,
    UNIQUE KEY unique_email_subject (email, subject_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$save_ok = null; // null=no attempt, true=ok, false=fail
$msg = '';

if (!$email) {
    // Not logged in scenario
    $msg = 'You are not logged in. Please set $_SESSION[\'email\'] after login.';
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and save
    mysqli_begin_transaction($con);
    try {
        // Delete old rows for this email (simpler than upserts)
        $del = mysqli_prepare($con, "DELETE FROM table_student_subject_ranking WHERE email = ?");
        mysqli_stmt_bind_param($del, 's', $email);
        mysqli_stmt_execute($del);
        mysqli_stmt_close($del);

        $ins = mysqli_prepare($con, "INSERT INTO table_student_subject_ranking (email, subject_name, difficulty_level) VALUES (?,?,?)");

        foreach ($SUBJECTS as $subj) {
            $field = 'diff_' . strtolower($subj);
            $level = isset($_POST[$field]) ? (int)$_POST[$field] : 3; // default Medium
            if ($level < 1 || $level > 5) { $level = 3; }
            mysqli_stmt_bind_param($ins, 'ssi', $email, $subj, $level);
            mysqli_stmt_execute($ins);
        }
        mysqli_stmt_close($ins);

        mysqli_commit($con);
        $save_ok = true;
        $msg = 'Your rankings were updated.';
    } catch (Throwable $e) {
        mysqli_rollback($con);
        $save_ok = false;
        $msg = 'Save failed: ' . $e->getMessage();
    }
}

// Fetch existing values for prefill
$prefill = [
    'diff_maths' => 3, 'diff_physics' => 3, 'diff_chemistry' => 3, 'diff_biology' => 3
];
if ($email) {
    $sel = mysqli_prepare($con, "SELECT subject_name, difficulty_level FROM table_student_subject_ranking WHERE email = ?");
    mysqli_stmt_bind_param($sel, 's', $email);
    mysqli_stmt_execute($sel);
    $res = mysqli_stmt_get_result($sel);
    while ($row = mysqli_fetch_assoc($res)) {
        $key = 'diff_' . strtolower($row['subject_name']);
        if (isset($prefill[$key])) {
            $prefill[$key] = (int)$row['difficulty_level'];
        }
    }
    mysqli_stmt_close($sel);
}

function options_html($LEVELS, $selected) {
    $h = '';
    foreach ($LEVELS as $k => $label) {
        $sel = ($k == $selected) ? 'selected' : '';
        $h .= "<option value=\"$k\" $sel>" . htmlspecialchars($label) . "</option>";
    }
    return $h;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rank Subjects</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root{ --bg:#0f172a; --card:#111827; --muted:#9ca3af; --text:#e5e7eb; --accent:#22d3ee; --ok:#10b981; --err:#ef4444; }
    *{ box-sizing:border-box }
    body{ margin:0; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,sans-serif; background:linear-gradient(135deg,#0f172a,#0b1020); color:var(--text); }
    .container{ max-width:920px; margin:40px auto; padding:24px }
    .card{ background:rgba(17,24,39,0.8); border:1px solid #1f2937; border-radius:18px; padding:24px; box-shadow:0 10px 30px rgba(0,0,0,.35); backdrop-filter: blur(6px); }
    h1{ font-size:28px; margin:0 0 12px; display:flex; gap:10px; align-items:center }
    p.lead{ margin:0 0 20px; color:var(--muted) }
    form{ display:grid; gap:16px; }
    .row{ display:grid; grid-template-columns: 180px 1fr; gap:12px; align-items:center; padding:12px 14px; border:1px solid #1f2937; border-radius:14px; background:#0b1220; }
    label{ font-weight:600 }
    select{ width:100%; padding:10px 12px; border-radius:10px; border:1px solid #293241; background:#0a0f1d; color:var(--text); }
    .actions{ display:flex; gap:12px; justify-content:flex-end; margin-top:8px }
    .btn{ padding:10px 16px; border-radius:12px; border:1px solid transparent; cursor:pointer; font-weight:600 }
    .primary{ background:linear-gradient(90deg,#06b6d4,#22d3ee); color:#001018 }
    .secondary{ background:#0b1220; border-color:#1f2937; color:var(--text) }
    .nav{ margin-top:18px; display:flex; gap:16px }
    a{ color:var(--accent); text-decoration:none }
    .notice{ margin:16px 0; color:var(--muted); font-size:14px }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>📊 Rank Your Subjects</h1>
      <p class="lead">Choose how tough each subject feels. We'll generate your evening-only study timetable (7:00 PM – 9:30 PM) from this.</p>

      <?php if(!$email): ?>
        <div class="notice">⚠️ No email in session. Please login first so we can save rankings by your email.</div>
      <?php endif; ?>

      <form method="post">
        <div class="row">
          <label for="diff_maths">Maths</label>
          <select id="diff_maths" name="diff_maths" required>
            <?php echo options_html($LEVELS, $prefill['diff_maths']); ?>
          </select>
        </div>
        <div class="row">
          <label for="diff_physics">Physics</label>
          <select id="diff_physics" name="diff_physics" required>
            <?php echo options_html($LEVELS, $prefill['diff_physics']); ?>
          </select>
        </div>
        <div class="row">
          <label for="diff_chemistry">Chemistry</label>
          <select id="diff_chemistry" name="diff_chemistry" required>
            <?php echo options_html($LEVELS, $prefill['diff_chemistry']); ?>
          </select>
        </div>
        <div class="row">
          <label for="diff_biology">Biology</label>
          <select id="diff_biology" name="diff_biology" required>
            <?php echo options_html($LEVELS, $prefill['diff_biology']); ?>
          </select>
        </div>
        <div class="actions">
          <a class="btn secondary" href="timetablee.php">View Timetable</a>
          <button class="btn primary" type="submit">Save Rankings</button>
        </div>
      </form>

      <div class="nav">
        <a href="timetablee.php">➡️ Go to Timetable</a>
      </div>
    </div>
  </div>

  <script>
    <?php if ($save_ok === true): ?>
      Swal.fire({
        icon: 'success',
        title: 'Saved!',
        text: <?php echo json_encode($msg); ?>,
        timer: 1800,
        showConfirmButton: false
      });
    <?php elseif ($save_ok === false): ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops',
        text: <?php echo json_encode($msg); ?>
      });
    <?php endif; ?>
  </script>
</body>
</html>