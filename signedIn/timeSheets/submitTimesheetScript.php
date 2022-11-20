<script>
    var startDay = localStorage.getItem("startDay1");
    var endDay = localStorage.getItem("endDay1");

</script>

<?php
session_start();
include "../../dataHandling/db_conn.php";

if (isset($_POST['hoursWorked1']) && isset($_POST['location1']) && isset($_POST['breaks1'])
    && isset($_POST['startDate1']) && isset($_POST['endDate1'])){

        $hoursWorked = $_POST['hoursWorked1'];
        $location = $_POST['location1'];
        $breaks = $_POST['breaks1'];
        $startDate = $_POST['startDate1'];
        $endDate = $_POST['endDate1'];
        $jsStartDate = $_POST['jsStartDate'];
        $startDateFormat = date('Y-m-d', strtotime($startDate));
        $endDateFormat = date('Y-m-d', strtotime($endDate));
        ?> 
        <script>
        var inputStart = new Date('<?php echo $startDate; ?>');
        var startToUTC = inputStart.toLocaleDateString();
        var inputEnd = new Date('<?php echo $endDate; ?>');
        var endToUTC = inputEnd.toLocaleDateString();
        
        if (startDay > startToUTC){
            window.location="../submitTimesheet.php?error=Please enter a date within the correct range.";
        }else if (endDay < endToUTC){
            window.location="../submitTimesheet.php?error=Please enter a date within the correct range.";
        }else if (startToUTC > endToUTC){
            window.location="../submitTimesheet.php?error=Please enter a date within the correct range.";
        }
        </script>
        <?php
        if(empty($hoursWorked)){
            header("Location: ../submitTimesheet.php?error=Hours worked is empty!");
            exit();
        }
        else if(empty($location)){
            header("Location: ../submitTimesheet.php?error=Location is empty!");
            exit();
        }
        else if(empty($breaks)){
            header("Location: ../submitTimesheet.php?error=Breaks is empty!");
            exit();
        }
        else if(empty($startDate)){
            header("Location: ../submitTimesheet.php?error=Start Date is empty!");
            exit();
        }
        else if(empty($endDate)){
            header("Location: ../submitTimesheet.php?error=End Date is empty!");
            exit();
        }
        else{
            $timesheetID = $_SESSION['username'];
            $timesheetID .= $jsStartDate;
            
            $sql = "SELECT * FROM timesheets WHERE timesheet_ID='$timesheetID'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){
                echo "hi4";
                header("Location: ../submitTimesheet.php?error=You have already submitted this timesheet.");
                exit();
            }
            else{
                echo "hi";
                $sql2 = "INSERT INTO timesheets(breaks, hours_Worked, location, timesheet_ID, start_Date, end_Date) VALUES('$breaks', '$hoursWorked', '$location', '$timesheetID', '$startDateFormat', '$endDateFormat')";
                echo "hi3";
                $result2 = mysqli_query($conn, $sql2);
                echo "hi3";
                if ($result){
                    header("Location: ../submitTimesheet.php?success=Timesheet submitted.");
                    exit();
                }
                else{
                    header("Location: ../submitTimesheet.php?error=Unknown error.");
                    exit();
                }
            }

        }

    }
else{
    header("Location: ../../index.php");
    exit();
}