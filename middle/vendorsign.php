<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Service Provider Sign In</li>
     </ul>
   </div>
   <form method="post">
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     
		    
	  	   
			<div class="form-group">
		    <img src="images/78.jpg" width="350px"  class="img-responsive" />  
		    </div>
		    
		 
	  </div>
	    
		 <div class="col-sm-6">
	     <div class="form-group">
		    <label for="edit-name">Username </label>
		    <input type="text" id="edit-name" placeholder="Enter Your Email" name="a1" value="" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email" />
		    </div>
            
			  <div class="form-group">
		      <label for="edit-pass">Password </label>
		      <input type="password" id="edit-pass" placeholder="Enter Your Password" name="a2" size="60" maxlength="128" class="form-text required" required="required" />
		    </div>
                     <a href="index.php?file=signin"> Sign in as user account </a>
                     <a href="index.php?file=usersignup" style='float: right'> I dont have a vendor account! </a>
                     
                     
			 <div class="form-actions" align="center">
		     <input type="submit" id="edit-submit" name="submit" value="Sign In" class="btn_1 submit" />
		     </div> 
	  </div>
	  
	   <?php
           include 'User/functions.php';
	   if(isset($_REQUEST['submit']))
			{
			   $a = $link-> real_escape_string($_REQUEST['a1']);
			   $b = $link-> real_escape_string($_REQUEST['a2']);
			   
			   $sel = "select * from serviceprovider_tb where sp_email = '$a' and sp_status='Active'";
			   $r = $con->query($sel);
			   // check row - data 
			   if(mysqli_num_rows($r) > 0)
			   {
			      while($rw= mysqli_fetch_assoc($r))
                              {
                                  $hash=$rw["hash"];
                                  $ps=$rw["sp_password"];
                                  
                                  $pass= hash('sha256',$hash.$b);
                                
                                  if($pass==$ps)
                                  {
				     session_start();
                                     $_SESSION["ac_type"]="Vendor";
					 $_SESSION["email"] = $a;
			         $_SESSION["uid"] = $rw['sp_id'];
                                 $_SESSION["u_name"] = $rw['sp_name'];
                                 
                                 $time=time() + (86400 * 30);
            setcookie("uid", enc($rw["u_id"]), $time, "/"); // 86400 = 1 day
 // 86400 = 1 day
                                 
					 
					 header("location:ServiceProvider/index.php");
                                  }
                                  else
                                  {
                                      ?> 
                                          <br/> <center style="color:#c32143;">Invalid Password...!!</center>
                                          <?php
                                  }
                              }  
			   }
			   else
			   {
               ?>
			  
               <br/> <center style="color:#c32143;">Invalid Username Or Password...!!</center>
              
			   <?php  
			   }
			   
			   
			} 
			?>
	  <div class="clearfix"> </div>
	  
   </div>
   </form>	
   
  </div>
</div>
