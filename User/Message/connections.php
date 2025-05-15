
<?php
//error_reporting(0);
include '../../include/confing.php'; 
include '../session.php';
include '../functions.php';
?>
    
    <?php 
    $id=$_SESSION["uid"];
    $qry="select send,rec AS aa from chat where send='$id' or rec='$id' GROUP BY send,rec order by(c_id)desc";
    $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)>0)
    {
    while($rr= mysqli_fetch_assoc($res))
    {
        
      if($rr["aa"] !== $id)
    {
          $data=getUser($rr["aa"]);
          ?>
               <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                      <img src="../upload/user/<?php echo $data -> dp; ?>" alt="kal" class="shadow" style="height: 35px; width:35px; border-radius: 3px;">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm"><?php echo $data -> name; ?></h6>
                    <p class="mb-0 text-xs"><?php echo "No new messages"; ?></p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="Messages.php?cid=<?php echo $data->id; ?>">Message</a>
                </li>

<?php
    }
        
  

    }
    }else
    {
        echo "<br>You Have No Connections<br> Please Connect With Someone To Message!";
    }
                                             
       ?>
                                                        