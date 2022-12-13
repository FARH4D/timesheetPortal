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

    <p class = "text-white text-center mt-5 fs-1 fw-bold font-family-courier-new">REGISTER </p>

    <form method = "post" action = "dataHandling/signup.php">
        <?php if (isset($_GET['error'])){ ?>
            <p class = "text-danger mt-5" style="margin-left:43.5%; font-weight: bolder;"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>

        <?php if (isset($_GET['signedUp'])){ ?>
            <p class = "text-success mt-5" style="margin-left:43.5%; font-weight: bolder;"> <?php echo $_GET['signedUp']; ?> </p>
        <?php } ?>
        
        <div class = "pt-4 mb-3 text-center">
            <label for = "firstName1" class = "form-label text-white ms-5">First Name: &nbsp;</label>
            <input type = "name" class = "form-control-sm" name = "firstName1">
        </div>

        <div class = "pt-4 mb-3 text-center">
            <label for = "lastName1" class = "form-label text-white ms-5">Last Name: &nbsp; </label>
            <input type = "name" class = "form-control-sm" name = "lastName1">
        </div>

        <div class = "pt-4 text-center mb-3 pb-3">
            <label for = "username1" class = "form-label text-white ms-5">Username: &nbsp; </label>
            <input type = "name" class = "form-control-sm" name = "username1">
        </div>

        <div class = "mb-3 text-center">
            <label for = "password1" class = "form-label text-white ms-5">Password: &nbsp; </label>
            <input type = "password" class = "form-control-sm" name = "password1">
        </div>

        <div class = "mb-3 text-center">
            <label for = "rePassword1" class = "form-label text-white ms-5">Confirm &nbsp; </br>Password: &nbsp; </label>
            <input type = "password" class = "form-control-sm" name = "rePassword1">
        </div>

        <div class = "mb-3" style = "margin-left: 50%">

            <button type = "submit"> Register </button>

        </div>
    </form>

    <a href = "index.php" style = "color: var(--bs-white); margin-left: 43.5%">Already have an account? Click here.</a>

</body>
</html>