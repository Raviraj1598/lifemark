<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getUser($_SESSION["uid"]);

if(isset($_POST["rating"]))
{
    $b_id=$_POST["b_id"];
    $rating=$_POST["rating"];
    
    $qry="update bookings set rating='$rating' where b_id='$b_id'";
    mysqli_query($link, $qry);
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
    The Mark Life | Transaction History
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
$page="mybookings";
include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<?php include 'include/nav.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>My Bookings</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking Id</th>
                       <th class="r text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Shop Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date-Time</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                       <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ratings</th>
                     </tr>
                  </thead>
                  <tbody>
                 
                      <?php 
                      $qry="select * from bookings where u_id='".$data->id."'";
                      $res= mysqli_query($link, $qry);
                      if(mysqli_affected_rows($link)>0)
                      {
                          while($rw= mysqli_fetch_assoc($res))
                          {
                      ?>
                      
                      
                      <tr>
                      <td>
                         <span class="text-secondary text-xs font-weight-bold "><?php echo $rw["b_id"] ?></span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $rw["time"] ?> </span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $rw["time"] ?> </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if($rw["status"]=="pending") { ?>
                          <span class="badge badge-sm bg-gradient-secondary">
                            Pending  
                          </span>
                        <?php }else if($rw["status"]=="Contacted"){ ?>
                      <span class="badge badge-sm bg-gradient-success">
                            Contacted  
                          </span>
                        <?php }else{ ?>
                           <span class="badge badge-sm bg-gradient-secondary">
                            Not Accepted
                          </span>
                          <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                          <form method="post">
                              <input type="hidden" name='b_id' value='<?php echo $rw["b_id"]; ?>'>
                                     <select class='form-control' name='rating' onchange="this.form.submit()">
                                         <?php if($rw["rating"]!=="") { ?>
                                         <option selected disabled> <?php echo $rw["rating"]; ?> </option>
                                         <?php }else{ ?>
                              <option selected disabled> Rate Service </option>
                                         <?php } ?>
                              <option value='5'> 5 (Excellent Service) </option>
                              <option value='4'> 4 (Good Service) </option>
                              <option value='3'> 3 (Average Service)</option>
                              <option value='2'> 2 (Poor Service)</option>
                              <option value='1'> 1 (Very Bad Service)</option>
                          </select>
                          </form>
                      </td>
                     
                    </tr>
                
                    <?php 
                      }
                      }
                    ?>
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  
     
      <?php include 'include/footer.php'; ?>
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
 <?php include 'include/js.php';?>
</body>

</html>