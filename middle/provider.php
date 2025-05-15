<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
      <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Service Provider Profile</li>
      </ul>
   </div>
  <div class="col-md-9 profile_left1">
  	<div class="profile_search1">
	   <form method="post">
		  <select  class="m_1" name="category"  required="" style="width:400px;border: 1px solid #ddd; height:35px">
		  <option value="">--Select--</option>
		  <?php 
		  $cat = "select * from category_tb where cat_status = 'Active'";
		  $cat_r = $con->query($cat);
		  foreach($cat_r as $cat_v)
		  {
		  ?>
		  <option value="<?php echo $cat_v['cat_id'];?>"><?php echo $cat_v['cat_name'];?></option>
		  <?php } ?>
		  </select>
		  <input type="submit" value="Go" name="search" />
	   </form>
   </div>
    
	<?php 
	if(isset($_REQUEST['search']))
	{
	 $sel = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and serviceprovider_tb.sp_status = 'Active' and serviceprovider_tb.cat_id = '$_REQUEST[category]'";
	}
	else
	{
	  $sel = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and  serviceprovider_tb.sp_status = 'Active'";
	}
	  $r = $con->query($sel);
	  
	  if(mysqli_num_rows($r)==0)
	  {
	    echo ("<script LANGUAGE='JavaScript'>
			  window.alert('Service Provider Not Found..!');
			  window.location.href='index.php?file=provider';</script>");
	  }
	  else
	  {
	 foreach($r as $v)
	 {
	?>
	<div class="profile_top">
	
      <h2>Profile ID : #<?php echo  $v['sp_id'];?> | <?php echo  $v['cat_name'];?></h2>
	  
	    <div class="col-sm-3 profile_left-top">
	    	<img src="upload/shop/<?php echo $v['shop_image'];?>" class="img-responsive" alt="" style="width:195px; height:167px"/>
	    </div>
	    <!--<div class="col-sm-3">
	      <ul class="login_details1">
			 <li>Last Login : 5 days ago</li>
			 <li><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor." More....</p></li>
		  </ul>
	    </div>-->
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1" style="color:#c32143; font-size:20px"><strong>Service Provider Details</strong></td>
						
					</tr>
					
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-user"></i>  : <?php echo $v['sp_name'];?></td>
						
					</tr>
				    
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-map-marker"></i>  : <?php echo $v['sp_address'];?></td>
						
					</tr>
				    
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-phone"></i>  : <?php echo $v['sp_contact'];?></td>
						
					</tr>
				    
				    
				    <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-envelope"></i>  : <?php echo $v['sp_email'];?></td>
						
					</tr>
					
					
				   <tr class="opened_1">
						<td class="day_label1" style="color:#c32143; font-size:20px"><strong>Shop Details</strong></td>
						
					</tr>
				   
				   <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-home"></i>   : <?php echo $v['shop_name'];?></td>
						
					</tr>
					
				    <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-map-marker"></i>  : <?php echo $v['shop_address'];?></td>
						
					</tr>
					
			    </tbody>
		   </table>
		    <?php 
			   if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
               {
			   ?>
		    <a href="index.php?file=signin">
		   <div class="buttons">
			   <div class="vertical">Ratting</div>
			   <div class="vertical">More Details</div>
			   <div class="vertical">Book Now</div>
		   </div>
		   </a>
		   <?php } else { ?>
		   <div class="buttons">
			  <a href="index.php?file=ratting&sp_id=<?php echo  $v['sp_id'];?>"><div class="vertical">Ratting</div></a>
			  <a href="index.php?file=details&sp_id=<?php echo  $v['sp_id'];?>"><div class="vertical">More Details</div></a>
			  <a href="index.php?file=book_now&sp_id=<?php echo  $v['sp_id'];?>"><div class="vertical">Book Now</div></a>
		   </div>
		   <?php } ?>
	    </div>
	    <div class="clearfix"> </div>
    </div>
    
	<?php } } ?>
    
    
    
</div>
<div class="col-md-3 match_right">
	
   <div class="view_profile view_profile2">
        	<h3>Recent Join Service Provider</h3>
        	
			<?php 
			
			$last = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and  serviceprovider_tb.sp_status = 'Active' order by sp_id desc limit 6";
			
			$last_r = $con->query($last);
			foreach($last_r as $last_v)
			{
			?>
			<ul class="profile_item">
        	  <a href="index.php?file=profile&id=<?php echo $last_v['sp_id'];?>">
        	   <li class="profile_item-img">
        	   	  <img src="upload/shop/<?php echo $last_v['shop_image'];?>" class="img-responsive" alt="" style="width:105px; height:88px"/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>Profile ID : #<?php echo  $last_v['sp_id'];?></h4>
        	   	  <p>Category : <strong><?php echo  $last_v['cat_name'];?></strong></p>
        	   	  <a href="index.php?file=profile&id=<?php echo $last_v['sp_id'];?>"><h5>View Full Profile</h5></li></a>
        	   
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <?php } ?>
           
           
       </div>
     </div>
     <div class="clearfix"> </div>
  </div>
</div>