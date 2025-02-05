<?php
// Create connection
$con = mysqli_connect('localhost', 'root', '', 'cse35');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$roll = $name = $age = $section = $class = $cgpa = "";

// Fetch student record when roll number is provided
if (isset($_POST['search'])) {
    $roll = $_POST['roll'];
    $sql = "SELECT * FROM std WHERE roll='$roll'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $age = $row['age'];
        $section = $row['section'];
        $class = $row['class'];
        $cgpa = $row['cgpa'];
    } else {
        echo "<script>alert('No record found for Roll No. $roll');</script>";
    }
}

// Handle update submission
if (isset($_POST['update'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    $cgpa = $_POST['cgpa'];

    $update_sql = "UPDATE std SET name='$name', age='$age', section='$section', class='$class', cgpa='$cgpa' WHERE roll='$roll'";
    if ($con->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location='display.php';</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

$con->close();
?>

<html>
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        
        h2 {
            text-align: center;
            color: #333;
        }
        
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 40%;
            text-align: center;
        }
        
        .first{
            margin-top: 70px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        
        input {
            width: 90%;
            padding: 8px;
            margin: 5px 0 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .search-btn {
            background-color: #2196F3;
        }
        
        .update-btn {
            background-color: #4CAF50;
        }
        
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Update Student Details</h2>

    <!-- Search form to find the student record -->
    <form class="first" method="POST">
        <label>Enter Roll No:</label>
        <input type="text" name="roll" value="<?php echo $roll; ?>" required>
        <button type="submit" name="search" style="padding: 8px 12px; background-color: #2196F3; color: white; border: none;">Search</button>
    </form>

    <!-- Update form (only shown when a record is found) -->
    <?php if (!empty($name)): ?>
    <form method="POST">
        <input type="hidden" name="roll" value="<?php echo $roll; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $age; ?>" required><br><br>

        <label>Section:</label>
        <input type="text" name="section" value="<?php echo $section; ?>" required><br><br>

        <label>Class:</label>
        <input type="text" name="class" value="<?php echo $class; ?>" required><br><br>

        <label>CGPA:</label>
        <input type="number" step="0.01" name="cgpa" value="<?php echo $cgpa; ?>" required><br><br>

        <button type="submit" name="update" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none;">Update</button>
    </form>
    <?php endif; ?>
</body>
</html>
