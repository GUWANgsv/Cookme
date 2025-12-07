<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Cook Me Account</title>
    <link rel="stylesheet" href="css/register form.css">
</head>
<body>
    <div class="container">
        <form id="signup-form" method="post" action="registration_handler.php">
            <h1>Create your Cook Me account</h1>
            <div class="input-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            <div class="input-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="input-group">
                <label for="mobile-number">Mobile Number</label>
                <input type="tel" id="mobile-number" name="mobile-number" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Re-enter Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="inputgroupcheckbox">
                <input type="checkbox" id="notificationsbutton" name="notifications">
                <p1 id="notifications">Notifications</p1><br><br>
            </div>
            <button type="submit" class="submit-button" name="registar">Create Account</button>
            <button type="reset" class="reset-button">Reset Details</button>
        </form>
        <div class="form-footer">
            <p1>Already registered?</p1><a href="login_index.php"> Click here to Login</a>
        </div>
    </div>
    <script src="js/registerfor.js"></script>
</body>
</html>
