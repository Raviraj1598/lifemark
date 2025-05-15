<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getUser($_SESSION["uid"]);
$id=$data->id;
if(isset($_REQUEST["book"]))
{
    $sp_id=$_REQUEST["book"];
 $qry="insert into bookings (sp_id,u_id,status) values('$sp_id','$id','pending')";
 mysqli_query($link, $qry);
 
 echo "<script> alert('Service Booked Please Wait For Contact And Check Booking History For Status!'); </script>";
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
  <style>
      .checked {
  color: orange;
}
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php
$page="servicebooking";
include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
     
    <!-- Navbar -->
<?php include 'include/nav.php'; ?>
          <div class="container-fluid">
              <form method="post">
                  <select class="form-control" name="cat" onchange="this.form.submit()">
         <?php if(isset($_POST["cat"])){ ?>
                      <option selected disabled>
              <?php $sel = "select * from category_tb where cat_id = '".$_POST["cat"]."'";
                  $r = $con->query($sel);
                  foreach($r as $v)
                                  {
                      
                      echo $v["cat_name"];
                                  }
                                  ?>
          </option>
         <?php }else{ ?>
            <option selected disabled>
              Select Category
          </option>
          
         <?php }
                  $sel = "select * from category_tb where cat_status = 'Active'";
                  $r = $con->query($sel);
                  foreach($r as $v)
				  {
                 ?>
			  <option value="<?php echo $v['cat_id'];?>"><?php echo $v['cat_name'];?></option>
			  <?php } ?>
      </select>
              </form>
      </div>
                <?php 
                if(isset($_POST["cat"]))
                {
                $qry="select * from serviceprovider_tb where cat_id='".$_POST["cat"]."'";
                }
 else {
       $qry="select * from serviceprovider_tb";
 }
                $res= mysqli_query($link, $qry);
                if(mysqli_affected_rows($link)>0)
                {
                while($rw= mysqli_fetch_assoc($res))
                {
                ?>
               <div class="container-fluid">
      
           <div class="row mt-4">
             <div class="card">
              <div class="card-body p-3">
                <div class="row">
                   <div class="col-lg-5">
                       <img class=" position-relative z-index-2 pt-4" style="height: 240px; width: 350px;" src="../upload/shop/<?php echo $rw["shop_image"]; ?>" alt="rocket">
                
                 
                </div>
                  
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                      <h5 class="font-weight-bolder" style="margin-top: 15px;"><?php echo $rw["shop_name"]; ?></h5>
                    <p class="mb-1 pt-2 text-bold">Service Provider: <?php echo $rw["sp_name"]; ?></p>
                    
                    <p class="mb-5">Location: <?php echo $rw["shop_address"]; ?><br>
                        Contact: <?php echo $rw["sp_contact"] ?><br>
                        Email: <?php echo $rw["sp_email"] ?> <br>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
                     </p>
                   <ul class="nav  nav-fill p-1 bg-transparent" >
                <li class="nav-item">
                    <a class=" mb-0 px-0 py-1 active " href="?book=<?php echo $rw["sp_id"]; ?>" onclick="return confirm('Booking Will Be Shown In My Booking Tab And Service Provider Will Contact You On Your Registered Mobile Number \nAre you sure you want to continue ?')" >
                    <span class="ms-1"> <i class="fa fa-link"></i> Book Now</span>
                  </a>
                </li>
                
                 <li class="nav-item">
              <a href="#" class="mb-0 px-0 py-1 active" href="#">
                <span class="ms-1"> <i class="fa fa-exclamation-circle"></i> Report </span>
                  </a>
                </li>
                
                </ul>
                  </div>
                </div>
               </div>
              </div>
             </div>
                 </div>
     
      </div>
                <?php 
                }   }
                ?>
                
            
          
      
  
     
      <?php include 'include/footer.php'; ?>
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
 <?php include 'include/js.php';?>
</body>
</html>