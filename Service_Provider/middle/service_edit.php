<?php
	$sel = "select * from service_tb where s_id = '$_REQUEST[edt]'";
	$result = $con->query($sel);
	foreach($result as $v);
	$image1 = $v['s_image1'];
	$image2 = $v['s_image2'];
	$image3 = $v['s_image3'];
	?>
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
                         <input type="text" name="t1"   class="form-control" placeholder="Enter Serive Name" value="<?php echo $v['s_name'];?>" />					
                       </div>
    	    	<div class="form-group">
                <label for="exampleInputEmail1">Service Details</label>
	   			<textarea name="t2" class="form-control" placeholder="Enter Service Details" style="height:100px" ><?php echo $v['s_details'];?></textarea>
                </div>
					<div class="form-group">
                    <label for="exampleInputEmail1">Image 1</label>
					<br/>
					<img src="../upload/service/<?php echo $v['s_image1'];?>"  height="50px" width="50px"/><br/>
				    <input type="file" name="t3" class="form-control" />
				    </div>
				
					<div class="form-group">
					<label for="exampleInputEmail1">Image 2</label>
				    <br/>
					<img src="../upload/service/<?php echo $v['s_image2'];?>"  height="50px" width="50px" /><br/>
                    
					<input type="file" name="t4" class="form-control"  />
				    </div>
			     	
					<div class="form-group">
                    <label for="exampleInputEmail1">Image 3</label>
					<br/>
					<img src="../upload/service/<?php echo $v['s_image3'];?>"  height="50px" width="50px" /><br/>
				    <input type="file" name="t5" class="form-control"  />
				    </div>
					
                  <div class="form-group">
                        <label for="exampleInputEmail1">Satatus</label>
						<select class="form-control" name="t6">
						<option value="">--Select--</option>
						<?php
                         if($v['s_status']=="Active")
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
		         
                    <input type="submit" name="sub1" value="+Change Service"  class="btn btn-default" />
                </form>

               <?php
    if(isset($_REQUEST['sub1']))
	{
					$a = $_REQUEST['t1'];
					$b = $_REQUEST['t2'];
					
					    move_uploaded_file($_FILES['t3']['tmp_name'],"../upload/service/".$_FILES['t3']['name']);
						$c = $_FILES['t3']['name'];
						if(strlen($c) > 0)
						{
						   $image1 = $c;
						}
						
						move_uploaded_file($_FILES['t4']['tmp_name'],"../upload/service/".$_FILES['t4']['name']);
						$d = $_FILES['t4']['name'];
						if(strlen($d) > 0)
						{
						   $image2 = $d;
						}
						
						move_uploaded_file($_FILES['t5']['tmp_name'],"../upload/service/".$_FILES['t5']['name']);
						$e = $_FILES['t5']['name'];
					    if(strlen($e) > 0)
						{
						   $image3 = $e;
						}
						
						
					 $f = $_REQUEST['t6'];
					 
									
					date_default_timezone_set("Asia/Kolkata");
					$g = date('Y-m-d h:i:s');
									
                  $ins = "update service_tb set s_name = '$a',s_details = '$b',s_image1 = '$image1',s_image2 = '$image2',s_image3 = '$image3',s_status = '$f',updated_date = '$g' where s_id = '$_REQUEST[edt]' ";
					
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
