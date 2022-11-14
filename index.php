<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link href="bootstrap.min.css" rel="stylesheet">   -->
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel = "stylesheet">
    <title> Timesheet System </title>
    <link href = "styles.css" rel = "stylesheet">
</head>





<body>


    <p class = "text-white text-center mt-5 fs-1 fw-bold font-family-courier-new">LOGIN </p>

    <form method = "post" action = "login.php">

        <div class = "mt-5 pt-5 text-center mb-3 pb-3">
            <label for = "username" class = "form-label text-white ms-5">Username </label>
            <input type = "name" class = "form-control-sm" name = "username1">
        </div>

        <div class = "mb-3 text-center">
            <label for = "password" class = "form-label text-white ms-5">Password </label>
            <input type = "password" class = "form-control-sm" name = "password1">
        </div>

        <div class = "mb-3 text-center">

            <button type = "submit"> Login </button>

        </div>


    </form>
</body>


</html>
