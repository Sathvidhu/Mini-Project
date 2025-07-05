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
      <h3>Attendance</h3>
      <table>
        <tr>
          <th>Date</th>
          <th>Status</th>
        </tr>
        <tr>
          <td>2025-06-20</td>
          <td>Present</td>
        </tr>
        <tr>
          <td>2025-06-21</td>
          <td>Absent</td>
        </tr>
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
