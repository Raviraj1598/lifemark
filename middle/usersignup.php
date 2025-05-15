<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">User Sign Up</li>
     </ul>
   </div>
   <form method="post" enctype="multipart/form-data">
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     
		    <div class="form-group">
		      <label for="edit-name">City <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="city" value="" placeholder="Enter Your City" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name">
		    </div>
	  	    <div class="form-group">
		      <label for="edit-name">Full Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="username" value="" placeholder="Enter Username" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name">
		    </div>
			<div class="form-group">
		      <label for="edit-name">Address <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Enter Address" rows="3" name="address" required="required"></textarea>
		    </div>
			<div class="form-group">
		      <label for="edit-pass">Mobile Number <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-pass" name="contact" size="60" maxlength="128" placeholder="Enter Contact" class="form-text required" required="required" pattern="[0-9]{10}" title="Enter Valid MObile No.">
		    </div>
              <div class="form-group">
		      <label for="edit-name">Short Bio <span class="form-required" title="This field is required.">*</span></label>
			  <textarea class="form-control bio" placeholder="Short Bio To Describe You" rows="3" name="bio" required="required"></textarea>
		    </div>
		    
		 
	  </div>
	    
		 <div class="col-sm-6">
                     <div class="form-group">
		      <label for="edit-name">Date Of Birth <span class="form-required" title="This field is required.">*</span></label>
		      <input type="date" id="edit-name" placeholder="DOB" name="dob" value="" size="60" maxlength="60" class="form-text required" required="required"  title="Enter Valid Email">
		    </div>
	     <div class="form-group">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" placeholder="Enter Email" name="email" value="" size="60" maxlength="60" class="form-text required" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email">
		    </div>
                     <div class="form-group">
		      <label for="edit-name">Job Designation <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" placeholder="Job Designation" name="des" value="" size="60" maxlength="60" class="form-text required" required="required" title="Enter Valid Email">
		    </div>
            <div class="form-group">
		      <label for="edit-name">Gender <span class="form-required" title="This field is required.">*</span></label>
		      <select class="form-text required" name="gender">
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			  </select>
		    </div>
			  <div class="form-group">
		      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
		      <input type="password" id="edit-pass" placeholder="Enter Password" name="password" size="60" maxlength="128" class="form-text required" required="required">
		    </div>
			
			<div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <p> Please Upload 4:4 For Perfect Fit </p>
              <input type="file" name="a7" class="form-control" required/> 				
			 </div>
			
			<div class="form-group">
                            <input type="checkbox" name="checkbox" required /> I Have Read Terms And Condition.				
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
	   $city= $link -> real_escape_string($_POST["city"]);
            $username= $link -> real_escape_string($_POST["username"]);
             $address= $link -> real_escape_string($_POST["address"]);
              $contact= $link -> real_escape_string($_POST["contact"]);
               $email= $link -> real_escape_string($_POST["email"]);
                $gender= $link -> real_escape_string($_POST["gender"]);
                 $pass= $link -> real_escape_string($_POST["password"]);
                 $bio= $link -> real_escape_string($_POST["bio"]);
                 $des= $link -> real_escape_string($_POST["des"]);
                 $dob= $link -> real_escape_string($_POST["dob"]);
                 
                
                $dob = date('Y-m-d', strtotime($dob));

                  
                  if(isset($_FILES["a7"]) && $_FILES["a7"]["size"]>0)
            {
                $fname=time().$_FILES["a7"]["name"];
                move_uploaded_file($_FILES["a7"]["tmp_name"],"upload/user/$fname");
              $dp=$fname;
            }
                 
              $salt = substr(md5(rand()),0,9); 
              $npass= hash('sha256',$salt.$pass);
	
              $qry="insert into user_tb (u_name,u_des,u_city,dob,u_address,u_contact,u_email,u_gender,u_image,c_id,u_password,hash,u_otp,u_status,u_type,u_connects,user_bio,onfeed) values ('$username','$des','$city','$dob','$address','$contact','$email','$gender','$fname','0','$npass','$salt','1234','Active','normal','10','$bio','y')";
              mysqli_query($link, $qry);
              
              echo "<script> window.location.replace('index.php?file=signin&login='); </script>";
            
	 }						
	  ?>
  </div>
</div>