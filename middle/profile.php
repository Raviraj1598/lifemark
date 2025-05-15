<?php
if(!isset($_REQUEST['id']))
{
   header("location:index.php?file=home");
}
$sel = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and  serviceprovider_tb.sp_status = 'Active' and serviceprovider_tb.sp_id='$_REQUEST[id]'";

$pr = $con->query($sel);
foreach($pr as $pv);
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2>Profile Id : #<?php echo  $pv['sp_id'];?> | <?php echo  $pv['cat_name'];?></h2>
   	 	<div class="col_3">
   	        <div class="col-sm-4 row_2">
			  <div class="flexslider">
					 <ul class="slides">
						<li data-thumb="images/p1.jpg">
							<img src="upload/shop/<?php echo $pv['shop_image'];?>" class="img-responsive" alt="" style="width:225px; height:188px"/>
						</li>
						
				      	  
 					 </ul>
					 
				   </div>
				<br/>
				<?php 
				$rating = "SELECT ROUND(avg(r_rating),0) as RATING FROM rating_tb,serviceprovider_tb where serviceprovider_tb.sp_id = rating_tb.sp_id and rating_tb.r_status = 'Active' and rating_tb.sp_id ='$_REQUEST[id]'";
				$rating_r = $con->query($rating);
				foreach($rating_r as $rating_v);
				if($rating_v['RATING']==NULL)
				{
				?>
				<img src="images/r0.jpg" class="img-responsive" alt="" style="width:225px; height:50px"/> 
				<?php 
				}
				else
				{
				
				?>
				<img src="images/r<?php echo  $rating_v['RATING'];?>.jpg" class="img-responsive" alt="" style="width:225px; height:50px"/> 
				<?php } ?>
			</div>
			
			<div class="col-sm-8 row_1">
				<table class="table_working_hours">
		        	<tbody>
		        		<tr class="opened_1">
						<td class="day_label1" style="color:#c32143; font-size:20px"><strong>Service Provider Details</strong></td>
						
					</tr>
					
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-user"></i>  : <?php echo $pv['sp_name'];?></td>
						
					</tr>
				    
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-map-marker"></i>  : <?php echo $pv['sp_address'];?></td>
						
					</tr>
				    
					<tr class="opened_1">
						<td class="day_label1"><i class="fa fa-phone"></i>  : <?php echo $pv['sp_contact'];?></td>
						
					</tr>
				    
				    
				    <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-envelope"></i>  : <?php echo $pv['sp_email'];?></td>
						
					</tr>
					
					
				   <tr class="opened_1">
						<td class="day_label1" style="color:#c32143; font-size:20px"><strong>Shop Details</strong></td>
						
					</tr>
				   
				   <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-home"></i>   : <?php echo $pv['shop_name'];?></td>
						
					</tr>
					
				    <tr class="opened_1">
						<td class="day_label1"><i class="fa fa-map-marker"></i>  : <?php echo $pv['shop_address'];?></td>
						
					</tr>
				    </tbody>
				</table>
				 <?php 
			   if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
               {
			   ?>
				<ul class="login_details">
			      <li>Already a member? <a href="index.php?file=signin">Login Now</a></li>
			      <li>If not a member? <a href="index.php?file=usersignup">Register Now</a></li>
			    </ul>
				<?php 
				}
				else
				{
				?>
				 <div class="buttons">
			   <a href="index.php?file=ratting&sp_id=<?php echo  $pv['sp_id'];?>"><div class="vertical">Ratting</div></a>
			   <a href="index.php?file=details&sp_id=<?php echo  $pv['sp_id'];?>"><div class="vertical">More Details</div></a>
			   <a href="index.php?file=book_now&sp_id=<?php echo $pv['sp_id'];?>"><div class="vertical">Book Now</div></a>
		    </div>
				<?php } ?>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col_4">
		    <div class="bs-example bs-ex	ample-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Service Details</a></li>
				 
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    
				    <div class="basic_1">
				    	<div class="">
				    	  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
						<thead>
						<tr style="background-color:#c32143; color:#FFFFFF; text-align:center">
							<th>Service Name</th>        
							<th>Service Details</th>
							<th>Image 1</th>
							<th>Image 2</th>
							<th>Image 3</th>
						</tr>
						</thead>
						<tbody>
					<?php
					$ser = "select * from service_tb where sp_id = '$_REQUEST[id]'";
					$result = $con->query($ser);
					foreach($result as $v)
					{ 
					?>
					<tr>
					<td class="center"><?php echo $v['s_name'];?></td>
					<td class="center"><?php echo $v['s_details'];?></td>
					<td class="center"><img src="upload/service/<?php echo $v['s_image1'];?>" height="50px" width="50px" /></td>
					<td class="center"><img src="upload/service/<?php echo $v['s_image2'];?>" height="50px" width="50px" /></td>
					<td class="center"><img src="upload/service/<?php echo $v['s_image3'];?>" height="50px" width="50px" /></td>
                    </tr>
                     <?php } ?>
					</tbody>
					</table>
					</div>
				         
				        <div class="clearfix"> </div>
				    </div>
				    
				    
				  </div>
				  
				 
		     </div>
		  </div>
	   </div>
   	 </div>
     <div class="col-md-4 profile_right">
     	
        <div class="view_profile">
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
</div>