<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/moderator_profile.css">
</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>

    <?php
    $cid = $_SESSION['id'];
    $sql = "SELECT * FROM admin WHERE Admin_ID ='$cid'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Moid = $row['Admin_ID'];
            $mname = $row['Admin_Name'];
            $email = $row['Email'];
        }
    } else {
        echo "0 results";
    }
    $con->close();
    ?>
    <br><br>
    <h1>Edit Profile</h1>

    <div class="profile-container">
        <form id="profileForm" method="post" action="update_admin_profile.php">
            <div class="profile-picture">
                <br><br>
            </div>
            <div class="profile-details">
                <input style="display:none" type="text" name="Aid" value="<?php echo $Moid; ?>">
                <label for="firstName">Name:</label>
                <input type="text" name="Admin_Name" value="<?php echo $mname; ?>">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <button type="submit" name="update" id="new" class="update">Update</button>
                <button type="submit" name="delete" id="delete" class="delete">Delete</button>
            </div>
        </form>
    </div>
    
    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>
