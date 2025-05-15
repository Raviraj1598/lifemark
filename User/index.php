<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getUser($_SESSION["uid"]);
$id=$data->id;
if(isset($_REQUEST["connect"]))
{
    if($data -> con >= "2")
    {
    $cid=$_REQUEST["connect"];
    $qry="insert into chat (send,rec,msg,seen) values ('$id','$cid','<CONNECTION>','n')";
    mysqli_query($link, $qry);
    
    $qry2="insert into chat (send,rec,msg,seen) values ('$cid','$id','<CONNECTION>','n')";
    mysqli_query($link, $qry2);

    $qry3="update user_tb set u_connects=u_connects-2 where u_id='$id'";
    mysqli_query($link, $qry3);
    }
 else {
    echo "<script> alert('You Have Low Connects'); </script>";    
    }
}
if(isset($_REQUEST["cancel"]))
{
    $qry2="insert into cancel_list (u_id,u_cid) values ('".$data->id."','".$_REQUEST["cancel"]."')";
    mysqli_query($link, $qry2);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Wedding At One Touch | Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php
$page="findmatch";
include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<?php include 'include/nav.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
        
        <?php 
        if($data-> gender =="Male")
        {
            $attr="Female";
        }
        else
        {
             $attr="Male";
        }
        $uid= $data -> id;
        
        $qry="select * from user_tb where u_id != '$uid' && u_gender = '$attr'"; 
                $res= mysqli_query($link, $qry);
                if(mysqli_affected_rows($link)>0)
                {
                    while($match= mysqli_fetch_assoc($res))
                    {
                       $u_id= $match["u_id"];
                        
                         $qry11="select * from chat where send='$uid' and rec='$u_id' or rec='$uid' and send='$u_id'";
                         $res11= mysqli_query($link, $qry11);
                         if(mysqli_affected_rows($link)==0)
                            {
                                $qrr="select * from cancel_list where u_id='$uid' && u_cid='".$match["u_id"]."'";
                                $sql= mysqli_query($link, $qrr);
                                if(mysqli_affected_rows($link)==0)
                                {
                        
                        
        ?>
          
             <div class="col-lg-4 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <div class=" border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                    <center> <img src="../upload/user/<?php echo $match["u_image"]; ?>" style="width: 270px; height: 270px; object-fit: cover;"></img>
                    </center> </div>
              </div>
              <h6 class="ms-2 mt-4 mb-0"> <?php echo $match["u_name"]; ?> </h6>
              <p class="text-sm ms-2">
                  <?php echo $match["u_des"]; ?>
                  <br>
                  Age: <?php 
              
  $dateOfBirth = $match["dob"];
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dateOfBirth), date_create($today));
  echo $diff->format('%y');

               ?>  <br> 
                City: <?php echo $match["u_city"]; ?> <br>  </p>
            
              
                <ul class="nav  nav-fill p-1 bg-transparent" >
                <li class="nav-item">
                    <a class=" mb-0 px-0 py-1 active " href="?connect=<?php echo $match["u_id"]; ?>" onclick="return confirm('You Will Be Charged 2 Connects \nAre you sure you want to continue ?')" >
                    <span class="ms-1"> <i class="fa fa-link"></i> Connect</span>
                  </a>
                </li>
                
                 <li class="nav-item">
              <a href="#" class="mb-0 px-0 py-1 active" href="#">
                <span class="ms-1"> <i class="fa fa-exclamation-circle"></i> Report </span>
                  </a>
                </li>
                
                <li class="nav-item">
              <a class="mb-0 px-0 py-1 active " href="?cancel=<?php echo $match["u_id"]; ?>"  >
                <span class="ms-1"> <i class="fa fa-close"></i> Cancel </span>
                  </a>
                </li>
                
                </ul>
              
            </div>
            
          </div>
        </div>
      
                                <?php } }
                                                    
                            
                            } 
                }
                    else
                    {
                        echo "Something Went Wrong ! Please Try Again Later..";
                    }
                    
                    ?>
              
          
      </div>
        
  
     
      <?php include 'include/footer.php'; ?>
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
 <?php include 'include/js.php';?>
</body>
<?php 
if(isset($_REQUEST["status"]))
{
if($_REQUEST["status"])
{
    echo "<script> alert('Your Account Is Upgraded To Pro'); </script>";
}
}
?>
</html>