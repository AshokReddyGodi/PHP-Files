<?php
$servername = "localhost";
$username = "root";
$password = "ashok@12345";
 $db="regi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: ");
} 
?>