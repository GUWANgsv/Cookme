<?php
if (!isset($_SESSION['loggedin'])) {
    echo "<script>
        function redirectToLogin() {
            window.location.href = 'login_index.php';
        }
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/header.css">
    
    <title>header</title>
</head>
<body>

    <div class="header">
        <a href="index.php" class="logo">
            <img src="./icon/logo2.gif" alt="logo">
        </a>

        <div class="search-bar">
            <input id="search" type="text" placeholder="Search.." onclick="checkLoginStatus()">
            <button type="submit" id="searchbutton" onclick="checkLoginStatus()"><i class="fa fa-search"></i></button>
        </div>
        
        <div class="user-menu">
            <img src="./icon/user.png" alt="User Icon" class="user-icon" onclick="toggleDropdown()">
            <div class="dropdown">
                <a href="login_index.php">Sign In</a>
                <a href="registation_form.php">Register</a>
            </div>	
        </div> 
    </div>

    <nav class="nav-bar">
        <a href="#" class="nav-link" onclick="checkLoginStatus()">Home</a>
        <a href="#" class="nav-link" onclick="checkLoginStatus()">Category</a>
        <a href="#" class="nav-link" onclick="checkLoginStatus()">Contact Us</a>
        <a href="privacy.php" class="nav-link">Privacy Policy</a>
        <a href="about_us.php" class="nav-link">About Us</a>
        <a href="terms_and_con.php" class="nav-link">Terms and Condition</a>
    </nav>

    <script>
        function checkLoginStatus() {
            <?php if (!isset($_SESSION['login'])) { ?>
                redirectToLogin();
            <?php } ?>
        }

        function redirectToLogin() {
            window.location.href = 'login_index.php';
        }
    </script>

    <script src="./JS/header.js"></script>
</body>
</html>
