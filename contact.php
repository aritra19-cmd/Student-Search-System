<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost:3306', 'root', '','cse35');

// get the post records
$txtRoll = $_POST['roll'];
$txtName = $_POST['name'];
$txtAge = $_POST['age'];
$txtSection= $_POST['section'];
$txtClass = $_POST['class'];
$txtCgpa= $_POST['cgpa'];

// echo $txtName;
// echo $txtEmail;

// database insert SQL code
$sql = "INSERT INTO `std` (`roll`, `name`, `age`, `section`, `class`,`cgpa`) VALUES ('$txtRoll','$txtName', '$txtAge', '$txtSection', '$txtClass', '$txtCgpa')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "<script>alert('Record entry successful'); window.location='display.php';</script>";
}
?>
