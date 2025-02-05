<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <?php
        $user = $_POST["username"];
        $pass = $_POST["password"];
        if ($user == "aritra" && $pass == "12345") {
            echo "<script>alert('Login successfully'); window.location='form.html';</script>";
        } else {
            echo "<script>alert('Login Failed!'); window.location='adminlink.html';</script>";
        }
    ?>
</body>
</html>
