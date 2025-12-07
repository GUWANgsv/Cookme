<?php
require('config.php');
session_start();
$sid = $_SESSION['id'];
$stable = $_SESSION['table'];
$sname = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/header.css">
    <title>header</title>
</head>
<body>
    <div class="header">
        <a href="home.php" class="logo">
            <img src="icon/logo2.gif" alt="logo">
        </a>
        <div class="search-bar">
            <input id="search" type="text" placeholder="Search..">
            <button type="submit" id="searchbutton"><i class="fa fa-search"></i></button>
        </div>
        <div id="user_name">
            <?php echo $sname; ?>
        </div>
        <div class="user-menu">
            <img src="./icon/user.png" alt="User Icon" class="user-icon" onclick="toggleDropdown()">
            <div class="dropdown">
                <?php
                if ($stable == 'admin') {
                    echo '<a href="admin_dashboard.php">Dashboard</a>';
                    echo '<a href="admin_profile.php">Profile</a>';
                } elseif ($stable == 'moderator') {
                    echo '<a href="moderator_dashboard.php">Dashboard</a>';
                    echo '<a href="moderator_profile.php">Profile</a>';
                } elseif ($stable == 'creator') {
                    echo '<a href="creator_dashboard.php">Dashboard</a>';
                    echo '<a href="creator_profile.php">Profile</a>';
                } elseif ($stable == 'user') {
                    echo '<a href="creator_form.php">Become a Creator</a>';
                    echo '<a href="user_profile.php">Profile</a>';                   
                } else {
                    echo '<a href="login_index.php">Login</a>';
                }
                ?>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <nav class="nav-bar">
        <a href="home.php" class="nav-link">Home</a>
        <a href="category.php" class="nav-link">Category</a>
        <a href="contact_us.php" class="nav-link">Contact Us</a>
        <a href="privacy.php" class="nav-link">Privacy Policy</a>
        <a href="about_us.php" class="nav-link">About Us</a>
        <a href="terms_and_con.php" class="nav-link">Terms and Condition</a>
    </nav>
    <script src="JS/header.js"></script>
</body>
</html>
