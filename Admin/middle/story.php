<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Success Story</h2>

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
                        <label for="exampleInputEmail1">story Title</label>
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
                        <label for="exampleInputEmail1">Date</label>
                         <input type="date" name="t5" class="form-control" /> 					
                        </div>
	        
			<div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                       <select class="form-control" name="t4">
	        <option value="">--Select--</option>
	       <option value="Active">Active</option>
	       <option value="Deactive">Deactive</option>
	</select>
                 </div>
					
                <input type="submit" name="sub1" value="+Save Story"  class="btn btn-default" />
                </form>
               <?php
               if(isset($_REQUEST['sub1']))
	           {
	           $a = $_REQUEST['t1'];
	           $b = $_REQUEST['t2'];
				
			   $c = $_REQUEST['t5'];    
	 
	           //image code
	           move_uploaded_file($_FILES['t3']['tmp_name'],"../upload/story/".$_FILES['t3']['name']);
               $d=$_FILES['t3']['name'];
	  
	           $e = $_REQUEST['t4'];
	  				
               $ins = "insert into story_tb(st_title,st_desc,st_date,st_image,st_status)value('$a','$b','$c','$d','$e')";
	               if($con->query($ins)==TRUE)
                   {
	                header("location:index.php?file=story");
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
        <h2><i class="glyphicon glyphicon-user"></i> View Success Story</h2>

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
		<th>Date</th>       
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from story_tb";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['st_title'];?></td>
        
        <td class="center"><?php echo $v['st_desc'];?></td>
         
		 <td class="center"><img src="../upload/story/<?php echo $v['st_image'];?>" height="50px" width="50px" /></td>
         <td class="center"><?php echo $v['st_date'];?></td>
		 <td class="center">
        <span <?php if($v['st_status']=="Active") { ?>class="label-success label label-default" <?php } else {?>class="label-default label label-danger"<?php } ?>><?php echo $v['st_status'];?></span>
           </td>
           <td class="center">
            
            <a class="btn btn-info" href="index.php?file=story_edit&edt=<?php echo $v['st_id'];?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
              Edit
            </a>
            <a class="btn btn-danger" href="index.php?file=story&del=<?php echo $v['st_id'];?>" onclick="return confirm('Are You Sure want to delete..?');">
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
   
   $dl = "delete from story_tb where st_id = '$c'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=story");
   }
}
?>