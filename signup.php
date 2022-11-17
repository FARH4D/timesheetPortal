<?php
session_start();
include "db_conn.php";



if (isset($_POST['firstName1']) && isset($_POST['lastName1']) && isset($_POST['username1'])
    && isset($_POST['password1']) && isset($_POST['rePassword1'])){
    
    $fName = $_POST['firstName1'];
    $lName = $_POST['lastName1'];
    $uName = $_POST['username1'];
    $pWord = $_POST['password1'];
    $repWord = $_POST['rePassword1'];
    
    if (empty($fName)){
        header("Location: register.php?error=First Name required!");
        exit();
    } elseif(empty($lName)){
        header("Location: register.php?error=Last Name required!");
        exit();
    } elseif(empty($uName)){
        header("Location: register.php?error=Username required!");
        exit();
    } elseif(empty($pWord)){
        header("Location: register.php?error=Password required!");
        exit();
    } elseif(empty($repWord)){
        header("Location: register.php?error=Confirm Password required!");
        exit();
    } elseif($pWord !== $repWord){
        header("Location: register.php?error=Passwords do not match!");
        exit();
    
    } else{
        $pWord = md5($pWord);
        $sql = "SELECT * FROM users WHERE username='$uName'";
        $result = mysqli_query($conn, $sql);
        

        if(mysqli_num_rows($result) > 0){
            header("Location: register.php?error=Username is already taken.");
            exit();
        }
        else{
            $sql2 = "INSERT INTO users(first_Name, last_Name, phone_Number, username, pWord, address1, accountType) VALUES('$fName', '$lName', 0, '$uName', '$pWord', 'empty', 'employee')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result){
                header("Location: register.php?signedUp=Account registered.");
                exit();
            }
            else{
                header("Location: register.php?error=Unknown error.");
                exit();
            }
           
        }

        }
        
    }
else{
    header("Location: register.php");
    exit();
}
?>
