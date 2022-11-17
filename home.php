<?php
date_default_timezone_set('Europe/London');
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){



?>

<script>
        var d = new Date();
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel = "stylesheet">
    <title> Timesheet System </title>
    <link href = "styles.css" rel = "stylesheet">
</head>

<body>

<div class = "px-3 py-3 bg-primary">
    
    <span id = "timeTest" class = "text-white fw-bold h4"> </span>

</div>


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

    <a href = "logout.php" class = "h4 text-white fw-bold ms-3 mt-5">Logout </a>

</body>



<?php

if (isset($_SESSION['accountType']) && $_SESSION['accountType'] == "admin"){
    ?> <p class = " ms-3 fw-bold text-white"> You are an admin. </p>

<?php } ?>


</html>

<?php
}
else{
    header("Location: index.php");
    exit();
}

?>