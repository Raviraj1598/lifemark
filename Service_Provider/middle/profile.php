<?php
	$sel = "select * from serviceprovider_tb where sp_email = '$_SESSION[slogin]'" ;
	$result = $con->query($sel);
	foreach($result as $v);
	$image = $v['shop_image'];
	?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Profile</h2>

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
                        <label for="exampleInputEmail1">Shop Image</label>
					    <br/>
					    <img src="../upload/shop/<?php echo $v['shop_image'];?>" height="50px" width="50px"/><br/>
				        <input type="file" name="t7" class="form-control" value="<?php echo $v['shop_image'];?>" />
				        </div>
						
						<div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
						<select class="form-control" name="t9">
						<option value="">--Select--</option>
						<?php
						 $sel_cat = "select * from category_tb where cat_status = 'Active'";
						 $sel_r = $con->query($sel_cat);
						 foreach($sel_r as $sel_v)
						 {
                         if($sel_v['cat_id']==$v['cat_id'])
                         {							 
						?>
						<option value="<?php echo $sel_v['cat_id'];?>" selected="selected"><?php echo $sel_v['cat_name'];?></option>
						<?php 
						 }
						 else
						 {
						?>
						<option value="<?php echo $sel_v['cat_id'];?>"><?php echo $sel_v['cat_name'];?></option>					                        <?php } }?>
						</select>
                        </div>
						
						<div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                         <input type="text" name="t1" class="form-control" value="<?php echo $v['sp_name'];?>"/> 					
                        </div>
						<div class="form-group">
	                    <label for="exampleInputEmail1">Address</label>
                        <textarea name="t2" class="form-control" ><?php echo $v['sp_address'];?></textarea> 					
                        </div>
	                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                         <input type="text" name="t3" class="form-control" value="<?php echo $v['sp_contact'];?>" /> 					
                        </div>
						<div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                         <input type="text" name="t4" class="form-control" value="<?php echo $v['sp_email'];?>" readonly="" /> 					
                        </div>
						<div class="form-group">
                        <label for="exampleInputEmail1">Shop Name</label>
                         <input type="text" name="t5" class="form-control" value="<?php echo $v['shop_name'];?>" /> 					
                        </div>
			            <div class="form-group">
                        <label for="exampleInputEmail1">Shop Address</label>
                         <textarea name="t6" class="form-control"  style="height:100px" ><?php echo $v['shop_address'];?></textarea>				
                        </div>
						
	                    
						<div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                         <input type="text" name="t8" class="form-control" value="<?php echo $v['sp_password'];?>"/> 					
                        </div>

						
					
					
                   
                    <input type="submit" name="sub" value="Change Profile"  class="btn btn-default" />
                </form>
         

     <?php
    if(isset($_REQUEST['sub']))
	{
					$a = $_REQUEST['t1'];
					$b = $_REQUEST['t2'];
					
					    move_uploaded_file($_FILES['t7']['tmp_name'],"../upload/shop/".$_FILES['t7']['name']);
						$c = $_FILES['t7']['name'];
						if(strlen($c) > 0)
						{
						   $image = $c;
						}
				    $d = $_REQUEST['t3'];
				    $e = $_REQUEST['t4'];	 
				    $f = $_REQUEST['t5']; 
					$g = $_REQUEST['t6'];
					$h = $_REQUEST['t8'];
					$i = $_REQUEST['t9'];				
					date_default_timezone_set("Asia/Kolkata");
					$j = date('Y-m-d h:i:s');
									
                  $ins = "update serviceprovider_tb set sp_name = '$a',sp_address = '$b',shop_image = '$image',sp_contact = '$d',sp_email = '$e',shop_name = '$f',shop_address = '$g',sp_password = '$h',cat_id = '$i',updated_date = '$j' where sp_email = '$_SESSION[slogin]' ";
					
					  if($con->query($ins)==TRUE)
					  {
					     header("location:index.php?file=profile");
					  }
		}
	 ?>		  
		       </div>
        </div>
    </div>
    <!--/span-->

</div>
