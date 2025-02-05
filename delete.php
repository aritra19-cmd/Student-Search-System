<?php
// Create connection
$con = mysqli_connect('localhost', 'root', '', 'cse35');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $_POST['roll'];

    // Check if the record exists
    $check_sql = "SELECT * FROM std WHERE roll='$roll'";
    $check_result = $con->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Delete the student record
        $delete_sql = "DELETE FROM std WHERE roll='$roll'";
        if ($con->query($delete_sql) === TRUE) {
            echo "<script>alert('Record deleted successfully'); window.location='display.php';</script>";
        } else {
            echo "Error deleting record: " . $con->error;
        }
    } else {
        echo "<script>alert('No record found with Roll No. $roll');</script>";
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
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 50%;
        }
        h2 {
            color: #333;
        }
        input[type="text"] {
            padding: 10px;
            width: 80%;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: darkred;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h2 style="text-align: center;">Delete Student Record</h2>
            <!-- Form to delete a student record -->
            <form method="POST" style="width: 50%; margin: auto; text-align: center;">
                <label>Enter Roll No to Delete:</label>
                <input type="text" name="roll" required>
                <button type="submit" style="padding: 8px 12px; background-color: red; color: white; border: none;">Delete</button>
            </form>
        </div>  
    </body>
</html>
