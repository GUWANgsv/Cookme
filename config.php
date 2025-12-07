<?php

$con = new mysqli("localhost", "root", "", "cookme");

if ($con->connect_error) {
    // Handle connection error
} else {
    // Connection successful
}
?>
