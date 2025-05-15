<?php
	$sel = "select * from city_tb where c_id = '$_REQUEST[edt]'";
	$result = $con->query($sel);
	foreach($result as $v);
	?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>City</h2>

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
                        <label for="exampleInputEmail1">City</label>
                         <input type="text" name="a1"  class="form-control" placeholder="Enter Name" value="<?php echo $v['c_name'];?>" /> 					
                        </div>
	                    <div class="form-group">
                        <label for="exampleInputEmail1">Satatus</label>
						<select class="form-control" name="a2">
						<option value="">--Select--</option>
						<?php
                         if($v['c_status']=="Active")
                         {							 
						?>
						<option value="Active" selected="selected">Active</option>
						<option value="Deactive">Deactive</option>
						<?php 
						 }
						 else
						 {
						?>
						<option value="Active">Active</option>
						<option value="Deactive" selected="selected">Deactive</option>
						 <?php } ?>
						</select>
                         </div>
					
					
                   
                    <input type="submit" name="sub2" value="Change Category"  class="btn btn-default" />
                </form>
               <?php
    if(isset($_REQUEST['sub2']))
	{
					$a = $_REQUEST['a1'];
					$b = $_REQUEST['a2'];
					 
									
					date_default_timezone_set("Asia/Kolkata");
					$c = date('Y-m-d h:i:s');
									
                     $ins = "update city_tb set c_name = '$a',c_status = '$b',new_date = '$c' where c_id = '$_REQUEST[edt]' ";
					
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=city");
					  }
		}
	 ?>
            </div>
        </div>
    </div>
    <!--/span-->

</div>
