<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Service Providers Sign Up</li>
     </ul>
   </div>
   <form method="post" enctype="multipart/form-data">
   <div class="services">
   	  <div class="col-sm-6 login_left"> 
	  	     <div class="form-group">
		      <label for="edit-name">Category <span class="form-required" title="This field is required.">*</span></label>
		      <select class="form-text required" name="a1">
			  <option value="">Select Category</option>
			    <?php
                  $sel = "select * from category_tb where cat_status = 'Active'";
                  $r = $con->query($sel);
                  foreach($r as $v)
				  {
                 ?>
			  <option value="<?php echo $v['cat_id'];?>"><?php echo $v['cat_name'];?></option>
			  <?php } ?>
			  </select>
		    </div>
			<div class="form-group">
		      <label for="edit-name">Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="a2" value="" placeholder="Enter Name" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name" />
		    </div>
			<div class="form-group">
		      <label for="edit-name">Address <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Enter Address" rows="3" name="a3" required="required"></textarea>
		    </div>
			<div class="form-group">
		      <label for="edit-pass">Contact <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-pass" name="a4" size="60" maxlength="128" placeholder="Enter Contact" class="form-text required" required="required" pattern="[0-9]{10}" title="Enter Valid MObile No." />
		    </div>
		    <div class="form-group">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" placeholder="Enter Email" name="a5" value="" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email" />
		    </div>
		   
	  </div>
	    
		 <div class="col-sm-6">
            <div class="form-group">
		      <label for="edit-name">Shop Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" placeholder="Enter Shop Name" name="a6" value="" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name" />
		    </div>	     
              <div class="form-group">
		      <label for="edit-name">Shop Address <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Enter Shop Address" rows="3" name="a7" required="required"></textarea>
		    </div>    
                     <div class="form-group">
		      <label for="edit-name">Short Description <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Enter Shop Address" rows="3" name="bio" required="required"></textarea>
		    </div>
			  <div class="form-group">
              <label for="exampleInputEmail1">Shop Image</label>
              <input type="file" name="a8" class="form-control" required="required"  /> 				
			 </div>
			  <div class="form-group">
		      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
		      <input type="password" id="edit-pass" placeholder="Enter Password" name="a9" size="60" maxlength="128" class="form-text required" required="required">
		    </div>
			
			<div class="form-group">
              <input type="checkbox" name="checkbox"  /> I Have Read Terms And Condition.				
			 </div>
			
			 <div class="form-actions" align="center">
		     <input type="submit" id="edit-submit" name="submit" value="Sign Up" class="btn_1 submit">
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
	  
	    $check = "select * from serviceprovider_tb where sp_email = '$_REQUEST[a5]'";
		$result = $con->query($check);
		
		if(mysqli_num_rows($result) > 0)
		{
		    echo ("<script LANGUAGE='JavaScript'>window.alert('Already Exists This Email..!');window.location.href='index.php?file=serviceprovidersignup';</script>");
		}
		else
		{
	  $a = $link -> real_escape_string($_REQUEST['a1']);
	  $b = $link -> real_escape_string($_REQUEST['a2']);
	  $c = $link -> real_escape_string($_REQUEST['a3']);
	  $d = $link -> real_escape_string($_REQUEST['a4']);
	  $e = $link -> real_escape_string($_REQUEST['a5']);
      $f = $link -> real_escape_string($_REQUEST['a6']);
	  $g = $link -> real_escape_string($_REQUEST['a7']);	
          $bio=$link -> real_escape_string($_REQUEST["bio"]);
          
      
	  move_uploaded_file($_FILES['a8']['tmp_name'],"upload/shop/".$_FILES['a8']['name']);
      $h=$_FILES['a8']['name'];	  
	  
	  $i = $_REQUEST['a9'];
          $salt = substr(md5(rand()),0,9); 
          $i= hash('sha256',$salt.$i);
          
	  
	  date_default_timezone_set("Asia/Kolkata");
	  $j = date('Y-m-d h:i:s');
	  
	  $status = "Active";
	  
	  $ins = "insert into serviceprovider_tb(cat_id,sp_name,sp_address,sp_contact,sp_email,shop_name,shop_address,shop_image,sp_password,created_date,updated_date,sp_status,hash)value('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$j','$status','$salt')";
	  if($con->query($ins)==TRUE)
	    {
          header("location:index.php?file=home");
	    }
		}
		}
		else
   	     {
	     echo ("<script LANGUAGE='JavaScript'>window.alert('Please Accept Terms and Conditions..!');window.location.href='index.php?file=serviceprovidersignup';</script>");
		 }
	  }						
	  ?> 
  </div>
</div>