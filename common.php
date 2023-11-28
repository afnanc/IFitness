<?php
function is_loggedin()
{
    return isset($_SESSION['username']);
}

function redirect_to($location)
{
    header("location: " . $location);
    exit();
}

function open_db()
{
    $host = 'localhost';
    $dbname = 'iFitness';
    $username = 'root';
    $password = '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception) {
        return;
    }
}

function get_user_by($pdo, $field, $value)
{
    try {
        $sql = "SELECT * FROM Users WHERE " . $field . " = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$value]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (Exception) {
        return;
    }
}

function ping_last_visited($pdo, $username)
{
    try {
        $current_date = date("Y-m-d");
        $sql = "UPDATE Users SET Last_Visited = :new_value WHERE Username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':new_value', $current_date);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    } catch (Exception) {
        return;
    }
}