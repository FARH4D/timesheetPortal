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

    <p class="text-white h2 fw-bold m-4">User Information</p>

    <section class="p-5 m-5 h2">
        <div class = "container">
            <div class = "row text-center text-white fw-bold">
                <div class="col-md">
                    First Name: <?php echo $_SESSION['firstName'] ?>
                    </a>
                </div>
                <div class="col-md">
                    Last Name: <?php echo $_SESSION['lastName'] ?>
                </div>
            </div>
            <div class = "row text-center text-white fw-bold" style = "margin-top: 10%">
                <div class="col-md">
                    Address: <?php echo $_SESSION['address'] ?>
                </div>
                <div class="col-md">
                    Phone Number: <?php echo $_SESSION['phoneNumber'] ?>
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