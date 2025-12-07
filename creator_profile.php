<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/creator_profile.css">
</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>

    <?php
    require 'config.php';
    $cid = $_SESSION['id'];

    $sql_uid = "SELECT * FROM creator WHERE Creator_ID = '$cid'";
    $result_uid = $con->query($sql_uid);

    if ($result_uid->num_rows > 0) {
        while ($row = $result_uid->fetch_assoc()) {
            $uid = $row["User_ID"];
        }
    }

    $sql = "SELECT * FROM user WHERE User_ID = $uid";
    $_SESSION['uid'] = $uid;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fname = $row["First_Name"];
            $lname = $row["Last_Name"];
            $email = $row["Email"];
            $country = $row["Country"];
            $mobile = $row["Contact_Number"];
        }
    } else {
        echo "0 results";
    }

    $sql1 = "SELECT * FROM creator WHERE Creator_ID = '$cid'";
    $result1 = $con->query($sql1);

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $title = $row1["Title"];
            $bio = $row1["Bio"];
            $work = $row1["Current_Work"];
            $experience = $row1["Years_of_Experience"];
            $propic = '<img src="data:image/jpeg;base64,' . base64_encode($row1["Profile_Image"]) . '" alt="Profile Picture">';
        }
    } else {
        echo "0 results";
    }

    $con->close();
    ?>

    <br><br>
    <h1>Profile</h1>

    <div class="profile-container">
        <form id="profileForm" action="update_creator_profile.php" method="post" enctype="multipart/form-data">
            <div class="profile-picture">
                Profile Picture <br><br>
                <?php echo $propic; ?>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="profile-details">
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

                <label for="title">Title:</label>
                <select id="title" name="title">
                    <option value="<?php echo $title; ?>"><?php echo $title; ?></option>
                    <option value="Chef">Chef</option>
                    <option value="Baker">Baker</option>
                    <option value="Culinary Expert">Culinary Expert</option>
                </select>

                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" rows="10" cols="40"><?php echo $bio; ?></textarea>

                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" value="<?php echo $experience; ?>">

                <label for="currentWork">Current Work:</label>
                <input type="text" id="currentWork" name="currentWork" value="<?php echo $work; ?>">

                <button class="btn" type="submit" name="update">Update</button>
                <button class="btn1" type="submit" name="delete">Delete</button>
            </div>
        </form>
    </div>

    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>
