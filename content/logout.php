<?php
session_start();

if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('Location: loginAB.php');
    exit();
}

/*
create table kasutajad(
    kasutajadID int PRIMARY key AUTO_INCREMENT,
    username varchar(20),
    pass varchar(200),
    isAdmin boolean,
    koduleht varchar(100));
*/