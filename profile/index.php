<?php
    session_start();
    require_once("../common.php");
    if (!is_loggedin()) {
        redirect_to("/CPS714/iFitness/login/");
    }
?>
<?php
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../global.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>


<body>
    <?php include("../header.php"); ?>
    <div class="container-lg">
        <h1 class="text-center">Profile</h1>

        <h3 class="text-center m-2"> User Information</h3>
        <h2>Hey, <?= $_SESSION['username'] ?>!</h2>
        
        <table id='user-info' class="user-table"> 
        </table>

        <script> //JS for populating table
            let userInfo = <?= json_encode(get_user_by($pdo, 'Username',$_SESSION['username'])); ?>;
            const userTable = document.getElementById('user-info');
            let html = '';

            for (const key in userInfo){
                if (key === 'Hash') continue;
                html += `<tr><th>${key}: </th> <td>${userInfo[key]}</td></tr>`;
            }
            userTable.innerHTML = html;
        </script>

    </div>
    <?php include("../footer.php"); ?>
</body>

</html>