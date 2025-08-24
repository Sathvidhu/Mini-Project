<?php
session_start();
$email = isset($_SESSION['email']);
$con = mysqli_connect("localhost", "root", "", "smartstudy");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #4CAF50;
      padding: 15px 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header h2 {
      margin: 0;
    }
    .logout-button {
      background-color: #f44336;
      border: none;
      color: white;
      padding: 8px 16px;
      font-size: 14px;
      border-radius: 5px;
      cursor: pointer;
    }
    .logout-button:hover {
      background-color: #d32f2f;
    }
    .dashboard {
      max-width: 900px;
      margin: 30px auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .section {
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>

  <div class="header">
    <h2>Dashboard</h2>
    <form action="parentlogin.php" method="post">
      <button class="logout-button" type="submit">Logout</button>
    </form>
  </div>

  <div class="dashboard">
    <div class="section">
      <h2>Student Attendance</h2>
      <h3><?php echo $email; ?>'s Attendance</h3>
      <table>
        <tr>
          <th>Date</th>
          
          <th>Time Spent</th>
        </tr>

        <?php
        $query = "SELECT visited_at, time_spent FROM page_time WHERE email='$email' ";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              $minutes = floor($row['time_spent'] / 60);
              $seconds = $row['time_spent'] % 60;
              $formatted_time = "{$minutes}m {$seconds}s";

              echo "<tr>";
              echo "<td>{$row['visited_at']}</td>";
              echo "<td>$formatted_time</td>";
              echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No attendance records found.</td></tr>";
        }

        mysqli_close($con);
        ?>
      </table>
    </div>

    <div class="section">
      <h3>Mark List</h3>
      <table>
        <tr>
          <th>Subject</th>
          <th>Marks Obtained</th>
          <th>Total Marks</th>
        </tr>
        <tr>
          <td>Math</td>
          <td>88</td>
          <td>100</td>
        </tr>
        <tr>
          <td>Science</td>
          <td>75</td>
          <td>100</td>
        </tr>
      </table>
    </div>
  </div>

</body>
</html>
