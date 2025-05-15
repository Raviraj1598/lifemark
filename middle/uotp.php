<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">User OTP</li>
     </ul>
   </div>
   <form method="post">
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     
		    
	  	   
			<div class="form-group">
		    <img src="images/78.jpg" width="350px"  class="img-responsive" />  
		    </div>
		    
		 
	  </div>
	    <br/>
		 <div class="col-sm-6">
	     <div class="form-group">
		    <label for="edit-name">User OTP <span class="form-required" title="This field is required.">*</span></label>
		    <input type="text" id="edit-name" placeholder="Enter Your OTP" name="a1" value="" size="60" maxlength="60" class="form-text" required >
		    </div>
            
			 
		    </div>
			 <div class="form-actions" align="center">
		     <input type="submit" id="edit-submit" name="submit" value="Send" class="btn_1 submit">
		     </div> 
	  </div>
	  
	   <?php
	   if(isset($_REQUEST['submit']))
	   {
			   $a = $_REQUEST['a1'];
			   
			   $sel = "select * from user_tb where u_otp = '$a'";
			   $r = $con->query($sel);
			   // check row - data 
			   if(mysqli_num_rows($r) > 0)
			   {
			      foreach($r as $v);
				     
				 $up = "update user_tb set u_status='Active' where u_otp = '$a'";
			     
				 if($con->query($up)==TRUE)			   	 
				 { 
				    header("location:index.php?file=signin");
				 }
					 header("location:index.php?file=signin"); 
			   }
			   else
			   {
               ?>
			     <br/>
                <center style="color:#c32143;">Invalid User OTP...!!</center>
              
			   <?php  
			   }
			   
			   
			} 
			?>
	  <div class="clearfix"> </div>
	  
   </div>
   </form>	
   
  </div>
</div>