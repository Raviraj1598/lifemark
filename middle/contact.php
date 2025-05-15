<?php
$sel = "select * from contact_tb";
$r = $con->query($sel);
foreach($r as $v);
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php?file=home"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Contact</li>
     </ul>
   </div>
   <div class="grid_5">
      	  <dl class="grid_5">
          <dt align="center"><?php echo $v['name'];?></dt>
        </dl>
      <address class="addr row">
        <dl class="grid_4">
            <dt>Address :</dt>
            <dd><?php echo $v['address'];?></dd>
        </dl>
        <dl class="grid_4">
            <dt>Contact No : </dt>
            <dd><?php echo $v['contact'];?></dd>
        </dl>
        <dl class="grid_4">
            <dt>E-mail :&nbsp;&nbsp;&nbsp;<a href="<?php echo $v['email'];?>"><?php echo $v['email'];?></a></dt>
            
			
        </dl>
		<dl class="grid_4">
		<dt>Website :&nbsp;<a href="<?php echo $v['website'];?>" target="_blank"><?php echo $v['website'];?></a></dt>
        </dl>
		
      </address>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
	 <h2>Contact Form</h2>
	  <form id="contact-form" class="contact-form" method="post">
        <fieldset>
          <input type="text" name="a1" class="text" placeholder="Enter Name" required="required" pattern="[a-zA-Z, ]*" title="Enter Valid Name" />
          <input type="text" name="a2" class="text" placeholder="Enter Email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email" />
          <textarea name="a3" placeholder="Enter Message" required="required"></textarea>
          <input name="submit" type="submit" id="submit" value="Submit">
        </fieldset>
      </form>
	  <?php
	  if(isset($_REQUEST['submit']))
	  {
	  $a = $_REQUEST['a1'];
	  $b = $_REQUEST['a2'];
	  $c = $_REQUEST['a3'];
	  date_default_timezone_set("Asia/Kolkata");
	  $d = date('Y-m-d h:i:s'); 				
	  $ins = "insert into feedback_tb(f_name,f_email,f_message,f_created_date)value('$a','$b','$c','$d')";
	  if($con->query($ins)==TRUE)
	    {
          header("location:index.php?file=contact");
	    }
	  }						
	  ?>
	  
  </div>
</div>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117415.80566173127!2d72.47439895820311!3d23.12475759999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e839529d36caf%3A0x17fc04f27cdbaf6c!2z4Kqh4KuLLiDgqqzgqr7gqqzgqr7gqrjgqr7gqrngq4fgqqwg4KqG4KqC4Kqs4KuH4Kqh4KqV4KqwIOCqk-CqquCqqCDgqq_gq4Hgqqjgqr_gqrXgqrDgq43gqrjgqr_gqp_gq4A!5e0!3m2!1sgu!2sin!4v1565023619356!5m2!1sgu!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>