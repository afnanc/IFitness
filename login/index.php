<?php
session_start();
require_once("../common.php");
?>
<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background: linear-gradient(to bottom, #E0F2F1, #D1E8E7);
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../global.css">
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    </style>
</head>

<body>
    <?php include("../header.php"); ?>
    <div class="container-lg">
        <h1 class="text-center">Login</h1>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-item">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>">
            </div>
            <div class="form-item">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
            <div class="form-item">
                <p>Don't have an account? <a href="/CPS714/iFitness/register/">Sign up now</a>.</p>
            </div>
        </form>
        <div style="text-align: center; font-family: monospace; margin-top: 10px;">
            <?php
            require "../connection.php";
            if (!empty($_POST)) {
                try {
                    $pdo = open_db();
                    $user = get_user_by($pdo, 'Username', $_POST["username"]);
                    if ($user && password_verify($_POST["password"], $user["Hash"])) {
                        $_SESSION["username"] = $user["Username"];
                        redirect_to("/CPS714/iFitness/");
                    } else {
                        throw new Exception("User not found or incorrect password.");
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            ?>
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>

</html>