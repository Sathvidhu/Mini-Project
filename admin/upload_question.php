<?php
session_start();
$class = $_GET['class'] ?? null;
$subject = $_GET['subject'] ?? null;
$con = mysqli_connect("localhost", "root", "", "smartstudy");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $chapter_number = $_POST['chapter_number'];

    foreach ($_POST['questions'] as $qIndex => $question) {
        if (trim($question) == "") continue;

        // Insert question
        $stmt = $con->prepare("INSERT INTO mocktest_questions (class, subject, chapter_number, question) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $class, $subject, $chapter_number, $question);
        $stmt->execute();
        $question_id = $stmt->insert_id;
        $stmt->close();

        // Insert options for this question
        foreach ($_POST['options'][$qIndex] as $oIndex => $optText) {
            $is_correct = ($_POST['correct'][$qIndex] == $oIndex) ? 1 : 0;
            $stmt = $con->prepare("INSERT INTO mocktest_options (question_id, option_text, is_correct) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $question_id, $optText, $is_correct);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<script>alert('All questions saved successfully!');</script>";
    echo "<script>window.location.href='material.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Mock Test Questions</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

  <h2>Add Questions for <?= htmlspecialchars($subject) ?> - Class <?= htmlspecialchars($class) ?></h2>

  <form method="POST">
      <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
      <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">

      <div class="mb-3">
          <label class="form-label">Chapter Number</label>
          <input type="number" name="chapter_number" class="form-control" required>
      </div>

      <div id="questions-container">
          <!-- First question block -->
          <div class="question-block border p-3 mb-3">
              <label>Question</label>
              <textarea name="questions[]" class="form-control mb-2" required></textarea>

              <div class="options-container">
                  <div class="option-block mb-2">
                      <input type="text" name="options[0][]" class="form-control d-inline-block w-75" placeholder="Enter option" required>
                      <input type="radio" name="correct[0]" value="0"> Correct
                  </div>
              </div>
              <button type="button" class="btn btn-sm btn-primary" onclick="addOption(this)">+ Add Option</button>
          </div>
      </div>

      <button type="button" class="btn btn-secondary mb-3" onclick="addQuestion()">+ Add Question</button><br>
      <button type="submit" class="btn btn-success">Save All</button>
  </form>

  <script>
  let questionIndex = 0;

  function addOption(btn) {
      let qBlock = btn.closest('.question-block');
      let optContainer = qBlock.querySelector('.options-container');
      let qIndex = Array.from(document.querySelectorAll('.question-block')).indexOf(qBlock);
      let optionCount = optContainer.querySelectorAll('.option-block').length;

      let div = document.createElement('div');
      div.classList.add('option-block','mb-2');
      div.innerHTML = `
          <input type="text" name="options[${qIndex}][]" class="form-control d-inline-block w-75" placeholder="Enter option" required>
          <input type="radio" name="correct[${qIndex}]" value="${optionCount}"> Correct
      `;
      optContainer.appendChild(div);
  }

  function addQuestion() {
      questionIndex++;
      let container = document.getElementById('questions-container');
      let div = document.createElement('div');
      div.classList.add('question-block','border','p-3','mb-3');
      div.innerHTML = `
          <label>Question</label>
          <textarea name="questions[]" class="form-control mb-2" required></textarea>

          <div class="options-container">
              <div class="option-block mb-2">
                  <input type="text" name="options[${questionIndex}][]" class="form-control d-inline-block w-75" placeholder="Enter option" required>
                  <input type="radio" name="correct[${questionIndex}]" value="0"> Correct
              </div>
          </div>
          <button type="button" class="btn btn-sm btn-primary" onclick="addOption(this)">+ Add Option</button>
      `;
      container.appendChild(div);
  }
  </script>

</body>
</html>
