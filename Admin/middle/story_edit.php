    <?php
	$sel = "select * from story_tb where st_id = '$_REQUEST[edt]'";
	$result = $con->query($sel);
	foreach($result as $v);
	$img = $v['st_image'];
	?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Story</h2>

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
                         <input type="text" name="t1"  class="form-control" placeholder="Enter Title" value="<?php echo $v['st_title'];?>" /> 					
                        </div>
	         <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                         <textarea name="t2" class="form-control" placeholder="Enter Services Description" style="height:                         100px"><?php echo $v['st_desc'];?></textarea> 					
                        </div>  
	        <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
						<br/>
	                    <img src="../upload/story/<?php echo $v['st_image'];?>" height="50px" width="50px" />
	                    <br/>
             
                         <input type="file" name="t3" class="form-control" /> 					
                        </div>
						 <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                         <input type="date" name="t5" class="form-control" value="<?php echo $v['st_date'];?>" /> 					
                        </div>
	        
			<div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="t4" class="form-control">
	                    <?php
	                    if($v['st_status']=="Active")
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
					
                <input type="submit" name="sub1" value="Change Story"  class="btn btn-default" />
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
			  if(strlen($d) > 0)
			  {
				 $img = $file;
			  }
			  
              $e = $_REQUEST['t4'];         
	 $ins = "update story_tb set st_title = '$a',st_desc= '$b',st_image = '$img',st_date='$c',st_status = '$e' where st_id = '$_REQUEST[edt]' ";
					
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
