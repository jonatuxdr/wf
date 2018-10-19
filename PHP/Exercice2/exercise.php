<?php
$password;
$salt;


$firstPart = substr(
    $password,
    0,
    floor(strlen($password)/2) + (strlen($password)%2)
);

$lastPart = substr($password, ceil(strlen($password)/ 2));
//abc
$saltedPassword = $firstPart . $salt . $lastPart;