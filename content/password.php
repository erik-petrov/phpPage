<?php
$parool = "admin";
$salt = 'amogus';
$crypt=crypt($parool, $salt);
echo $crypt;