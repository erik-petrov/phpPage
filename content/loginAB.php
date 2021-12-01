<?php
require('conf.php');
global $conn, $salt;
session_start();
if(isset($_SESSION['tuvastamine'])) {
    header('Location: ./loomad.php');
    exit();
}

if(isset($_POST['login']) and isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $crypt=crypt($password, $salt);
    $order = $conn->prepare("select username, pass, isAdmin, koduleht from kasutajad where username=? and pass=?");
    $order->bind_param("ss", $login, $crypt);
    $order->bind_result($username, $pass, $isAdmin, $koduleht);
    $order->execute();
    if ($order->fetch()){
        $_SESSION['tuvastamine']='niilihtne';
        $_SESSION['username'] = $username;
        $_SESSION['isAdmin'] = $isAdmin;
        if(isset($koduleht)){
            header('Location: ./'.$koduleht);
        } else header('Location: ./_main.php');
        exit();
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