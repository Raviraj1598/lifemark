<?php
ob_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<?php 


if(isset($_REQUEST["login"]))
{
    echo "<script> alert('Account Created \nLogin With Your Credentials'); </script>";
}


include_once("include/title.php");
include_once("include/meta.php");
include_once("include/link.php");
include_once("include/confing.php");
include_once("User/session.php");
//include_once 'User/functions.php';
	
if(isset($_SESSION["uid"]))
{
    if($_SESSION["ac_type"]=="Vendor")
    {
         header("location:ServiceProvider/index.php");
    }
 else {
     header("location:User/index.php");
}
  
}

	if(isset($_REQUEST['file']))
	{
	  $filename = $_REQUEST['file'];
	}
	else if($_SERVER['QUERY_STRING']=="")
    {
	   header("location:index.php?file=home");
	   exit();
	}
	else
	{
	     header("location:index.php?file=home");
	     exit();
	}
	// file check
	if(!file_exists(getcwd()."/middle/".$_REQUEST['file'].".php"))
	{
        header("location:index.php?file=404");
	    exit();
	   
	}
?>
</head>
<body>
<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <?php include_once("include/menu.php");?>
	   <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->

   <?php 
   if($filename=='home')
   {
   include_once("include/banner.php");
   }
   ?>


    <?php include_once("middle/".$filename.".php");?>

	
    <div class="footer">
    	<?php include_once("include/footer.php");?>
    </div>
</body>
</html>	
<?php ob_flush();?>