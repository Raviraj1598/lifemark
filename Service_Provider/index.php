<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php 
	// file calling
	include_once("include/meta.php");
	include_once("include/title.php");
	include_once("include/link.php");
	include_once("include/confing.php");
	
	if(isset($_REQUEST['file']))
	{
	  $filename = $_REQUEST['file'];
	}
	else if($_SERVER['QUERY_STRING']=="")
    {
	   header("location:index.php?file=login");
	   exit();
	}
	else
	{
	     header("location:index.php?file=login");
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
     <?php 
	 if($filename!='login')
	 {
	 ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">
     <?php 
	 include_once("include/header.php");
	 ?>   
    </div>
	<?php } ?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <?php 
		 if($filename!='login')
	     {
		 ?>  
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
        <?php include_once("include/left_bar.php");?>      
        </div>
		
        <!--/span-->
        <!-- left menu ends -->

        
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?file=home">Home</a>
        </li>
        <li>
            <a href="#"><?php echo ucfirst($filename);?></a>
        </li>
    </ul>
</div>
<?php } ?>

<?php include_once("middle/".$filename.".php");?>



<!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    

    <hr>

    
    <?php
	 if($filename!='login')
	 {
	?>
    <footer class="row">
        <?php include_once("include/footer.php");?> 
    </footer>
  <?php } ?>
</div><!--/.fluid-container-->
 <?php include_once("include/script.php");?> 
</body>
</html>
<?php ob_flush();?>