
<?php
//error_reporting(0);
include '../../include/confing.php'; 
include '../session.php';
include '../functions.php';
?>
    
    <?php 
    $cid=$_REQUEST["cid"];
    $id=$_SESSION["uid"];
    $u_cid=getUser($cid);
  
    
    $qry="select send,rec AS aa from chat where send='$id' or rec='$id' GROUP BY send,rec order by(c_id)desc";
    $res= mysqli_query($link, $qry);
    if($cid!="0")
    {
        $cdp = $u_cid-> dp;

        $qry="select * from chat where send='$id' and rec='$cid' or rec='$id' and send='$cid' limit 0,30";
        $res=mysqli_query($link, $qry);
        while($rw= mysqli_fetch_assoc($res))
        {
           if($rw["msg"]!="<CONNECTION>")
           {
               if($rw["send"]==$id)
               {
                   echo "<div class='right'><p> <span class='msg'> ".$rw["msg"]." </span> </p> </div>";
               }
                else {
                    echo "<div class='left'> <p> <img class='c-img' src='../upload/user/$cdp' height='30px'> <span class='msg'> ".$rw["msg"]." </span> </p> </div>";
                }
               
               
               
           }
        }
        
    }
    else
    {
        echo "Please Connect With Someone To Message!<br><br> ** INSTRUCTIONS ** <br><br> * Use connects to message someone<br> * Find match for message ";
    }
                                             
       ?>
                                                        