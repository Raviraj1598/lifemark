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
  <link href="include/chatbox.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php
$page="messages";
include 'include/aside.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<?php include 'include/nav.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4 row">
       <div class="col-12 col-xl-4 ">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Connects</h6>
            </div>
            <div class="card-body p-3 msg-box" >
              <ul class="list-group" id="connections">
                  
                  
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-xl-8">
          <div class="card h-100">
            <div class="card-body p-3">
              <ul class="list-group">
                   <?php if(isset($_REQUEST["cid"])) { $cid= getUser($_REQUEST["cid"]);  ?>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                      <img  src="../upload/user/<?php echo $cid -> dp; ?>" alt="kal" class="shadow" style="height: 40px; width:40px; border-radius: 10px;">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                     
                    <h6 class="mb-0 text-sm"><?php echo $cid -> name; ?></h6>
                    <p class="mb-0 text-xs">Offline</p>
                  </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;"><i class="fa fa-ban" style="font-size:20px;color:red"></i></a>
                      <a class="pe-3 ps-0 mb-0 " href="?deleteChat=<?php echo $cid->id; ?>" onclick="return confirm('This Will Delete All The Messages From Both Sides\nAre You Sure You Want To Delete ?')"><i class="fa fa-trash" style="font-size:20px;"></i></a>
                      
                </li>
                   
               </ul> 
              <hr>
              <?php }else{ ?> 
                     
                       <?php } ?>
              <input type="hidden" id="cid" value="<?php if(isset($_REQUEST["cid"])){ echo $_REQUEST["cid"]; }else{
                        echo "0";
                    } ?>">
                <div id="msg" class="msg-box">
                    
                    
               
                </div>
                <hr>
                <div class="col-xl-12 row">
               <div class="col-xl-11">
                  <input id="ms" name="bio" type="text" class="form-control" placeholder="Message">
                  </div>
                    
                    <div class="col-xl-1">
                  <a class="btn btn-link pe-3 ps-0 mb-0" href="javascript:;" id="send"><i class="fa fa-send" style="font-size:20px;"></i></a>
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
  <script src="include/ajx.js"></script>
  <script>
   setInterval(function(){
        
    $.ajax({url: "Message/connections.php",  
        async:true,
       cache:false,
     success: function(result){
      $("#connections").html(result);
    }
    });
    
     var cid=document.getElementById("cid").value;
     $.ajax({url: "Message/messages.php?cid="+cid,  
        async:true,
       cache:false,
     success: function(result){
      $("#msg").html(result);
    }
    });
           
     },2000);
     
     if(document.getElementById('msg')!="")
    {
    $(document).ready(function(){
        $("#send").click(function(){
             var ms = $("#ms").val();
             var ms= ms.replace("+", "*PLUS*");
            
             var cid=document.getElementById("cid").value;
             $.get("Message/msg_send.php?msg="+ms+"&cid="+cid, function(data, status){
                 if(status=='success')
                 {
                setTimeout(
  function() 
  {
      var elem = document.getElementById('msg');
      elem.scrollTop = elem.scrollHeight;
  //do something special
  }, 3000);
                 }
    });
      
$('#ms').val('');
   });
  
  $('#message').keypress(function(e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
     $('#send').trigger('click');
    }
  });


});
}
     
  </script>
</body>

