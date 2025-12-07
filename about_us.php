<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./CSS/AboutUs.css">
</head>
<body>
<?php    
    require_once 'header.php';
?>  
<br>
<div class="container">
    <div class="aboutus-image">
        <img src="./image/who.jpg" alt="About Us Image">
    </div>
    
    <div class="aboutus">
        <h1>History of Our journey</h1>
        <br>
        <p>Our website is a cooking recipe website. We provide a wide range of recipes from different cuisines. 
            We have a team of professional chefs who provide us with the best recipes. We have recipes for all types of meals, 
            be it breakfast, lunch, or dinner. We also have a wide range of dessert recipes. Our website is user-friendly and easy to navigate. 
            You can search for recipes by cuisine, meal type, or ingredients. You can also create an account on our website and save your 
            favorite recipes. We also have a blog section where you can read interesting articles about food and cooking. We hope you enjoy 
            our website and find it useful. Happy cooking!</p>
        <br><br>
    </div>
   
    <div class="team">
        <h1>Our Specialist</h1>
        <br>
        <div class="team-member">
            <div class="member">
                <img src="./image/chef1.jpg" alt="Chef 1">
                <h2>John Doe</h2>
                <p>Head Chef</p>
            </div>
            <div class="member">
                <img src="./image/chef2.jpg" alt="Chef 2">
                <h2>Jane Doe</h2>
                <p>Sous Chef</p>
            </div>
            <div class="member">
                <img src="./image/chef3.jpg" alt="Chef 3">
                <h2>James Doe</h2>
                <p>Pastry Chef</p>
            </div>
        </div>
    </div>
    
    <hr class="styled-line">

    <div class="team">
        <h1>Our Team</h1>
        <br>
        <div class="team-member">
            <div class="member">
                <img src="./image/sf1.jpg" alt="Chef 1">
                <h2>John Doe</h2>
                <p>Software Engineer</p>
            </div>
            <div class="member">
                <img src="./image/sf2.jpg" alt="Chef 2">
                <h2>Jane Doe</h2>
                <p>Backend Developer</p>
            </div>
            <div class="member">
                <img src="./image/sf3.jpg" alt="Chef 3">
                <h2>James Doe</h2>
                <p>Moderator</p>
            </div>
        </div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
</body>
</html>