<?php
session_start();
include "../../dataHandling/db_conn.php";

$username = $_SESSION['username'];

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){

    $sql = "SELECT * FROM users WHERE approver = '" . $_SESSION['ID'] . "'";
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

    <p class = "text-white text-center mt-5 fs-1 fw-bold font-family-courier-new">MANAGE YOUR EMPLOYEES </p> </br></br>

<?php
    
while($row = mysqli_fetch_assoc($result)){

    $sql2 = "SELECT * FROM `roles` WHERE roleID = '". $row['roleID'] . "'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    ?>
    <p class = "text-white h4 fw-bold bg-primary p-5 mb-5"> Employee ID: <?php echo $row['ID'] . '&nbsp;&nbsp;&nbsp;'?>
    Name: <?php echo $row['first_Name'] . " " . $row['last_Name'] . '&nbsp;&nbsp;'?> Account Type: <?php echo $row['accountType'] . 
    '&nbsp;&nbsp;'?> Role ID: <?php echo $row ['roleID'] . '&nbsp;&nbsp;' ?> Username: <?php echo $row['username']?></br></br></br></br>
    Role: <?php echo $row2['role'] ?>


    <form method = "post" action = "updateEmployeeScript.php" class = "mb-5 text-center">
        <input type = "hidden" id="userID" name="userID" value = <?php echo $row['ID']?>></input>
        <select name = "roles" id = "roles">
            <option value = "Unassigned"> Unassigned </option>
            <option value = "Teacher"> Teacher </option>
            <option value = "Reception"> Reception </option>
            <option value = "Director"> Director </option>
            <option value = "Intern"> Intern </option>
            <option value = "Manager"> Manager </option>
        </select>
        <div class = "mb-5 mt-3 text-center">
            <button type = "submit"> Update </button>
        </div>
    </form> </p>
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