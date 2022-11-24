<?php
session_start();
include "../../dataHandling/db_conn.php";

$username = $_SESSION['username'];

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){

    $sql = "SELECT * FROM timesheets WHERE user='$username'";
    $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel = "stylesheet">
    <title> Timesheet System </title>
    <link href = "../../styles.css" rel = "stylesheet">
</head>

<body>


    <nav class = "navbar navbar-expand-lg bg-primary mb-5">
        <div class = "container-fluid justify-content-start">  
            <span id = "currentDate" class = "text-white fw-bold h4" ></span>
        </div>
        <div class = "navbar-brand"> 
            <a href = "../home.php"><img src = "../../images/homeIcon.png" style = "width: 10%; margin-left:35%" ></a>
        </div>
        
        <div class = "container-fluid justify-content-end"> 
            <p class = "text-white fw-bold h4"> <?php echo $_SESSION['username']; ?> </p>
        </div>
    </nav>

    <p class = "text-white text-center mt-5 fs-1 fw-bold font-family-courier-new">TIMESHEETS </p> </br></br>

<?php

while($row = mysqli_fetch_assoc($result)){
    ?> <p class = "text-white h4 fw-bold bg-primary p-5 mb-5"> Week beginning: <?php echo str_replace($_SESSION['username'], '', $row['timesheet_ID']) .
    '&nbsp;&nbsp;&nbsp;' ?> Hours worked: <?php echo $row['hours_Worked'] . '&nbsp;&nbsp;'?> Location: <?php echo $row['location'] . '&nbsp;&nbsp;'?> 
    Start Date: <?php echo date("d/m/Y", strToTime($row ['start_Date'])) . '&nbsp;&nbsp;' ?> End Date: <?php echo date("d/m/Y", strToTime($row['end_Date'])) ?> 
    </br></br>
    Approval Status:
    <?php if ($row['approval_Status'] == 'approved'){
    ?> Approved <?php
    }else if ($row['approval_Status'] == 'disapproved'){
    ?> Disapproved <?php
    }else{
    ?> Submitted <?php
    }
    ?></p>
    
<?php
}?>

</body>


<?php
}
?>

<script>
    var date = new Date();
    document.getElementById("currentDate").innerHTML = date.toLocaleDateString();
</script>