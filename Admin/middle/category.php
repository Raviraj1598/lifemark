<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Category</h2>

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
                <form role="form" method="post">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                         <input type="text" name="a1"   class="form-control" placeholder="Enter Name" />					
                        </div>
	         
	         <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
 

		<select class="form-control" name="a2">
		<option value="">--Select--</option>
		<option value="Active">Active</option>
		<option value="Deactive">Deactive</option>
		</select>
                         </div>
					
					
                   
                    <input type="submit" name="sub2" value="+Save Category"  class="btn btn-default" />
                </form>
               <?php
				if(isset($_REQUEST['sub2']))
				{
						$a = $_REQUEST['a1'];
						$b = $_REQUEST['a2'];
						 
									
						date_default_timezone_set("Asia/Kolkata");
						$cat_created = date('Y-m-d h:i:s');
									
						$ins = "insert into category_tb(cat_name,cat_status,cat_created,cat_updated)value('$a','$b','$cat_created','$cat_created')";
									
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=category");
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
        <h2><i class="glyphicon glyphicon-user"></i> View Category Details</h2>

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
        <th>Name</th>        
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from category_tb";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['cat_name'];?></td>
         <td class="center">
		 <?php
		 if($v['cat_status']=="Active")
		 { 
		 ?>
		 <span class="label-success label label-default"><?php echo $v['cat_status'];?></span>
		 <?php } else { ?>
		 <span class="label-default label label-danger"><?php echo $v['cat_status'];?></span>
		 <?php } ?>
		 </td>
          <td class="center"><?php echo $v['cat_created'];?></td>
           <td class="center"><?php echo $v['cat_updated'];?></td>
        <td class="center">
            
            <a class="btn btn-info" href="index.php?file=category_edit&edt=<?php echo $v['cat_id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="index.php?file=category&del=<?php echo $v['cat_id'];?>" onclick="return confirm('Are You Sure You Want TO Delete..?');">
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
   $c = $_REQUEST['del'];
   
   $dl = "delete from category_tb where cat_id = '$c'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=category");
   }
}
?>	