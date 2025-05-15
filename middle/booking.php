<?php 
if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
{
  header("location:index.php?file=signin");
}

?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">My Booking</li>
     </ul>
   </div>
   
   <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="font-size:14px">
    <thead>
    <tr>
        <th>ID</th>        
		<th>Category</th>
		<th>Service Name</th>
		<th>Serviceprovider</th>
		<th>Serviceprovider Contact</th>
		<th>Budget</th>
		<th>User Date</th>
		<th>Status</th>
		<th>Booking Date</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from booking_tb,serviceprovider_tb,user_tb,service_tb,category_tb where booking_tb.sp_id = serviceprovider_tb.sp_id and booking_tb.u_id = user_tb.u_id and booking_tb.s_id = service_tb.s_id and booking_tb.cat_id = category_tb.cat_id and booking_tb.u_id = '$_SESSION[uid]' and booking_tb.b_status='Deactive'";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['cat_name'];?></td>
		<td class="center"><?php echo $v['s_name'];?></td>
		<td class="center"><?php echo $v['sp_name'];?></td>
		<td class="center"><?php echo $v['sp_contact'];?></td>
		<td class="center"><?php echo $v['u_budget'];?></td>
		<td class="center"><?php echo $v['u_date'];?></td>
	   	<td class="center">
		<span <?php if($v['b_status']=="Active") { ?>class="label-success label label-default" <?php } else { ?>class="label-default label label-danger"<?php } ?> > <?php echo $v['b_status'];?> </span> 
		
		</td>
		<td class="center"><?php echo $v['b_date'];?></td>
        
    </tr>
   <?php } ?>
    </tbody>
    </table>
</div>
</div>   