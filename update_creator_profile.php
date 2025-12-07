<?php
session_start();
$uid = $_SESSION['uid'];
require 'config.php';

if (isset($_POST["update"])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);
    } else {
        $result = $con->query("SELECT Profile_Image FROM creator WHERE User_ID='$uid'");
        $row = $result->fetch_assoc();
        $imgContent = $row['Profile_Image'];
    }

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $mobile = $_POST["mobile"];
    $title = $_POST["title"];
    $bio = $_POST["bio"];
    $experience = $_POST["experience"];
    $currentWork = $_POST["currentWork"];

    $user = $con->prepare("UPDATE user SET First_Name=?, Last_Name=?, Email=?, Country=?, Contact_Number=? WHERE User_ID=?");
    $user->bind_param("sssssi", $firstName, $lastName, $email, $country, $mobile, $uid);

    $creator = $con->prepare("UPDATE creator SET Title=?, Bio=?, Years_of_Experience=?, Current_Work=?, Profile_Image=? WHERE User_ID=?");
    $creator->bind_param("sssssi", $title, $bio, $experience, $currentWork, $imgContent, $uid);

    if ($user->execute() && $creator->execute()) {
        echo "<script>alert('Profile updated successfully!')</script>" ;
        header("Location: creator_profile.php");
    } else {
        echo "Error updating record: " . $con->error;
        echo "<script>alert('Profile not updated!')</script>";
        header("Location: creator_profile.php");
    }
}

if (isset($_POST["delete"])) {
    $mid = $_POST['Mid'] ?? '';
    $sql = "DELETE FROM user WHERE User_ID='$uid'";
    $sql2 = "DELETE FROM creator WHERE User_ID='$uid'";

    if ($con->query($sql)) {
        if ($con->query($sql2)) {
            echo "<script>alert('Successfully deleted')</script>";
            header("location:index.php");
        }
    } else {
        echo "<script>alert('not deleted contact admin')</script>";
    }

}

$con->close();
?>
