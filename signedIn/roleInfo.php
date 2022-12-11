<?php
include "../dataHandling/db_conn.php";
date_default_timezone_set('Europe/London');
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){

    $approverID = $_SESSION['approver'];
    $sql = "SELECT * FROM `users` WHERE ID = '$approverID'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['managerFName'] = $row['first_Name'];
    $_SESSION['managerLName'] = $row['last_Name'];
    $_SESSION['managerPhoneNumber'] = $row['phone_Number'];

    $sql2 = "SELECT * FROM `roles` WHERE roleID = '". $_SESSION['role'] . "'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $_SESSION['roleName'] = $row2['role'];

?>

<script>
    function refresh(){
        var d = new Date();
        document.getElementById("currentTime").innerHTML = d.toLocaleTimeString();
    }
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel = "stylesheet">
    <title> Timesheet System </title>
    <link href = "../styles.css" rel = "stylesheet">
</head>

<body>


    <nav class = "navbar navbar-expand-lg bg-primary">
        <div class = "container-fluid justify-content-start">  
            <span id = "currentDate" class = "text-white fw-bold h4" ></span>
        </div>
        <div class = "navbar-brand"> 
            <a href = "home.php"><img src = "../images/homeIcon.png" style = "width: 10%; margin-left:35%" ></a>
        </div>
        
        <div class = "container-fluid justify-content-end"> 
            <p class = "text-white fw-bold h4"> <?php echo $_SESSION['username']; ?> </p>
        </div>
    </nav>

    <section class="p-5 m-5 h2">
        <div class = "container">
            <div class = "row text-center text-white fw-bold">
                <div class="col-md">
                    Role: <?php echo $_SESSION['roleName']?>
                    </a>
                </div>
                <div class="col-md">
                    Manager Name: <?php echo $_SESSION['managerFName'] . " " . $_SESSION['managerLName']?>
                </div>
            </div>
            <div class = "row text-center text-white fw-bold" style = "margin-top: 10%">
                <div class="col-md">
                    Account Type: <?php echo $_SESSION['accountType'] ?>
                </div>
                <div class="col-md">
                    Manager Phone Number: <?php echo $_SESSION['managerPhoneNumber']?>
                </div>
            </div>
        </div>
    </section>






</body>




<?php
}
else{
    header("Location: ../index.php");
    exit();
}
?>


<script>
    var date = new Date();
    document.getElementById("currentDate").innerHTML = date.toLocaleDateString();
</script>