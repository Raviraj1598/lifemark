<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> About Us</h2>

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
                        <label for="exampleInputEmail1">Message</label>
						<textarea name="t1" class="form-control" placeholder="Enter Message" style="height:100px" ></textarea>

                    </div>
					
					
                   
                    <input type="submit" name="sub1" value="+Save Message"  class="btn btn-default" />
                </form>
               <?php
			    if(isset($_REQUEST['sub1']))
				{
				    $a = $_REQUEST['t1'];
					
					$ins = "insert into about_tb(message)value('$a')";
					
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=about");
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
        <h2><i class="glyphicon glyphicon-user"></i> View About Us Details</h2>

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
        <th>Message</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel = "select * from about_tb";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{ 
	?>
    <tr>
        <td><?php echo $j++;?></td>
        <td class="center"><?php echo $v['message'];?></td>
        <td class="center">
            
            <a class="btn btn-info" href="index.php?file=about_edit&edt=<?php echo $v['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="index.php?file=about&del=<?php echo $v['id'];?>" onclick="return confirm('Are You Sure Want to Delete..?');">
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
   $b = $_REQUEST['del'];
   
   $dl = "delete from about_tb where id = '$b'";
   if($con->query($dl)==TRUE)
   {
     header("location:index.php?file=about");
   }
}
?>	