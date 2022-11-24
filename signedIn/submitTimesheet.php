<?php
date_default_timezone_set('Europe/London');
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['ID'])){
?>

<script>
    function refresh(){
        var d = new Date();
        document.getElementById("currentTime").innerHTML = d.toLocaleTimeString();
        document.getElementByID("test5").value = "heyy";
        document.getElementByID("test5").innerHTML = "heyy2";
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


    <nav class = "navbar navbar-expand-lg bg-primary mb-5">
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




    <p class = "text-white text-center mt-5 fs-1 fw-bold font-family-courier-new">SUBMIT NEW TIMESHEET </p>

    <p class="text-white text-center mt-5 fw-bold fs-2">Week running: <span id = "startDay" class="text-white text-center mt-5 fw-bold"> </span> - 
    <span id = "endDay" class="text-white text-center mt-5 fw-bold"> </span> </p>
   
   

    <form method = "post" action = "timeSheets/submitTimesheetScript.php">
        <?php if (isset($_GET['error'])){ ?>
            <p class = "text-danger mt-5" style="margin-left:43.5%; font-weight: bolder;"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <?php if (isset($_GET['success'])){ ?>
            <p class = "text-success mt-5" style="margin-left:43.5%; font-weight: bolder;"> <?php echo $_GET['success']; ?> </p>
        <?php } ?>
        
        <section class="p-5 m-5" >
            <div class = "container">
                <div class = "row text-center text-white fw-bold" style = "">
                    <div class="col-md">
                        <div class = "">
                            <label for = "hoursWorked1" class = "form-label text-white">Hours Worked: &nbsp;</label>
                            <input type = "number" class = "form-control-sm" name = "hoursWorked1">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class = "">
                            <label for = "location1" class = "form-label text-white ">Location: &nbsp;</label>
                            <input type = "name" class = "form-control-sm" name = "location1">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class = "">
                            <label for = "breaks1" class = "form-label text-white">Break Hours: &nbsp;</label>
                            <input type = "number" class = "form-control-sm" name = "breaks1">
                        </div>
                    </div>
                </div>

                <div class = "row text-center text-white fw-bold mt-5" style = "">
                    <div class="col-md">
                        <div class = "">
                            <label for = "startDate1" class = "form-label text-white ">Start Date: &nbsp;</label>
                            <input type = "date" class = "form-control-sm" name = "startDate1">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class = "">
                            <label for = "endDate1" class = "form-label text-white ">End Date: &nbsp;</label>
                            <input type = "date" class = "form-control-sm" name = "endDate1">
                        </div>
                    </div>
                </div>
                <input type = "hidden" id="startingDay" name="jsStartDate"></input>
                <input type = "hidden" id="endingDay" name="jsEndDate"></input>
            </div>
        </section>
            <div class = "mb-3" style = "margin-left: 48.3%">
            <button type = "submit"> Submit Timesheet </button>
        </div>
    </form>



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
    
    var first = date.getDate() - date.getDay();
    var last = first + 6;

    var startDay = new Date(date.setDate(first)).toLocaleDateString();
    var endDay = new Date(date.setDate(last)).toLocaleDateString();

    document.getElementById("startDay").innerHTML = startDay;
    document.getElementById("endDay").innerHTML = endDay;

    localStorage.setItem("startDay1",startDay);
    localStorage.setItem("endDay1",endDay);

    document.getElementById("startingDay").setAttribute('value', startDay);
    document.getElementById("endingDay").setAttribute('value', endDay);

</script>