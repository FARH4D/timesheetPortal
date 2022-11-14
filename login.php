<?php
include "db_conn.php";
if (isset($_POST['username1']) && isset($_POST['password1'])){
    $uName = $_POST['username1'];
    $pWord = $_POST['password1'];
    if (empty($uName)){

    } elseif(empty($pWord)){

    } else{
        $sql = "SELECT * FROM managers WHERE username='$uName' AND pWord='$pWord'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            
            if ($row['username'] === $uName && $row['pWord'] === $pWord){
                echo"Logged in";
            }
        }
        
    }
}
else{
    header("Location: index.php");
    exit();
}
?>
