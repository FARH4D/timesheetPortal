<?php
session_start();
include "../../dataHandling/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['ID'])){
        $timesheetID = $_POST['timesheetID'];
        $sql = "UPDATE timesheets SET approval_Status = 'disapproved' WHERE timesheet_ID = '$timesheetID'";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: adminApprove.php");
            exit();
        }
}
else {
    header("Location: ../../index.php");
    exit();
}