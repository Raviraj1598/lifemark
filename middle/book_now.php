<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Book Now</li>
     </ul>
   </div>
   <?php 
$sel = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and  serviceprovider_tb.sp_status = 'Active' and serviceprovider_tb.sp_id='$_REQUEST[sp_id]' ";
$r =  $con->query($sel);
foreach($r as $v);
?>	
   <div class="col-md-3 col_5">
   	 <img src="upload/shop/<?php echo  $v['shop_image'];?>" class="img-responsive" alt="" style="width:225px; height:188px"/>
						
     <ul class="menu">
		<li class="item1"><h3 class="m_2">Ratting</h3>
		  <ul class="cute">
		  <?php 
				$rating = "SELECT ROUND(avg(r_rating),0) as RATING FROM rating_tb,serviceprovider_tb where serviceprovider_tb.sp_id = rating_tb.sp_id and rating_tb.r_status = 'Active' and rating_tb.sp_id ='$_REQUEST[sp_id]'";
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

		  </ul>
		</li>
		
		<li class="item1"><h3 class="m_2">Service Provider Details</h3>
		  <ul class="cute">
			<li class="subitem1"><i class="fa fa-user"></i>  : <?php echo $v['sp_name'];?></li>
			<li class="subitem2"><i class="fa fa-map-marker"></i>  : <?php echo $v['sp_address'];?></li>
			<li class="subitem2"><i class="fa fa-phone"></i>  : <?php echo $v['sp_contact'];?></li>
			<li class="subitem2"><i class="fa fa-envelope"></i>  : <?php echo $v['sp_email'];?></li>
			
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Shop Details</h3>
		  <ul class="cute">
			<li class="subitem1"><i class="fa fa-home"></i>   : <?php echo $v['shop_name'];?></li>
			<li class="subitem1"><i class="fa fa-map-marker"></i>  : <?php echo $v['shop_address'];?></li>
			
		  </ul>
		</li>
	  </ul>
   </div>
   
   
   <div class="col-md-9 profile_left">
     <div class="col_4">
	       
		    <?php 
			$service = "select * from service_tb where sp_id = '$_REQUEST[sp_id]' and s_status = 'Active' ";
			$service_r  = $con->query($service);
			foreach($service_r as $service_v)
			{
			?>
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Service Details: <?php echo $service_v['s_name'];?></a></li>
				  </ul>
				   <div class="tab_box tab_box1">
                    <p style="text-align:justify"><?php echo $service_v['s_details'];?></p>
					<br/>
					</div>
	                <div class="clearfix"> </div>
	                <div class="jobs-item with-thumb">
	                   <div class="thumb_top">
				        <img src="upload/service/<?php echo $service_v['s_image1'];?>"  alt="" style="width:150px; height:100px"/>&nbsp;&nbsp; 
						<img src="upload/service/<?php echo $service_v['s_image2'];?>"  alt="" style="width:150px; height:100px"/> &nbsp;
						<img src="upload/service/<?php echo $service_v['s_image3'];?>" alt="" style="width:150px; height:100px"/>
						
					   </div>
					   <div class="thumb_bottom">
					   	  <div class="thumb"><a href="index.php?file=add&sp_id=<?php echo $_REQUEST['sp_id'];?>&s_id=<?php echo $service_v['s_id'];?>" class="photo_view">Book Now</a></div>
					   	   <div class="thumb_but"><a href="index.php?file=provider" class="photo_view">Back</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					  </div>
					  
					  
					  
				  </div>
				  <?php } ?>
				  
			 </div> 
		  </div>
	   </div>
   </div>
   <div class="clearfix"> </div>
  </div>
</div>