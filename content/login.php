<?php
session_start();
if(isset($_SESSION['tuvastamine'])) {
    header('Location: ./puud.php');
    exit();
}

if(isset($_POST['login']) and isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login == '123' and $password == '123'){
        $_SESSION['tuvastamine']='niilihtne';
        header('Location: ./puud.php');
    } else {
        echo "Invalid password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login vorm</h1>
<form action="" method="POST">
    Login:
    <input type="text" name="login" placeholder="username"><br>
    Parool:
    <input type="password" name="password"><br>
    <input type="submit" value="Logi sisse">
</form>

</body>
</html>