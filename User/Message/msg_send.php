
<?php
//error_reporting(0);
include '../../include/confing.php'; 
include '../session.php';
include '../functions.php';
?>
    
    <?php 
    $cid=$_REQUEST["cid"];
    $id=$_SESSION["uid"];
    $msg=$_REQUEST["msg"];
    
    $qry="insert into chat (send,rec,msg,seen) values ('$id','$cid','$msg','n')";
    mysqli_query($link, $qry);
    
                                             
       ?>
                                                        