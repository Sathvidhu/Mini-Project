<?php
// Connect to database
$con = mysqli_connect("localhost", "root", "", "your_database_name"); // Change credentials

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Availability Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<form method="post" style="text-align: center; margin-top: 20px;">
    <button type="submit" name="view_table">View Availability Table</button>
</form>

<?php
if (isset($_POST['view_table'])) {
    $w = "SELECT * FROM availability";
    $a = mysqli_query($con, $w);

    if (mysqli_num_rows($a) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($a)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['specialization'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>
                    <form method='post' action='admin_doc_edit.php' style='display:inline-block;'>
                        <input type='hidden' name='edit_id' value='" . $row['id'] . "'/>
                        <button type='submit' name='edit' class='btn edit-btn'>Edit</button>
                    </form>
                    <form method='post' action='delete_availability.php' style='display:inline-block;'>
                        <input type='hidden' name='delete_id' value='" . $row['id'] . "'/>
                        <button type='submit' name='delete' class='btn delete-btn'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No availability data found.</p>";
    }
}
?>

</body>
</html>