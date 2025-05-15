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
$page="pro";
include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<?php include 'include/nav.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
        
     
          <div class="col-12 col-xl-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Get This Features After Upgrading To Pro</h6>
            </div>
              <br>
              <div class="card-body p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder">Benifits</h6>
             
              <ul>
                  <li>
                      Unlimited Connects
                  </li>
                  <li>
                      Email Visibility
                  </li>
                  <li>
                      Mobile Number Visibility
                  </li>
                  <li>
                      Fast Recommendation
                  </li>
                  <li>
                     At Just &nbsp;<i class="fa fa-rupee-sign"></i> 3000/- Only
                  </li>
              </ul>
              <br>
              <div class="col-12 col-xl-4">
                  <form method="post" action="PaytmKit/pgRedirect.php">
	<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
				<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
				<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
				<input type="hidden" title="TXN_AMOUNT" tabindex="10"
						 name="TXN_AMOUNT"
						value="3000">
                                <input type="hidden" name="uid" value="<?php echo dec($_COOKIE["uid"]) ?>">
			
                                <button class="btn bg-gradient-primary mt-4 w-100" type="submit">Pay &nbsp;<i class="fa fa-rupee-sign"></i> 3000/-</button>
 
	</form>
                    </div>
            </div>
          </div> 
        </div>
          
           <div class="col-12 col-xl-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">+20 Connects</h6>
            </div>
              <br>
              <div class="card-body p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder">Benifits</h6>
             
              <ul>
                  <li>
                      Only +20 Connects
                  </li>
                 
              </ul>
              <br>
              <div class="col-12 col-xl-4">
                  <form method="post" action="PaytmKit/pgRedirect.php">
	<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
				<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
				<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
				<input type="hidden" title="TXN_AMOUNT" tabindex="10"
						 name="TXN_AMOUNT"
						value="200">
                                <input type="hidden" name="uid" value="<?php echo dec($_COOKIE["uid"]) ?>">
			
                                <button class="btn bg-gradient-primary mt-4 w-100" type="submit">Pay &nbsp;<i class="fa fa-rupee-sign"></i> 200/-</button>
 
	</form>
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
<?php
if(isset($_REQUEST["status"]))
{
    if($_REQUEST["status"]=="failed")
    {
        echo "<script> alert('Transaction Failed'); </script>";
    }
 else {
    echo "<script> alert('You Have Recieved +20 Connects'); </script>";
}
   
}
?>