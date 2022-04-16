<?
if (session_status()==PHP_SESSION_NONE) {
    session_start(); 
}

if(empty($_SESSION['login'])) {
    header("Location: login.php");
}

?>

<html>

    <form action='mainPage.php'>
    <title>Main Page</title>
        <h1>You are logged in as <?=$_SESSION['username']?></h1>
            <hr>
            You have successfully logged in <br>
            Close your browser window to log out
</form>
<html>