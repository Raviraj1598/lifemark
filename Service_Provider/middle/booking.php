<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Booking</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="font-size:14px">
    <thead>
    <tr>
        <th>ID</th>        
		<th>User Name</th>
		<th>Service Name</th>
		<th>Category</th>
		<th>Budget</th>
		<th>User Date</th>
		<th>Status</th>
		<th>Booking Date</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from booking_tb,serviceprovider_tb,user_tb,service_tb,category_tb where booking_tb.sp_id = serviceprovider_tb.sp_id and booking_tb.u_id = user_tb.u_id and booking_tb.s_id = service_tb.s_id and booking_tb.cat_id = category_tb.cat_id and booking_tb.sp_id = '$_SESSION[sid]'";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['u_name'];?></td>
		<td class="center"><?php echo $v['s_name'];?></td>
		<td class="center"><?php echo $v['cat_name'];?></td>
		<td class="center"><?php echo $v['u_budget'];?></td>
		<td class="center"><?php echo $v['u_date'];?></td>
	   	<td class="center">
		
		<a href="index.php?file=booking&bid=<?php echo $v['b_id'];?>&status=<?php echo $v['b_status'];?>"><span <?php if($v['b_status']=="Active") { ?>class="label-success label label-default" <?php } else { ?>class="label-default label label-danger"<?php } ?> > <?php echo $v['b_status'];?> </span> </a> 
		
		</td>
		<td class="center"><?php echo $v['b_date'];?></td>
        <td class="center">    
            <a class="btn btn-danger" href="index.php?file=booking&del=<?php echo $v['b_id'];?>" onclick="return confirm('Are You Sure You Want To Delete..?');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>

    </tr>
   <?php } ?>
    </tbody>
    </table>
		<?php 
	if(isset($_REQUEST['status']))
	{
	    if($_REQUEST['status']=="Active")
		{
		   $up = "update booking_tb set b_status = 'Deactive' where b_id = '$_REQUEST[bid]'";
		}  
	    else if($_REQUEST['status']=="Deactive")
		{
		   $up = "update booking_tb set b_status = 'Active' where b_id = '$_REQUEST[bid]'";
		} 	
		if($con->query($up)==TRUE)
		{
		   header("location:index.php?file=booking");
		}
	}	
	?>
	
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
	<?php 
if(isset($_REQUEST['del']))
{
   $r = $_REQUEST['del'];
   
   $dl = "delete from booking_tb where b_id = '$r'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=booking");
   }
}
?>	