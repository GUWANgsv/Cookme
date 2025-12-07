<?php
session_start();
$cid = $_SESSION['id'];
require_once('config.php');

if (isset($_POST["submitBtn"])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $tit = $_POST["title"];
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);
        
        $descrip = $_POST["description"];
        $ingredi = $_POST["ingredients"];
        $method = $_POST["method"];
        $serv = $_POST["servings"];
        $ctime = $_POST["CTime"];
        $ptime = $_POST["PTime"];
        $cuisi = $_POST["cuisine"];
        $difficul = $_POST["difficulty"];
        $pending = "Pending";
        
        $stmt = $con->prepare("INSERT INTO recipe (Recipe_Name, Creator_ID, Image, Description, Ingredients, Method, Serves, Prepare_Time, Cook_Time, Cuisine, Difficulty, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissssiiisss", $tit, $cid, $imgContent, $descrip, $ingredi, $method, $serv, $ptime, $ctime, $cuisi, $difficul, $pending);
        
        if ($stmt->execute()) {
            echo "<script>alert('Recipe added successfully!');</script>";
            header("Location: creator_dashboard.php");
        } else {
            echo "<script>alert('Error adding recipe: " . $stmt->error . "');</script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>alert('File upload failed.');</script>";
    }
}
?>
