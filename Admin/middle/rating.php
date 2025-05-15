<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Rating</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>User Name</th>        
 		<th>Service Provider Name</th>
		<th>Rating</th>
		<th>Message</th>
		<th>Date</th>
		<th>Status</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from rating_tb,user_tb,serviceprovider_tb where rating_tb.u_id = user_tb.u_id and rating_tb.sp_id = serviceprovider_tb.sp_id";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
		<td class="center"><?php echo $v['u_name'];?></td>
		<td class="center"><?php echo $v['sp_name'];?></td>
        <td class="center"><?php echo $v['r_rating'];?></td>
		<td class="center"><?php echo $v['r_message'];?></td>
		<td class="center"><?php echo $v['r_date'];?></td>
	   	<td class="center">
		
		<a href="index.php?file=rating&rid=<?php echo $v['r_id'];?>&status=<?php echo $v['r_status'];?>"><span <?php if($v['r_status']=="Active") { ?>class="label-success label label-default" <?php } else { ?>class="label-default label label-danger"<?php } ?> > <?php echo $v['r_status'];?> </span> </a> 
		
		</td>

     	
		<td class="center">
            
            <a class="btn btn-danger" href="index.php?file=rating&del=<?php echo $v['r_id'];?>" onclick="return confirm('Are You Sure You Want To Delete..?');">
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
		   $up = "update rating_tb set r_status = 'Deactive' where r_id = '$_REQUEST[rid]'";
		}  
	    else if($_REQUEST['status']=="Deactive")
		{
		   $up = "update rating_tb set r_status = 'Active' where r_id = '$_REQUEST[rid]'";
		} 	
		if($con->query($up)==TRUE)
		{
		   header("location:index.php?file=rating");
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
   
   $dl = "delete from rating_tb where r_id = '$r'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=rating");
   }
}
?>	