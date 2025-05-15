<?php 

$a = $_SESSION['slogin'];
date_default_timezone_set("Asia/Kolkata");
$c = date('Y-m-d h:i:s');

$up= "update serviceprovider_tb set updated_date = '$c' where sp_email = '$a'";

if($con->query($up)==TRUE)
{
   $_SESSION["slogin"] = "";
   $_SESSION["sprofile"] = "";
   $_SESSION["slast"] = "";
   $_SESSION["sid"] = "";
   
   
   unset($_SESSION["slogin"]);
   unset($_SESSION["sprofile"]);
   unset($_SESSION["slast"]);
   unset($_SESSION["sid"]);
   
   session_destroy();
   
    header("location:index.php?file=login");
   
}
?>