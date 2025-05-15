<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Services</h2>

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
                        <label for="exampleInputEmail1">Services Title</label>
                         <input type="text" name="t1"  class="form-control" placeholder="Enter Title" /> 					
                        </div>
	         <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                         <textarea name="t2" class="form-control" placeholder="Enter Services Description" style="height:                         100px"></textarea> 					
                        </div>  
	        <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                         <input type="file" name="t3" class="form-control" /> 					
                        </div>
	        
			<div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                       <select class="form-control" name="t4">
	        <option value="">--Select--</option>
	       <option value="Active">Active</option>
	       <option value="Deactive">Deactive</option>
	</select>
                 </div>
					
                <input type="submit" name="sub1" value="+Save Services"  class="btn btn-default" />
                </form>
               <?php
               if(isset($_REQUEST['sub1']))
	{
	    $a = $_REQUEST['t1'];
	    $b = $_REQUEST['t2'];
				    
	    date_default_timezone_set("Asia/Kolkata");
	    $s_created = date('Y-m-d h:i:s');
	 
	  //image code
	  move_uploaded_file($_FILES['t3']['tmp_name'],"../upload/services/".$_FILES['t3']['name']);
                 $c=$_FILES['t3']['name'];
	  
	  $d = $_REQUEST['t4'];
	  				
               $ins = "insert into services_tb(s_title,s_desc,s_image,s_status,created_date,updated_date)value('$a','$b','$c','$d','$s_created','$s_created')";
	    if($con->query($ins)==TRUE)
                   {
	      header("location:index.php?file=services");
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
        <h2><i class="glyphicon glyphicon-user"></i> View Services Details</h2>

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
        <th>Title</th> 
        <th>Description</th>
        <th>Image</th>         
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from services_tb";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['s_title'];?></td>
        
        <td class="center"><?php echo $v['s_desc'];?></td>
         <td class="center"><img src="../upload/services/<?php echo $v['s_image'];?>" height="50px" width="50px" /></td>
         <td class="center">
        <span <?php if($v['s_status']=="Active") { ?>class="label-success label label-default" <?php } else {?>class="label-default label label-danger"<?php } ?>><?php echo $v['s_status'];?></span>
           </td>
           <td class="center"><?php echo $v['created_date'];?></td>
           <td class="center"><?php echo $v['updated_date'];?></td>
           <td class="center">
            
            <a class="btn btn-info" href="index.php?file=services_edit&edt=<?php echo $v['s_id'];?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
              Edit
            </a>
            <a class="btn btn-danger" href="index.php?file=services&del=<?php echo $v['s_id'];?>" onclick="return confirm('Are You Sure want to delete..?');">
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
   
   $dl = "delete from services_tb where s_id = '$c'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=services");
   }
}
?>	