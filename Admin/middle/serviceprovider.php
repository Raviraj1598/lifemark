<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Service Provider Details</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="font-size:9px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>        
        <th>Address</th>
        <th>Contact</th>
        <th>E-Mail</th>
		<th>Shop Name</th>
		<th>Shop Address</th>
		<th>Shop Image</th>
		<th>Category</th>
		<th>Password</th>
		<th>Status</th>
		<th>Created Date</th>
		<th>Updated Date</th>
		<th>Action</th>
    </tr>
    </thead>
   
    <?php
	$sel = "select * from serviceprovider_tb,category_tb where serviceprovider_tb.cat_id = category_tb.cat_id";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{
    ?>		
	<tr>
        <td><?php echo $j++; ?></td>
        <td class="center"><?php echo $v['sp_name'];?></td>
        <td class="center"><?php echo $v['sp_address'];?></td>
        <td class="center"><?php echo $v['sp_contact'];?></td>
        <td class="center"><?php echo $v['sp_email'];?></td>
		<td class="center"><?php echo $v['shop_name'];?></td>
		<td class="center"><?php echo $v['shop_address'];?></td>
		<td class="center"><img src="../upload/shop/<?php echo $v['shop_image'];?>" height="50px" width="50px" /></td>
		<td class="center"><?php echo $v['cat_name'];?></td>
		<td class="center"><?php echo $v['sp_password'];?></td>
		<td class="center">
		
		<a href="index.php?file=serviceprovider&spid=<?php echo $v['sp_id'];?>&status=<?php echo $v['sp_status'];?>"><span <?php if($v['sp_status']=="Active") { ?>class="label-success label label-default" <?php } else { ?>class="label-default label label-danger"<?php } ?> > <?php echo $v['sp_status'];?> </span> </a> 
		</td>
		<td class="center"><?php echo $v['created_date'];?></td>
		<td class="center"><?php echo $v['updated_date'];?></td>
        <td class="center">
		<a class="btn btn-danger" href="index.php?file=serviceprovider&del=<?php echo $v['sp_id'];?>" onclick="return confirm('Are You Sure You Want to Delete..?');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>      
	</tr>
    <?php } ?>
    
    </table>
	<?php 
	if(isset($_REQUEST['status']))
	{
	    if($_REQUEST['status']=="Active")
		{
		   $up = "update serviceprovider_tb set sp_status = 'Deactive' where sp_id = '$_REQUEST[spid]'";
		}  
	    else if($_REQUEST['status']=="Deactive")
		{
		   $up = "update serviceprovider_tb set sp_status = 'Active' where sp_id = '$_REQUEST[spid]'";
		} 	
		if($con->query($up)==TRUE)
		{
		   header("location:index.php?file=serviceprovider");
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
         $b = $_REQUEST['del'];
         $dl = "delete from serviceprovider_tb where sp_id = '$b'";
         if($con->query($dl)==TRUE)
        {
             header("location:index.php?file=serviceprovider");
        }
    }
?>