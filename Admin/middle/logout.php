<?php 

$a = $_SESSION['login'];
date_default_timezone_set("Asia/Kolkata");
$c = date('Y-m-d h:i:s');

$up= "update login_tb set l_time = '$c' where username = '$a'";

if($con->query($up)==TRUE)
{
   $_SESSION["login"] = "";
   $_SESSION["profile"] = "";
   $_SESSION["last"] = "";
   
   
   unset($_SESSION["login"]);
   unset($_SESSION["profile"]);
   unset($_SESSION["last"]);
   
   
   session_destroy();
   
    header("location:index.php?file=login");
   
}
?>