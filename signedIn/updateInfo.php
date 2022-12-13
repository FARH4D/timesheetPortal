<?php
session_start();
include "../dataHandling/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['ID'])){
        $ID = $_SESSION['ID'];
        $address = $_POST['address1'];
        $phoneNumber = $_POST['phoneNumber1'];

        $sql = "UPDATE users SET address1 = '$address', phone_Number = '$phoneNumber' WHERE ID = '$ID'";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: personalInfo.php");
            exit();
        }
} else {
    header("Location: ../index.php");
    exit();
}