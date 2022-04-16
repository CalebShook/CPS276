<?php

require_once('../shared/db.php');

if (session_status()==PHP_SESSION_NONE) {
    session_start(); 
}

if(!empty($_SESSION['login'])) {
    header("Location: mainPage.php");
}

$username = "";
$password = "";

if(!empty($_POST['sbutton'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashPassword = hash('md5', $password);
     
    $results = execute("SELECT * FROM assignment9 WHERE password_hash = '$hashPassword' AND user_name = '$username'");

    if($results == true) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = "loggedIn";
        header("Location: mainPage.php");
    }
    else {
        echo("Invalid Username or Password");
    }
}

?>
<html>
    <form action="login.php" method="post"> 

        <title>Log In</title>

        <h1>Enter Username and Password</h1>

        <hr>

        Username:
        <input type="text" name="username" value=<?=$username?>>
        <br>
        Password:
        <input type="password" name="password" value=<?=$password?>>
        <br>
        <input type="submit" name="sbutton" value="Submit">

    </form>
<html>