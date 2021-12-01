<?php
$salt = "amogus";
$serverName = "localhost";
$username = "erikpetrov";
$password = "123456789";
$DBName = "erikpetrov";
$conn = new mysqli($serverName, $username, $password, $DBName);
$conn->set_charset('UTF8');
/*create table loomad(
    loomadID int primary key AUTO_INCREMENT,
    nimi varchar(30),
    kirjeldus text);

insert into loomad(nimi, kirjeldus) values('Artem','Makaka');
select * from loomad

create table trees(
    treesID int PRIMARY KEY AUTO_INCREMENT,
    nimi varchar(30),
    link text);
*/