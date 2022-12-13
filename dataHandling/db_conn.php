<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20174504";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
    echo "Connection failed!";
}
?>