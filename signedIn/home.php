<?php
date_default_timezone_set('Europe/London');
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){
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

    <div class = "d-inline-flex h2 text-white fw-bold ms-3 mt-3 inline-flex">
        <?php if(date('H') <= 12){ ?> 
            <p> Good morning,&nbsp;</p> <?php
        }elseif (date('H') >=12 and date('H') <= 17){ ?>
            <p> Good afternoon,&nbsp;</p> <?php
        }else{ ?>
            <p> Good evening,&nbsp;</p> <?php
        }
        ?> <p> <?php echo $_SESSION['firstName'];?>.</p>
    </div> </br>
    
    <body onload = "setInterval(refresh, 100);">
            <span id = "currentTime" class = "text-primary fw-bolder h1" style = "margin-left: 43%" ></span>
    </body></br>


    <section class="p-5 m-5">
        <div class = "container">
            <div class = "row text-center text-white fw-bold">
                <div class="col-md">
                    <a href = "timesheets.php" class = "text-white fw-bold ms-3 mt-5" style = "text-decoration:none;">
                        <div class = "card bg-primary" style = "width:300px; height: 300px;">
                            <h2 class = "card-text">View </br>Timesheets</h2>
                            <img class = "card-img-bottom mx-auto" src = "../images/timeSheet.png" style = "width:200px;">
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href = "personalInfo.php" class = "text-white fw-bold ms-3 mt-5" style = "text-decoration:none;">
                        <div class = "card bg-primary" style = "width:300px; height: 300px;">
                            <h2 class = "card-text">Personal Information</h2>
                            <img class = "card-img-bottom mx-auto" src = "../images/personalInfo.png" style = "width:200px;">
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href = "roleInfo.php" class = "text-white fw-bold ms-3 mt-5" style = "text-decoration:none;">
                        <div class = "card bg-primary" style = "width:300px; height: 300px;">
                            <h2 class = "card-text">Role Information</h2>
                            <img class = "card-img-bottom mx-auto" src = "../images/roleInfo.png" style = "width:200px;">
                        </div>
                    </a>
                </div>
            </div>
            <div class = "row text-center text-white fw-bold" style = "margin-left:9%">
                <div class="col-md">
                    <a href = "payslips.php" class = "text-white fw-bold ms-3 mt-5" style = "text-decoration:none;">
                        <div class = "card bg-primary mt-5" style = "width:300px; height: 300px;">
                            <h2 class = "card-text">View </br>Payslips</h2>
                            <img class = "card-img-bottom mx-auto" src = "../images/paySlip.png" style = "width:200px;">
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href = "../dataHandling/logout.php" class = "text-white fw-bold ms-3 mt-5" style = "text-decoration:none;">
                        <div class = "card bg-primary mt-5" style = "width:300px; height: 300px;">
                            <h2 class = "card-text">Log Out</h2>
                            <img class = "card-img-bottom mx-auto" src = "../images/logOut.png" style = "width:200px;">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>



<?php

if (isset($_SESSION['accountType']) && $_SESSION['accountType'] == "admin"){
    ?> <p class = " ms-3 fw-bold text-white"> You are an admin. </p>

<?php } ?>


</html>

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