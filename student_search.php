<?php
// Create connection
$con = mysqli_connect('localhost', 'root', '', 'cse35');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$studentData = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $_POST['rollno'];

    // Query to fetch student data
    $sql = "SELECT * FROM std WHERE roll='$roll'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $studentData = $result->fetch_assoc();
    } else {
        echo "<script>alert('No student found with Roll No. $roll');</script>";
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            background-color: #d4cfd4;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 2px solid #FFF;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Details</h2>
        <?php if ($studentData): ?>
        <table>
            <tr><td><strong>Roll No:</strong></td><td><?php echo $studentData['roll']; ?></td></tr>
            <tr><td><strong>Name:</strong></td><td><?php echo $studentData['name']; ?></td></tr>
            <tr><td><strong>Age:</strong></td><td><?php echo $studentData['age']; ?></td></tr>
            <tr><td><strong>Section:</strong></td><td><?php echo $studentData['section']; ?></td></tr>
            <tr><td><strong>Class:</strong></td><td><?php echo $studentData['class']; ?></td></tr>
            <tr><td><strong>CGPA:</strong></td><td><?php echo $studentData['cgpa']; ?></td></tr>
        </table>
        <?php else: ?>
        <p>No student found with the given Roll No.</p>
        <?php endif; ?>
    </div>
</body>
</html>
