<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getUser($_SESSION["uid"]);
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
$page="transactions";
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
              <h6>Transaction History</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date-Time</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Package</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                 
                      <?php 
                      $qry="select * from transactions where u_id='".$data->id."'";
                      $res= mysqli_query($link, $qry);
                      if(mysqli_affected_rows($link)>0)
                      {
                          while($rw= mysqli_fetch_assoc($res))
                          {
                      ?>
                      
                      
                      <tr>
                      <td>
                         <span class="text-secondary text-xs font-weight-bold"><?php echo $rw["od_id"] ?></span>
                      </td>
                      <td>
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $rw["date"] ?> </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if($rw["status"]=="Success") { ?>
                          <span class="badge badge-sm bg-gradient-success">
                            Success  
                          </span>
                        <?php }else{ ?>
                      <span class="badge badge-sm bg-gradient-secondary">
                            Failed  
                          </span>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php 
                          if($rw["pack"]=="pro") { echo "PRO PACKAGE"; } 
                          else { echo "+".$rw["pack"]." Connects"; }  ?></span>
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