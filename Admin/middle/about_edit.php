<?php
	$sel = "select * from about_tb where id = '$_REQUEST[edt]'";
	$result = $con->query($sel);
	foreach($result as $v);
	?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>About</h2>

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
                        <label for="exampleInputEmail1">message</label>
                         <textarea name="a1"   class="form-control" placeholder="Enter message"><?php echo $v['message'];?></textarea> 					
                        </div>
	                   
					
					
                   
                    <input type="submit" name="sub2" value="Change About"  class="btn btn-default" />
                </form>
               <?php
    if(isset($_REQUEST['sub2']))
	{
					$a = $_REQUEST['a1'];
					
					 
									
					date_default_timezone_set("Asia/Kolkata");
					$c = date('Y-m-d h:i:s');
									
                     $ins = "update about_tb set message = '$a' where id = '$_REQUEST[edt]' ";
					
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
