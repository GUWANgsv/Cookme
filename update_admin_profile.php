<?php

require 'config.php';

if (isset($_POST["update"])) {
    $mid = $_POST['Aid'] ?? '';
    $mname = $_POST["Admin_Name"];
    $email = $_POST["email"];
  
    if (empty($mname) || empty($email)) {
        echo "All required";
    } else {
        $sql = "UPDATE admin SET Admin_Name='$mname', Email='$email' WHERE Admin_ID='$mid'";
        if ($con->query($sql)) {
            echo "<script>alert('Successfully Updated')</script>";
            header("location:admin_profile.php");
        } else {
            echo "<script>alert('System error... Please contact system admin.')</script>";
        }
    }
}

if (isset($_POST["delete"])) {
    $mid = $_POST['Aid'] ?? '';
    $sql = "DELETE FROM admin WHERE Admin_ID='$mid'";

    if ($con->query($sql)) {
        echo "<script>alert('Successfully deleted')</script>";
        header("location:index.php");
    } else {
        echo "<script>alert('not deleted ! Please contact system admin.')</script>"; 
    }
}

$con->close();

?>
