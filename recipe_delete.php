<?php

require('config.php');
session_start();
$deleteID = $_SESSION['editID'];

$sql = "DELETE FROM recipe WHERE Recipe_ID='$deleteID'";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('Recipe deleted successfully!');</script>";
    echo "<script>window.open('creator_dashboard.php','_self')</script>";
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();

?>
