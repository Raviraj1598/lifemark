<?php 
if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
{
  header("location:index.php?file=signin");
}
$userprofile = "select * from user_tb where u_email = '$_SESSION[email]'";
$pr = $con->query($userprofile);
foreach($pr as $pv);
$img = $pv['u_image'];
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">User Profile</li>
     </ul>
   </div>
   <form method="post" enctype="multipart/form-data">
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     
		    <div class="form-group">
		      <label for="edit-name">City <span class="form-required" title="This field is required.">*</span></label>
		      <select class="form-text required" name="city">
			  <option value="">Select City</option>
			    <?php
                  $city = "select * from city_tb where c_status = 'Active'";
                  $r = $con->query($city);
                  foreach($r as $v)
				  {
				    if($v['c_id']==$pv['c_id'])
				    {
				  ?>
				  	<option value="<?php echo $v['c_id'];?>" selected="selected"><?php echo $v['c_name'];?></option>
				  <?php
				  }
				  else
                 {
				 ?>
			  <option value="<?php echo $v['c_id'];?>"><?php echo $v['c_name'];?></option>
			  <?php } }?>
			  </select>
		    </div>
	  	    <div class="form-group">
		      <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="a1" placeholder="Enter Username" size="60" maxlength="60" class="form-text required"  value="<?php echo $pv['u_name'];?>" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name"/>
		    </div>
			<div class="form-group">
		      <label for="edit-name">Address <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Enter Address" rows="3" name="a2" required="required" ><?php echo $pv['u_address'];?></textarea>
		    </div>
			<div class="form-group">
		      <label for="edit-pass">Contact <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-pass" name="a3" size="60" maxlength="128" placeholder="Enter Contact" class="form-text required" value="<?php echo $pv['u_contact'];?>" readonly="" required="required" pattern="[0-9]{10}" title="Enter Valid MObile No.">
		    </div>
		    
			     <div class="form-group">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" placeholder="Enter Email" name="a4" value="<?php echo $pv['u_email'];?>" readonly="" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email">
		    </div>
            <div class="form-group">
		      <label for="edit-name">Gender <span class="form-required" title="This field is required.">*</span></label>
		      <select class="form-text required" name="a5">
			  <?php
			  if($pv['u_gender']=="Male")
			  {
			  ?>
			  <option value="Male" selected="selected">Male</option>
			  <option value="Female">Female</option>
			  <?php
			  }
			  else
			  {
			  ?>
			   <option value="Male" >Male</option>
			  <option value="Female" selected="selected">Female</option>
			  <?php }?>
			  </select>
		    </div>
		 
	  </div>
	    
		 <div class="col-sm-6">
	      
		  <center><img src="upload/user/<?php echo $pv['u_image'];?>" style="width:200px; height:200px; border-radius:80%"/></center>
	       <br/>
			  <div class="form-group">
		      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-pass" placeholder="Enter Password" name="a6" size="60" maxlength="128" class="form-text required" value="<?php echo $pv['u_password'];?>" required="required" />
		    </div>
			
			<div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <input type="file" name="a7" class="form-control" required="required" /> 				
			 </div>
			
			<div class="form-group">
              <input type="checkbox" name="checkbox"  /> I Have Read Terms And Condition.				
			 </div>
			 
			 <div class="form-actions" align="center">
		     <input type="submit" id="edit-submit" name="submit" value="Change Details" class="btn_1 submit">
		     </div> 
	  </div>
	   
	  
	  <div class="clearfix"> </div>
	  
   </div>
   </form>	
   	  <?php
	  if(isset($_REQUEST['submit']))
	  {
	  
	     if(isset($_REQUEST['checkbox']))
		 {

	  $a = $_REQUEST['a1'];
	  $b = $_REQUEST['a2'];
	 // $c = $_REQUEST['a3'];
	 // $d = $_REQUEST['a4'];
	  $e = $_REQUEST['a5'];
	  
	 
	  $city = $_REQUEST['city'];
	  move_uploaded_file($_FILES['a7']['tmp_name'],"upload/user/".$_FILES['a7']['name']);
      $f=$_FILES['a7']['name'];	
	  
	  if(strlen($f) > 0)
	  {
	     $img = $f;
	  }
	  
	  
	  date_default_timezone_set("Asia/Kolkata");
	  $g = date('Y-m-d h:i:s');
	  
	  $h = $_REQUEST['a6'];
	  
	  $ins = "update  user_tb set c_id = '$city',u_name = '$a',u_address ='$b',u_gender = '$e',u_password = '$h',u_image = '$img',updated_date ='$g' where u_email = '$_SESSION[email]'";
	  
	  if($con->query($ins)==TRUE)
	    {
		 
          header("location:index.php?file=home");
	    }
	  }
	  
	  else
	  {
	        echo ("<script LANGUAGE='JavaScript'>window.alert('Please Accept Terms and Conditions..!');window.location.href='index.php?file=userprofile';</script>");
		
	  }
	 }						
	  ?>
  </div>
</div>