<?php
require 'config.php';

if (isset($_POST["update"])) {
    $newPassword = $_POST["newpassword"];
    $confirmPassword = $_POST["confirmpassword"];

    if (strlen($newPassword) >= 8) {
        if ($confirmPassword == $newPassword) {
            session_start();
            $fake_email = $_SESSION['reset'];
            $sql = "UPDATE user SET Password='$newPassword' WHERE Email='$fake_email'";
            if ($con->query($sql)) {
                echo "<h1>Successfully Updated</h1>";
                header("location: login_index.php");
            } else {
                echo "system error";
            }
        } else {
            echo "<script>alert('Password does not match'); </script>";
        }
    } else {
        echo "<script>alert('Use a minimum of 8 characters and create a complex password for your own safety.'); </script>";
    }
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div class="login-container">
        <form id="loginForm" action="" method="post">
            <h2>Password Reset</h2>
            <div class="input-group">
                <label for="email">Enter New Password</label>
                <input type="password" id="email" name="newpassword" required placeholder="minimum of 8 characters">
            </div>
            <div class="input-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required placeholder="minimum of 8 characters">
            </div>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
