<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getSp($_SESSION["uid"]);
$id=$data->id;
if(isset($_POST["status"]))
{
    $bid=$_POST["b_id"];
    $status=$_POST["status"];
    $qry="update bookings set status='$status' where b_id='$bid'";
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
    Life Mark | Dashboard
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
$page="booking";
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
              <h6>My Booking Requests</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking Id</th>
                       <th class="r text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                       <th class="r text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                       <th class="r text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date-Time</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                       <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ratings</th>
                     </tr>
                  </thead>
                  <tbody>
                 
                      <?php 
                      $qry="select * from bookings where sp_id='".$data->id."'";
                      $res= mysqli_query($link, $qry);
                      if(mysqli_affected_rows($link)>0)
                      {
                          while($rw= mysqli_fetch_assoc($res))
                          {
                              $udata= getUser($rw["u_id"]);
                      ?>
                      
                      
                      <tr>
                      <td>
                         <span class="text-secondary text-xs font-weight-bold "><?php echo $rw["b_id"]; ?></span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $udata -> name; ?> </span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $udata -> email; ?> </span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $udata -> contact; ?> </span>
                      </td>
                       <td>
                         <span class="text-secondary text-xs font-weight-bold "><?php echo $rw["time"]; ?></span>
                      </td>
                     
                      <td class="align-middle text-center">
                          <form method="post">
                              <input type="hidden" name='b_id' value='<?php echo $rw["b_id"]; ?>'>
                                     <select class='form-control' name='status' onchange="this.form.submit()">
                                         <?php if($rw["status"]=="pending") { ?>
                                         <option selected disabled> <?php echo "Click To Change Status"; ?> </option>
                                         <?php }else if($rw["status"]=="Contacted"){ ?>
                              <option selected disabled> Contacted </option>
                                         <?php }else if($rw["status"]=="Booking Reject"){ ?>
                              <option selected disabled> Rejected </option>
                                         <?php } ?>
                              <option> Contacted </option>
                              <option> Booking Reject </option>
                          </select>
                          </form>
                      </td>
                       <td>
                         <span class="text-secondary text-xs font-weight-bold "><?php echo $rw["rating"]; ?></span>
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