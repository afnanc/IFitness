<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <div class="container-lg" style="min-height: 100vh; padding: 15px;">
        <h1 class="text-center">Register</h1>
        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-item">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>First Name</label>
                <input type="text" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Last Name</label>
                <input type="text" name="lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Password</label>
                <input type="text" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Repeat Password</label>
                <input type="text" name="password-repeat" value="<?php echo isset($_POST["password-repeat"]) ? $_POST["password-repeat"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Tel No</label>
                <input type="text" name="tel" value="<?php echo isset($_POST["tel"]) ? $_POST["tel"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ""; ?>">
            </div>
            <div class="form-item">
                <label>City Code</label>
                <input type="text" name="city-code" value="<?php echo isset($_POST["city-code"]) ? $_POST["city-code"] : ""; ?>">
            </div>
            <div class="form-item">
                <button type="submit" class="btn btn-dark">Register</button>
            </div>
            <div class="form-item">
                <p>Already have an account? <a href="/CPS714/iFitness/login/">Login here</a>.</p>
            </div>
        </form>
        <div style="text-align: center; font-family: monospace; margin-top: 10px;">
            <?php
            require "../connection.php";
            if (!empty($_POST)) {
                try {
                    if (empty($_POST["username"])) {
                        throw new Exception("Username required.");
                    }
                    if (empty($_POST["email"])) {
                        throw new Exception("Email required.");
                    }
                    if (empty($_POST["password"])) {
                        throw new Exception("Password required.");
                    }
                    if ($_POST["password"] != $_POST["password-repeat"]) {
                        throw new Exception("Passwords don't match.");
                    }

                    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $sql = "INSERT INTO Users (Username, First_Name, Last_Name, Hash, Last_Visited, Email, Tel_No, Address, City_Code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_POST["username"], $_POST["fname"], $_POST["lname"], $hash, '2023-10-22', $_POST["email"], $_POST["tel"], $_POST["address"], $_POST["city-code"]]);
                    echo "User Successfully Registered! Now go Login!";
                    exit();
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