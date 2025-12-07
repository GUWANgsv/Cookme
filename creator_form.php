<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/creator_form.css">
</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>
    <br><br>
    <div class="form-container">
        <h1>Create Your Cook Me<br>Creator Account</h1>
        <form method="post" action="creator_form_handler.php" id="creatorForm" enctype="multipart/form-data">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="title">Select Title</label>
            <select id="title" name="title">
                <option value="">Select Title</option>
                <option value="Chef">Chef</option>
                <option value="Baker">Baker</option>
                <option value="Culinary Expert">Culinary Expert</option>
            </select>
            <label for="profilePic">Profile Picture</label>
            <input type="file" id="image" name="image" accept="image/*">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" rows="4" placeholder="Tell us about yourself"></textarea>
            <label for="experience">Years of Experience</label>
            <input type="number" id="experience" name="experience" min="0" placeholder="Years of experience">
            <label for="currentWork">Current Work</label>
            <input type="text" id="currentWork" name="currentWork" placeholder="Current work">
            <label for="notifications">
            <input type="checkbox" id="notifications" name="notifications"> Enable Notifications</label>
            <button type="submit" id="submit" name="submit" class="submit">Register as a Creator</button>
        </form>
        <div class="links">
            <a href="forget_password.php">Forget your password?</a>
        </div>
    </div>
    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>
</html>
