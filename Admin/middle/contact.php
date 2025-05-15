<?php
	$sel = "select * from contact_tb";
	$result = $con->query($sel);
	foreach($result as $v);
	?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Contact Us</h2>

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
                        <label for="exampleInputEmail1">Name</label>
                         <input type="text" name="a1"  class="form-control" placeholder="Enter Name"  value="<?php echo $v['name'];?>"/> 					
                        </div>
						<div class="form-group">
	                    <label for="exampleInputEmail1">Address</label>
                         <textarea type="text" name="a2"  class="form-control" placeholder="Enter Address" ><?php echo $v['address'];?></textarea> 					
                        </div>
	                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                         <input type="text" name="a3"  class="form-control" placeholder="Enter Contact" value="<?php echo $v['contact'];?>" /> 					
                        </div>
						<div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                         <input type="text" name="a4"  class="form-control" placeholder="Enter Email" value="<?php echo $v['email'];?>" /> 					
                        </div>
						<div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                         <input type="text" name="a5"  class="form-control" placeholder="Enter Website" value="<?php echo $v['website'];?>" /> 					
                        </div>
						
					
					
                   
                    <input type="submit" name="sub2" value="Change Contact"  class="btn btn-default" />
                </form>
               <?php
    if(isset($_REQUEST['sub2']))
	{
	    $a = $_REQUEST['a1'];
	    $b = $_REQUEST['a2'];
	    $c = $_REQUEST['a3']; 
		$d = $_REQUEST['a4'];
		$e = $_REQUEST['a5'];

					
                      $ins = "update contact_tb set name = '$a',address = '$b',contact = '$c',email = '$d',website= '$e'";
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=contact");
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
        <h2><i class="glyphicon glyphicon-user"></i> View Contact Us Details</h2>

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
        <th>Address</th>
        <th>Contact</th>
        <th>E-mail</th>
        <th>Website</th>
    </tr>
    </thead>
    <tbody>
	<tr>
        <td><?php echo "1";?></td>
        <td class="center"><?php echo $v['name'];?></td>
        <td class="center"><?php echo $v['address'];?></td>
        <td class="center"><?php echo $v['contact'];?></td>
        <td class="center"><?php echo $v['email'];?></td>
        <td class="center"><?php echo $v['website'];?></td>
         
    </tr>
  
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>