<?php

require 'config.php';

if (isset($_POST["update"])) {
    $mid = $_POST['Mid'] ?? '';
    $mname = $_POST["moderator_Name"];
    $email = $_POST["email"];

    if (empty($mname) || empty($email)) {
        echo "All required";
    } else {
        $sql = "UPDATE moderator SET Moderator_Name='$mname', Email='$email' WHERE Moderator_ID='$mid'";
        if ($con->query($sql)) {
            header("location:moderator_profile.php");
            echo "<script>alert('Successfully Updated')</script>";
        } else {
            echo "not Updated";
        }
    }
}

if (isset($_POST["delete"])) {
    $mid = $_POST['Mid'] ?? '';

    $sql = "DELETE FROM moderator WHERE Moderator_ID='$mid'";
    if ($con->query($sql)) {
        echo "<script>alert('Successfully deleted')</script>";
        header("location:index.php");
    } else {
        echo "not deleted contact admin";
    }
}

$con->close();

?>
