<?php 
$sel= "select * from about_tb";
$r = $con->query($sel);
$a = array();
foreach($r as $v)
{
  $a[] = $v['message'];
}
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">About Us</li>
     </ul>
   </div>
   <div class="about">
   	  <div class="col-md-6 about_left">
   	  	<img src="images/57.jpg" class="img-responsive" alt=""/>
   	  </div>
   	  <div class="col-md-6 about_right">
   	  	<h1>About us</h1>
   	  	
   	  	<div class="accordation">
		   <div class="jb-accordion-wrapper">
				<div class="jb-accordion-title"><?php echo $a[0];?><button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion-1-"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion-1-" class="jb-accordion-content collapse in" style="height: auto;">
				<p style="text-align:justify"><?php echo $a[1];?></p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title"><?php echo $a[2];?><button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion2-"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion2-" class="jb-accordion-content collapse ">
				<p style="text-align:justify"><?php echo $a[3];?></p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title"><?php echo $a[4];?><button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion3"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion3" class="jb-accordion-content collapse ">
				<p style="text-align:justify"><?php echo $a[5];?></p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
		</div>
   	  </div>
   	  <div class="clearfix"> </div>
   </div>
  </div>
</div>




<div class="about_bottom">
	<div class="container">
		<h3>Team</h3>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="images/vg.jpeg" height="100px" width="200px" class="img-responsive" alt=""/></a>
					
			    </figure>
			    <div class="desc">
					<a href="#"><img src="images/arc.jpeg" height="300px" width="300px" class="img-responsive" alt=""/></a>
			    	<h4><a href="#">Chauhan Raviraj .C.</a></h4>
			    	<p></p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="blank" height="200px" width="100px" class="img-responsive" alt=""/></a>

			    </figure>
			    <div class="desc">
			    	<h4><a href="#"></a></h4>
			    	<p></p>
			    </div>
			 </li>
	       </ul>
	   </div>

	   
	   
	   
	   
	   <div class="clearfix"> </div>
	</div>
</div>