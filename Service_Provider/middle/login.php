
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Service Provider</h2>
        </div>
        <!--/span-->
    </div><!--/row-->
    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Email and Password.
            </div>
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Email" name="t1" />
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="t2" />
                    </div>
                    <div class="clearfix"></div>

                    
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <input type="submit" class="btn btn-primary" name="sub1" value="Login" />
                    </p>
                </fieldset>
            </form>
			<?php
			if(isset($_REQUEST['sub1']))
			{
			   $a = $_REQUEST['t1'];
			   $b = $_REQUEST['t2'];
			   
			   $sel = "select * from serviceprovider_tb where sp_email = '$a' and sp_password = '$b' and sp_status = 'Active'";
			   $r = $con->query($sel);
			   // check row - data 
			   if(mysqli_num_rows($r) > 0)
			   {
			      foreach($r as $v)
				  {
				     session_start();
					 $_SESSION["sid"] = $v['sp_id'];
					 $_SESSION["slogin"] = $a;
					 $_SESSION["sprofile"] = $v['shop_image'];
					 $_SESSION["slast"] = $v['updated_date'];
					 
					 header("location:index.php?file=home");
				  }
			   }
			   else
			   {
               ?>
			   <div class="alert alert-info">
                Invalid Email Or Password...!!
                </div>
			   <?php  
			   }
			   
			   
			} 
			?>
        </div>
        <!--/span-->
    </div><!--/row-->