
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Wedding At One Touch</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="t1" />
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
			   
			   $sel = "select * from login_tb where username = '$a' and password = '$b' ";
			   $r = $con->query($sel);
			   // check row - data 
			   if(mysqli_num_rows($r) > 0)
			   {
			      foreach($r as $v)
				  {
				     session_start();
					 $_SESSION["login"] = $a;
					 $_SESSION["profile"] = $v['image'];
					 $_SESSION["last"] = $v['l_time'];
					 
					 header("location:index.php?file=home");
				  }
			   }
			   else
			   {
               ?>
			   <div class="alert alert-info">
                Invalid Username Or Password...!!
                </div>
			   <?php  
			   }
			   
			   
			} 
			?>
        </div>
        <!--/span-->
    </div><!--/row-->