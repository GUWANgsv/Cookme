<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/user_profile.css">
</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>

    <?php
    $sql = "SELECT * FROM user WHERE User_ID = '$sid'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $userid = $row["User_ID"];
            $fname = $row["First_Name"];
            $lname = $row["Last_Name"];
            $email = $row["Email"];
            $country = $row["Country"];
            $mobile = $row["Contact_Number"];
        }
    } else {
        echo "0 results";
    }
    $con->close();
    ?>
    
    <br><br>
    <h1>Edit user Profile</h1>

    <div class="profile-container">
        <form id="profileForm" method="post" action="update_user_profile.php">
            <div class="profile-picture">
                <br><br>
            </div>
            <div class="profile-details">
                <label style="display:none" for="userid">User ID:</label>
                <input style="display:none" type="text" id="uid" name="userid" value="<?php echo $userid; ?>">

                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $fname; ?>">
                
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $lname; ?>">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                
                <label for="country">Country:</label>
                <input type="text" id="country" name="country" value="<?php echo $country; ?>">
                
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>">

                <input type="submit" name="update" value="Update" id="new1"> 
                <input type="submit" name="delete" value="Delete" id="new2">
            </div>
        </form>
    </div>
    
    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>
