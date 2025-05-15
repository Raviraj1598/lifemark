    <?php
	$sel = "select * from services_tb where s_id = '$_REQUEST[edt]'";
	$result = $con->query($sel);
	foreach($result as $v);
	$img = $v['s_image'];
	?>
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
                         <input type="text" name="t1"  class="form-control" placeholder="Enter Title" value="<?php echo $v['s_title'];?>" /> 					
                        </div>
	         <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                         <textarea name="t2" class="form-control" placeholder="Enter Services Description" style="height:                         100px"><?php echo $v['s_desc'];?></textarea> 					
                        </div>
	         
	         <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
	         <br/>
	         <img src="../upload/services/<?php echo $v['s_image'];?>" height="50px" width="50px" />
	         <br/>
                         <input type="file" name="t3" class="form-control"/> 					
                        </div>
	         <div class="form-group">
	         <select name="t4" class="form-control">
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
	    
	 <input type="submit" name="sub2" value="Change Services"  class="btn btn-default" />
                </form>
               <?php
               if(isset($_REQUEST['sub2']))
	{
	$a = $_REQUEST['t1'];
	$b = $_REQUEST['t2'];
					 
									
	date_default_timezone_set("Asia/Kolkata");
	$c = date('Y-m-d h:i:s');
	
	$d = $_REQUEST['t4'];
	
	//image code
	  move_uploaded_file($_FILES['t3']['tmp_name'],"../upload/services/".$_FILES['t3']['name']);
                 $file=$_FILES['t3']['name'];
	  if(strlen($file) > 0)
	  {
	     $img = $file;
	  }
               
	 $ins = "update services_tb set s_title = '$a',s_desc= '$b',s_image = '$img',updated_date='$c',s_status = '$d' where s_id = '$_REQUEST[edt]' ";
					
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
