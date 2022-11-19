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