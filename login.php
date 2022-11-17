<?php
session_start();
include "db_conn.php";



if (isset($_POST['username1']) && isset($_POST['password1'])){
    $uName = $_POST['username1'];
    $pWord = $_POST['password1'];
    if (empty($uName)){
        header("Location: index.php?error=Username required!");
        exit();
    } elseif(empty($pWord)){
        header("Location: index.php?error=Password required!");
        exit();
    } else{
        $pWord = md5($pWord);
        $sql = "SELECT * FROM users WHERE username='$uName' AND pWord='$pWord'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            
            if ($row['username'] === $uName && $row['pWord'] === $pWord){
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['firstName'] = $row['first_Name'];
                $_SESSION['lastName'] = $row['last_Name'];
                $_SESSION['phoneNumber'] = $row['phone_Number'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['accountType'] = $row['accountType'];
                

                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?error=Incorrect username or password!");
                exit();
            }
        }
        else{
            header("Location: index.php?error=Incorrect username or password!");
            exit();
        }
        
    }
}
else{
    header("Location: index.php");
    exit();
}
?>
