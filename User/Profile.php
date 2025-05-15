<?php
include '../include/confing.php';
include 'session.php';
include 'functions.php';
$data = getUser($_SESSION["uid"]);

if(isset($_POST["b1"]))
{
    $uid = $data -> id;
    $name= $link -> real_escape_string($_POST['name']);
    $bio= $link -> real_escape_string($_POST['bio']);
    $contact= $link -> real_escape_string($_POST['contact']);
    $city= $link -> real_escape_string($_POST['city']);
    $address= $link -> real_escape_string($_POST['address']);
    
    $qry="update user_tb set u_name='$name',user_bio='$bio',u_contact='$contact',u_city='$city',u_address='$address' where u_id='$uid'";
    mysqli_query($link, $qry);
    
    $data = getUser($_SESSION["uid"]);
}
if(isset($_POST["onfeed_n"]))
{
    $uid = $data -> id;
    $qry="update user_tb set onfeed='n' where u_id='$uid'";
    mysqli_query($link, $qry);
    $data = getUser($_SESSION["uid"]);
}
if(isset($_POST["onfeed_y"]))
{
    $uid = $data -> id;
    $qry="update user_tb set onfeed='y' where u_id='$uid'";
    mysqli_query($link, $qry);
    $data = getUser($_SESSION["uid"]);
}
if(isset($_POST["change_pass"]))
{
    if($_POST["new_pass"]==$_POST["rnew_pass"])
    { 
         $old_pass=$_POST["old_pass"];
         $new_pass=$_POST["new_pass"];
         $pass = getPass($_SESSION["uid"]);
         $uid=$data->id;
         $salt = $pass->hash; 
          $npass= hash('sha256',$salt.$old_pass);
         
         if($npass==$pass->pp)
         {
              $salt = substr(md5(rand()),0,9); 
              $npass= hash('sha256',$salt.$new_pass);
              
              $qry="update user_tb set u_password='$npass',hash='$salt' where u_id='$uid'";
              mysqli_query($link, $qry);
               echo "<script> alert('Password Changed Successfully '); </script>";
         }
         else {
             echo "<script> alert('Incorrect Password !'); </script>";
         }
         
         
    }
 else 
    {
    echo "<script> alert('Re-type Password Does Not Match !'); </script>";    
    }
}
if(isset($_POST["b2"]))
{
  if(isset($_FILES["dp"]) && $_FILES["dp"]["size"]>0)
            {
                $fname=time().$_FILES["dp"]["name"];
                move_uploaded_file($_FILES["dp"]["tmp_name"],"../upload/user/$fname");
             
                $qry="update user_tb set u_image='$fname' where u_id='".$data->id."'";
                mysqli_query($link, $qry);
                
                echo "<script> alert('!! Profile Picture Updated !!'); </script>";
            }
            $data = getUser($_SESSION["uid"]);
}


?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Wedding At One Touch | Profile
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
<?php $page="profile"; include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<?php 
include 'include/nav.php'; 
?>
    <!-- End Navbar -->
  <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="../upload/user/<?php echo $data -> dp; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $data -> name; ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                  <?php echo $data -> des; ?>
              </p>
            </div>
          </div>
         
        </div>
      </div>
    </div>
      <div class="container-fluid py-4">
      <div class="row">
          
          
             <div class="col-12 col-xl-8" id="info">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Profile Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;" onclick="edit()">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <p class="text-sm">
              <?php echo $data -> bio; ?> 
              </p>
              <hr class="horizontal gray-light my-4">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?php echo $data -> name; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?php echo $data -> contact; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $data -> email; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">City:</strong> &nbsp; <?php echo $data -> city; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp; <?php echo $data -> addr; ?></li>
              
            <!--    <li class="list-group-item border-0 ps-0 pb-0">
                
                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
          
           <div class="col-12 col-xl-8" id="edit" style="display: none">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Edit Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;" onclick="info()">
                    <i class="fa fa-close text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
                
                
                 <form role="form text-left" action="" method="post">
                     
                <div class="mb-3">
                  <input name="bio" type="text" class="form-control" placeholder="Bio" value="<?php echo $data -> bio; ?>">
                </div>
                 <div class="mb-3">
                  <input name="name" type="text" class="form-control" placeholder="Bio" value="<?php echo $data -> name; ?>">
                </div> 
                    <div class="mb-3">
                  <input name="contact" type="text" class="form-control" placeholder="Bio" value="<?php echo $data -> contact; ?>">
                </div> 
                     <div class="mb-3">
                  <input name="city" type="text" class="form-control" placeholder="Bio" value="<?php echo $data -> city; ?>">
                </div>
                      <div class="mb-3">
                  <input name="address" type="text" class="form-control" placeholder="Bio" value="<?php echo $data -> addr; ?>">
                </div>
                  
                <div class="text-center">
                  <button name="b1" type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update </button>
                </div>
                </form>
                <br>
                 <div class="col-md-8 d-flex align-items-center">
                     <h6 class="mb-0">Change Profile Image</h6>
                  
                 </div>
                <p> Use image of 4:4 for better fit in frame  </p><br>
                <form method="post" enctype="multipart/form-data"> 
                <div class="mb-3">
                  <input name="dp" type="file" class="form-control">
                </div>
                     <div class="text-center">
                  <button name="b2" type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Upload </button>
                </div>
                </form>
               
            </div>
          </div>
        </div>
          
             <div class="col-12 col-xl-8" id="passc" style="display: none">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Change Password</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;" onclick="info()">
                    <i class="fa fa-close text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
                
                
                 <form role="form text-left" action="" method="post">
                     
                <div class="mb-3">
                  <input name="old_pass" type="text" class="form-control" placeholder="Old Password">
                </div>
                 <div class="mb-3">
                  <input name="new_pass" type="password" class="form-control" placeholder="New Password" >
                </div> 
                    <div class="mb-3">
                  <input name="rnew_pass" type="text" class="form-control" placeholder="Re-type New Password">
                </div> 
                  
                  
                <div class="text-center">
                  <button name="change_pass" type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Change </button>
                </div>
                </form>
               
            </div>
          </div>
        </div>
          
          
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Platform Settings</h6>
            </div>
            <div class="card-body p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" disabled>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Show Mobile Number</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1" disabled>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Show Email Address</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                      <?php if($data->onfeed=="y") 
                      { ?>
                      <form method="post" action="">
                    <input name="onfeed_n" onclick="this.form.submit()" class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                    <input name="onfeed_n" type="hidden">
                      </form>
 <?php }
                      else {?>
                    <form method="post" action="">
                      <input name="onfeed_y" onclick="this.form.submit()" class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" >
                   <input name="onfeed_y" type="hidden">
                    </form>
                      <?php } ?>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2" >Show My Profile On Feeds</label>
                  </div>
                </li>
              </ul>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Security & Privacy</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                    <a href="#" onclick="passc()"> <i class="fa fa-key"></i>&nbsp; Change password </a>
                </li>
                <li class="list-group-item border-0 px-0">
                    <a href="#" onclick="return confirm('Are You Sure You Want To Delete Your Account Permenantly ?')"> <i class="fa fa-trash"></i>&nbsp; Delete account </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
     
        
        
      </div>
      </div>
      
      <?php include 'include/footer.php'; ?>
      
    
  </main>
 
  <!--   Core JS Files   -->
 <?php include 'include/js.php';?>
</body>
<script>
    function edit()
    {
        document.getElementById("edit").style.display = "block";
         document.getElementById("info").style.display = "none";
           document.getElementById("passc").style.display = "none\n\
      ";

    }
    function info()
    {
        document.getElementById("edit").style.display = "none";
         document.getElementById("info").style.display = "block";
           document.getElementById("passc").style.display = "none";

    }
     function passc()
    {
        document.getElementById("edit").style.display = "none";
         document.getElementById("info").style.display = "none";
         document.getElementById("passc").style.display = "block";
         

    }
    </script>
</html>