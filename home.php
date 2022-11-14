<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){



?>


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

    <p class = "h2 text-white fw-bold ms-3 mt-3"> Greetings, <?php echo $_SESSION['firstName']; ?></p>


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