<?php 

include 'session.php';

$_SESSION['email']="";
$_SESSION['uid'] = "";
session_destroy();

setcookie("logged", "UnAuth", time() - (6400), "/"); // 86400 = 1 day
setcookie("uid", "", time() - (6400), "/");
header("location:../index.php?file=signin");

?>