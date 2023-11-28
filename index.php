<?php
session_start();
require_once("./common.php");
if (!is_loggedin()) {
    redirect_to("/CPS714/iFitness/login/");
}
?>
<?php
$pdo = open_db();
$user = get_user_by($pdo, 'Username', $_SESSION['username']);
ping_last_visited($pdo, $user['Username']);
$date1 = new DateTime($user['Last_Visited']);
$date2 = new DateTime(date("Y-m-d"));
$interval = $date1->diff($date2);
$daysDifference = $interval->days;
?>
<!DOCTYPE html>
<html lang="en">
<?php
require "connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body style="background-image: linear-gradient(rgba(255, 255, 255, 0.7),rgba(255, 255, 255, 0.7)),url('./pictures/homepage.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-color: rgba(255, 0, 0, 0.5);">
    <?php include("./header.php"); ?>
    <?php
    if ($daysDifference > 0) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            Welcome back! It's been <?= $daysDifference ?> days since your last visit. Ready to crush it again?
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <div class="container-lg">
        <h1 style="text-align: center; font-size: 80px; margin-top: 60px;">Welcome to iFitness!</h1>
        <h2 style="text-align: center;">Unlock Your Potential, Transform Your Tomorrow. Whether you're a seasoned gym warrior or just taking your first steps, your journey to a stronger, healthier you starts now. Embrace the challenge, celebrate the progress, and redefine your limits. Together, we rise, one rep at a time.</h2>
    </div>

    <?php include("./footer.php"); ?>
</body>

</html>