<div class="navbar-inner">
        <div class="container">
           
           <a class="brand" href="index.php?file=home"><h><font color="white" face="forte" size="5" >The Life Mark</font></h></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"><i class="fa fa-solid fa-bars"></i>
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		        </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		       <?php 
			   
			   if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
               {
			   ?>
			    <ul class="nav navbar-nav ">
		            <li><a href="index.php?file=home">Home</a></li>
					<li><a href="index.php?file=provider">Service Provider</a></li>
					
		    		<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Join Us<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="index.php?file=serviceprovidersignup">Service Provider Sign Up</a></li>
		                <li><a href="index.php?file=usersignup">User Sign Up</a></li>
		                
		              </ul>
		            </li>
	
					<li><a href="index.php?file=service">Services</a></li>
					<li><a href="index.php?file=about">About Us</a></li>
		            <li class="last"><a href="index.php?file=contact">Contacts Us</a></li>
                            <li style="background-color: #07a907; border-radius:30px;"><a href="index.php?file=signin">Sign In</a></li>
		        </ul>
				<?php 
				}
				else
				{
				?>
				<ul class="nav navbar-nav nav_1">
		            <li><a href="index.php?file=home">Home</a></li>
					<li><a href="index.php?file=provider">Service Provider</a></li>
					 
					 <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="index.php?file=userprofile">Profile</a></li>
						<li><a href="index.php?file=booking">My Booking</a></li>
		                <li><a href="index.php?file=order">My Order</a></li>
		                
		              </ul>
		            </li>
	
		    		
					<li><a href="index.php?file=service">Services</a></li>
					<li><a href="index.php?file=about">About Us</a></li>
		            <li class="last"><a href="index.php?file=contact">Contacts Us</a></li>
					 <li class="last"><a href="index.php?file=logout">Sign Out</a></li>
		        </ul>
				<?php } ?>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div>