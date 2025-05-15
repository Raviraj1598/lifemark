<div class="container">
    		<div class="col-md-4 col_2">
    			<h4>About Us</h4>
    			<p>"Wedding At One Touch Has Referrals , Attending Service Provider meetings and coordinating and managing right up to overseeing the execution of Service Provider services on the Wedding At One Touch."</p>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Help & Support</h4>
    			<ul class="footer_links">
    				<li><a href="index.php?file=home">Home</a></li>
    				<li><a href="index.php?file=about">About us</a></li>
					<li><a href="index.php?file=contact">Contact us</a></li>
    				<li><a href="index.php?file=service">Services</a></li>
    				<li><a href="index.php?file=faq">FAQs</a></li>
					<li><a href="index.php?file=t_c">Terms And Conditions</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Profile</h4>
				 <?php 
			   if(!isset($_SESSION['email']) && (!isset($_SESSION['uid'])))
               {
			   ?>
    			<ul class="footer_links">
    				<li><a href="index.php?file=provider">Service Provider</a></li>
    				<li><a href="index.php?file=usersignup">User Sign Up</a></li>
    				<li><a href="index.php?file=serviceprovidersignup">Service Provider Sign Up</a></li>
    		        <li><a href="index.php?file=signin">Let's Start</a></li>
				</ul>
				<?php
				}
				else
				{
				?>
				<ul class="footer_links">
    				<li><a href="index.php?file=provider">Service Provider</a></li>
    				<li><a href="index.php?file=userprofile">Profile</a></li>
    				<li><a href="index.php?file=booking">My Booking</a></li>
		            <li><a href="index.php?file=order">My Order</a></li>
		             <li><a href="index.php?file=logout">Sign Out</a></li>   
				</ul>
				<?php } ?>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Social</h4>
    			<ul class="footer_social">
				  <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook fa1"> </i></a></li>
				  <li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter fa1"> </i></a></li>
				  <li><a href="http://www.google.com" target="_blank"><i class="fa fa-google-plus fa1"> </i></a></li>
				  <li><a href="http://www.youtube.com" target="_blank"><i class="fa fa-youtube fa1"> </i></a></li>
			    </ul>
    		</div>
    		<div class="clearfix"> </div>
    		<div class="copy">
		      <p>Copyright &copy; 2020-2022 The Life Mark . All Rights Reserved  | Design by <a href="#">Ravi Raj </a> </p>
	        </div>
    	</div>