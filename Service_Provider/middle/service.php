<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Service</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Service Name</label>
                         <input type="text" name="t1"   class="form-control" placeholder="Enter Serive Name" />					
                        </div>
						<div class="form-group">
                        <label for="exampleInputEmail1">Service Details</label>
						<textarea name="t2" class="form-control" placeholder="Enter Service Details" style="height:100px" ></textarea>
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Image 1</label>
				    <input type="file" name="t3" class="form-control"/>
				    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Image 2</label>
				    <input type="file" name="t4" class="form-control"/>
				    </div>
			     	<div class="form-group">
                        <label for="exampleInputEmail1">Image 3</label>
				    <input type="file" name="t5" class="form-control"/>
				    </div>
					

	         
	         <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
 

		<select class="form-control" name="t6">
		<option value="">--Select--</option>
		<option value="Active">Active</option>
		<option value="Deactive">Deactive</option>
		</select>
                         </div>
					
					
                   
                    <input type="submit" name="sub1" value="+Save Service"  class="btn btn-default" />
                </form>
               <?php
				if(isset($_REQUEST['sub1']))
				{
						$a = $_REQUEST['t1'];
						$b = $_REQUEST['t2'];
						
									
						date_default_timezone_set("Asia/Kolkata");
						$created_date = date('Y-m-d h:i:s');
						
						move_uploaded_file($_FILES['t3']['tmp_name'],"../upload/service/".$_FILES['t3']['name']);
						$c = $_FILES['t3']['name'];
						
						move_uploaded_file($_FILES['t4']['tmp_name'],"../upload/service/".$_FILES['t4']['name']);
						$d = $_FILES['t4']['name'];
						
						move_uploaded_file($_FILES['t5']['tmp_name'],"../upload/service/".$_FILES['t5']['name']);
						$e = $_FILES['t5']['name'];
						
						$f = $_REQUEST['t6'];			
						
	               $ins = "insert into service_tb(s_name,s_details,s_image1,s_image2,s_image3,sp_id,s_status,created_date,updated_date)value('$a','$b','$c','$d','$e','$_SESSION[sid]','$f','$created_date','$created_date')";
									
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=service");
					  }
				}
			   ?>
            </div>
        </div>
    </div>
    <!--/span-->

</div>
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Service Details</h2>

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
        <th>Service Name</th>        
        <th>Service Details</th>
		<th>Image 1</th>
		<th>Image 2</th>
		<th>Image 3</th>
		<th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from service_tb where sp_id = '$_SESSION[sid]'";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['s_name'];?></td>
        <td class="center"><?php echo $v['s_details'];?></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image1'];?>" height="50px" width="50px" /></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image2'];?>" height="50px" width="50px" /></td>
		<td class="center"><img src="../upload/service/<?php echo $v['s_image3'];?>" height="50px" width="50px" /></td>
		
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
            
            <a class="btn btn-info" href="index.php?file=service_edit&edt=<?php echo $v['s_id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
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