<!Doctype html>
<head>
    <link rel="stylesheet" href="CSS/contact_us.css">
    <title>Contact Us</title>
    <style></style>    
</head>

<body>
        
    <?php require_once('header.php');
    //pass value
    if(isset($_POST['submit']))
    {
        $c_email = $_POST["email"];
        $c_message = $_POST["message"];
        $uid = $_SESSION['id'];

        $sql = "INSERT INTO contact_us (User_ID, Email, Message) VALUES ('$uid', '$c_email', '$c_message')";

//check passed value
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Thank you for contact us we will get back to you soon ')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }?> 

    <div class="hero">
        <h2>Contact Us</h2>
    </div>

    <div class="f_section">
        <div class="f_left" id="form_left">
            <h3>Let <br>Connect <br>With Us</h3>
        </div>

        <div class="f_right" id="form_right">
                <form action="" method="post">
                    <div class="form-container">
                        <input name="f_name" type="text" placeholder="First Name" size="50"><br>
                        <input name="l_name" type="text" placeholder="Last Name" size="50"><br>
                        <input name="email" type="email" placeholder="Email" size="50" required><br>
                        <textarea name="message" id="c_textare" placeholder="Type Your Message" size="250" required></textarea><br>
                        <input type="reset" value="Clear" name="reset">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </form>
        </div>  
    </div>

    <div class="social_sec">
        <h3>Follow Us on Social Media</h3>
        <div class="s_icon">
            <div class="icon"><a href="https://web.facebook.com/"><img src="icon/fb.jpeg" alt="FaceBook"></a></div>
            <div class="icon"><a href="https://www.instagram.com/"><img src="icon/insta.jpeg" alt="Instagram"></a></div>
            <div class="icon"><a href="https://www.tiktok.com/"><img src="icon/tiktok.jpeg" alt="TikTok"></a></div>
            <div class="icon"><a href="https://www.youtube.com/"><img src="icon/yt.png" alt="YouTube"></a></div>
        </div>
        <h3>Hot Line</h3>
        <h4>+94 777 123 123 | +94 777 123 124</h4>
    </div>

    <?php require_once('footer.php'); ?>     
</body>
</html>
