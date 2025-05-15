<div class="grid_1">
      <div class="container">
      	<h1>Recently Join</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
			
        <ul id="flexiselDemo3">
	      <?php
		$last = "select * from serviceprovider_tb,category_tb where  serviceprovider_tb.cat_id=category_tb.cat_id and  serviceprovider_tb.sp_status = 'Active' order by sp_id desc limit 6";
			$last_r = $con->query($last);
			foreach($last_r as $last_v)
		    {
		?>
		  <li><div class="col_1"><a href="index.php?file=profile&id=<?php echo $last_v['sp_id']; ?>">
			<img src="upload/shop/<?php echo $last_v['shop_image'];?>" alt="" class="hover-animation image-zoom-in img-responsive" style="width:171px; height:142px"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle"><?php echo  $last_v['sp_name'];?></div>
             </div>
             <h3><span class="m_3"><i class="fa fa-home"></i> <?php echo  $last_v['shop_name'];?></span><br/><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo  $last_v['shop_address'];?><br/><span class="m_3"><i class="fa fa-list-alt" ></i>&nbsp;&nbsp;<?php echo  $last_v['cat_name'];?></span></h3></a></div>
          </li>  
	    <?php } ?>
		</ul>
		
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay:false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    
	</div>
</div>




<div class="grid_2">
	<div class="container">
		<h2>Success Stories</h2>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <div class="row_1">
	     <div class="col-md-8 suceess_story">
	         <ul> 
			
	            
	            
	            <?php
				$sel ="select * from story_tb where st_status = 'Active'";
				$r = $con->query($sel);
				foreach($r as $v)
				{
				?>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1"><?php echo $v['st_date']; ?></span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="upload/story/<?php echo $v['st_image']; ?>" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#"><?php echo $v['st_title']; ?></a></h4>				        	
				        	<p><?php echo $v['st_desc']; ?></p>
				        </div>
				    </div>
				</li>
	         <?php } ?>
		      	
			</ul>
	    </div>
	    <div class="col-md-4 row_1-right">
	      <h3>Our Partner</h3>
	        <div class="box_1">
		      <figure class="thumbnail1"><a href="https//www.baou.edu.in/" target="_blank"><img src="images/baou_logo_new.png" style="blank" class="img-responsive" alt=""/></a></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					
					
				</div>
				<h4 class="post-title"><a href="https://www.gtu.ac.in/" target="_blank">DR.BABASAHEB AMBEDKAR OPEN UNIVERSITY,AHEMDABAD.</a></h4>
				<div class="clearfix"> </div>
				
			  </div>
	        </div><br/><br/>
	        <div class="box_1">
		      <figure class="thumbnail1"><a href="http://atulpolytechnic.com/" target="_blank"><img src="blank" style="width:100px; height:70px" class="img-responsive" alt=""/></a></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					
				</div>
				<h4 class="post-title"></a></h4>
				<div class="clearfix"> </div>
   			  </div>
	        </div><br/><br/>
	        <div class="box_2">
<figure class="thumbnail1"><a href="http://invisionsoftwaresolution.in/" target="_blank"><img src="black" style="width:100px; height:70px" class="img-responsive" alt=""/></a></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					
					
				</div>
				<h4 class="post-title"><a href="http://invisionsoftwaresolution.in/" target="_blank"></a></h4>
				<div class="clearfix"> </div>
				
				
			  </div>
	        </div>
	        
	        
	        
	        
	     </div>
	     <div class="clearfix"> </div>
	   </div> 
	  </div>
    </div>