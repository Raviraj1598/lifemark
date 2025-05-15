<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Feedback Details</h2>

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
        <th>Message</th>
        <th>Email</th>
        <th>Created Date</th>
		<th>Action</th>
    </tr>
    </thead>
    <body>
<?php
	$sel = "select * from feedback_tb";
	$result = $con->query($sel);
	$j=1;
	foreach($result as $v)
	{
?>		
	<tr>
        <td><?php echo $j++; ?></td>
        <td class="center"><?php echo $v['f_name'];?></td>
        <td class="center"><?php echo $v['f_message'];?></td>
        <td class="center"><?php echo $v['f_email'];?></td>
        <td class="center"><?php echo $v['f_created_date'];?></td>
        <td class="center">
		<a class="btn btn-danger" href="index.php?file=feedback&del=<?php echo $v['f_id'];?>" onclick="return confirm('Are You Sure Want to Delete..?');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>      
	</tr>
    <?php } ?>
    </body>
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
         $dl = "delete from feedback_tb where f_id = '$b'";
         if($con->query($dl)==TRUE)
        {
             header("location:index.php?file=feedback");
        }
    }
?>