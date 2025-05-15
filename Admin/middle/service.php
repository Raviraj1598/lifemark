<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Service-Provider services</h2>

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
        <th>Service Provider</th>        
 		<th>Image 1</th>
		<th>Image 2</th>
		<th>Image 3</th>
		<th>Service</th>
		<th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select S.*,SP.sp_id,SP.sp_name from service_tb S,serviceprovider_tb SP where S.sp_id = SP.sp_id";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
		<td class="center"><?php echo $v['sp_name'];?></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image1'];?>" height="50px" width="50px" /></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image2'];?>" height="50px" width="50px" /></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image3'];?>" height="50px" width="50px" /></td>
		<td class="center"><?php echo $v['s_name'];?></td>
		<td class="center">
		 <?php
		 if($v['s_status']=="Active")
		 { 
		 ?>
		 <span class="label-success label label-default"><?php echo $v['s_status'];?></span>
		 <?php } else { ?>
		 <span class="label-default label label-danger"><?php echo $v['s_status'];?></span>
		 <?php } ?>
		 </td>
          <td class="center"><?php echo $v['created_date'];?></td>
           <td class="center"><?php echo $v['updated_date'];?></td>
        <td class="center">
            
            <a class="btn btn-danger" href="index.php?file=service&del=<?php echo $v['s_id'];?>" onclick="return confirm('Are You Sure You Want To Delete..?');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
   <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
<?php 
if(isset($_REQUEST['del']))
{
   $r = $_REQUEST['del'];
   
   $dl = "delete from service_tb where s_id = '$r'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=service");
   }
}
?>	