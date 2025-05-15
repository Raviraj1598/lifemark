<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Services</li>
     </ul>
   </div>
   <div class="services">
   	<div class="page_header">
   	 <h1>Services</h1>
   	 
    </div>
    <div class="services_top">
    	<?php
		$sel = "select * from services_tb where s_status = 'Active'";
		$r = $con->query($sel);
		foreach($r as $v)
		{
		?>
		<div class="col-sm-4 item_content" style="padding-bottom:100px;">
    		<img src="upload/services/<?php echo $v['s_image']; ?>"  style="width:280px; height:150px" /><br/><br/>	
    		<h4 style="text-align:center"><?php echo $v['s_title']; ?></h4>
    		<p style="text-align:justify"><?php echo $v['s_desc']; ?></p>
    	</div>
    	<?php } ?>
		<br/>
    	<div class="clearfix"> </div>
    </div>	
    	
		
		
   </div>
  </div>
</div>