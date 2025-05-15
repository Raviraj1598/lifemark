<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View User Details</h2>

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
		<th>Gender</th>
		<th>Image</th>
		<th>City</th>
		<th>Password</th>
		<th>Status</th>
		<th>Created Date</th>
		<th>Updated Date</th>
    </tr>
    </thead>
   
<?php
	$sel = "select * from user_tb,city_tb where user_tb.c_id = city_tb.c_id";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{
?>		
	<tr>
        <td><?php echo $j++; ?></td>
        <td class="center"><?php echo $v['u_name'];?></td>
        <td class="center"><?php echo $v['u_address'];?></td>
        <td class="center"><?php echo $v['u_contact'];?></td>
        <td class="center"><?php echo $v['u_email'];?></td>
		<td class="center"><?php echo $v['u_gender'];?></td>
		<td class="center"><img src="../upload/user/<?php echo $v['u_image'];?>" height="50px" width="50px" /></td>
		<td class="center"><?php echo $v['c_name'];?></td>
		<td class="center"><?php echo $v['u_password'];?></td>
		<td class="center">
		 <?php
		 if($v['u_status']=="Active")
		 { 
		 ?>
		 <span class="label-success label label-default"><?php echo $v['u_status'];?></span>
		 <?php } else { ?>
		 <span class="label-default label label-danger"><?php echo $v['u_status'];?></span>
		 <?php } ?>
		 </td>
		<td class="center"><?php echo $v['created_date'];?></td>
		<td class="center"><?php echo $v['updated_date'];?></td>      
	</tr>
    <?php } ?>
    
    </table>

    </div>
    </div>
    </div>
    <!--/span-->

    </div>