<?php 

$_SESSION['email']="";
$_SESSION['uid'] = "";

session_destroy();

header("location:index.php?file=signin");

?>