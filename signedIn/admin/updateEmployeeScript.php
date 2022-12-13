<?php
session_start();
include "../../dataHandling/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['ID'])){
        $newRole = $_POST['roles'];
        $userID = $_POST['userID'];
    
        $sql = "SELECT roleID FROM roles WHERE role = '$newRole'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $newRoleID = $row['roleID'];

        $sql2 = "UPDATE users SET roleID = '$newRoleID' WHERE ID = '$userID'";
        $result2 = mysqli_query($conn, $sql2);

        if ($newRole == 'Manager'){
            $sql3 = "UPDATE users SET accountType = 'Admin' WHERE ID = '$userID'";
            $result3 = mysqli_query($conn, $sql3);
        } else{
            $sql4 = "UPDATE users SET accountType = 'Employee' WHERE ID = '$userID'";
            $result4 = mysqli_query($conn, $sql4);
        }
        
        if ($result2){
            header("Location: updateEmployees.php");
            exit();
        } else{
            header("Location: updateEmployees.php");
            exit();
        }
} else {
    header("Location: ../../index.php");
    exit();
}