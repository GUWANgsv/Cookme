<?php

require 'config.php';

if (isset($_POST["update"])) {
    $userid = $_POST["userid"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $mobile = $_POST["mobile"];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($country) || empty($mobile)) {
        echo "All required";
    } else {
        $sql = "UPDATE user SET First_Name='$firstName', Last_Name='$lastName', Email='$email', Country='$country', Contact_Number='$mobile' WHERE User_ID='$userid'";
        if ($con->query($sql)) {
            echo "<script>alert('Successfully Updated')</script>";
            header("location:user_profile.php");
        } else {
            echo "<script>alert('Sorry Contact admin..')</script>";
        }
    }
}

if (isset($_POST["delete"])) {
    $userid = $_POST["userid"];
    $sql = "DELETE FROM user WHERE User_ID='$userid'";
    if ($con->query($sql)) {
        echo "<script>alert('Successfully deleted')</script>";
        header("location:index.php");
    } else {
        echo "not deleted contact admin";
    }
}

$con->close();

?>
