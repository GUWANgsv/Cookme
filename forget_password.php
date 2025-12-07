<?php
require "config.php";
if (isset($_POST["reset"])) {
    $fake_email = $_POST["email"];
    $sql = "SELECT Email FROM user";

    session_start();
    $_SESSION['reset'] = $fake_email;

    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $true_email = $row["Email"];
            if ($true_email == $fake_email) {
                header("location: reset_password.php?");
            }
        }
    } else {
        echo "0 results";
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
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>
      <button type="submit" name="reset">Reset Now</button>
    </form>
  </div>
</body>
</html>
