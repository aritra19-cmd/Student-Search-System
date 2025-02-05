<html>
<body>
<?php

// Create connection
$con = mysqli_connect('localhost', 'root', '', 'cse35');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch student records
$sql = "SELECT * FROM std;";
$result = $con->query($sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border=1 style='margin: auto; width: 80%; font-size: 18px; text-align: center; border-collapse: collapse;'>";
    echo "<tr style='background-color: #4CAF50; color: white; font-size: 20px;'>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>Roll No</th>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>Name</th>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>Age</th>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>Section</th>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>Class</th>";
    echo "<th style='padding: 12px; border: 1px solid #ddd;'>CGPA</th>";
    echo "</tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["roll"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["section"] . "</td>
                <td>" . $row["class"] . "</td>
                <td>" . $row["cgpa"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; font-size:20px;'>No student records found.</p>";
}

$con->close();
?>

</body>
</html>
