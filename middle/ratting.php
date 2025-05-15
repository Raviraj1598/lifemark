<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Ratting</li>
     </ul>
   </div>
   <form method="post">
   <div class="services">
   	  <div class="col-sm-6 login_left">
	   		 <div class="col-sm-6">
	     <div class="form-group">
		    <label for="edit-name">Massage<span class="form-required" title="This field is required.">*</span></label>
		    <textarea name="massage" placeholder="Enter Message" style="width:450px; height:130px" ></textarea>
			</div>
			  <div class="form-group">
		      <label for="edit-pass">Ratting <span class="form-required" title="This field is required.">*</span></label>
			  <select  class="m_1" name="ratting"  required="" style="width:450px;border: 1px solid #ddd; height:40px">
		      <option value="">--Select--</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>

		  </select>
		    </div>
			 <div class="form-actions">
		     <input type="submit" id="edit-submit" name="submit" value="Submit" class="btn_1 submit">
		     	
			 </div>
			 </form>   
		     <?php 
			 if(isset($_REQUEST['submit']))
			 {
			      $a = $_REQUEST['massage'];
				  $b = $_REQUEST['ratting'];
				  $u_id = $_SESSION['uid'];
				  $sp_id = $_REQUEST['sp_id'];
				  date_default_timezone_set("Asia/Kolkata");
	              $r_date = date('Y-m-d h:i:s');
				  $r_status = 'Active'; 
				   
				  $ins = "insert into rating_tb(u_id,sp_id,r_rating,r_message,r_date,r_status)values('$u_id','$sp_id','$b','$a','$r_date','$r_status')";
                  
				  if($con->query($ins)==TRUE)
				  {
				    echo ("<script LANGUAGE='JavaScript'>window.alert('Your Ratting Successfully Apply');window.location.href='index.php?file=provider';</script>");
		
				  }
         				   
			 }
			 ?>     
	  </div>
	  </div>
	 
	    <div class="col-sm-6">
	    <div class="form-group">
              <label for="exampleInputEmail1"><font color="#FF0000" size="7px">Ratting</font></label>
			  </br></br>
			  <img src="images/r4.jpg" width="400px"/>				
			 </div> 
		</div>
	   <div class="clearfix"> </div>
	  
   </div>
  </div>
</div>