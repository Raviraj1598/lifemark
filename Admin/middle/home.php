<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Wedding</a>
        </li>

    </ul>
</div>


<div class=" row">
    <?php
	$sel = "select count(cat_id)as A from category_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['A'];?> Total Category" class="well top-block" href="index.php?file=category">
            <i class="glyphicon glyphicon-list-alt"></i>

            <div>Total Category</div>
            <div><?php echo $v['A'];?></div>
            <span class="notification"><?php echo $v['A'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(s_id)as B from service_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['B'];?> Total Services" class="well top-block" href="index.php?file=service">
            <i class="glyphicon glyphicon-calendar"></i>

            <div>Total Services</div>
            <div><?php echo $v['B'];?></div>
            <span class="notification green"><?php echo $v['B'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(r_id)as C from rating_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['C'];?> Total Rating" class="well top-block" href="index.php?file=rating">
            <i class="glyphicon glyphicon-th"></i>

            <div>Total Rating</div>
            <div><?php echo $v['C'];?></div>
            <span class="notification yellow"><?php echo $v['C'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(b_id)as D from booking_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['D'];?> Total Booking" class="well top-block" href="index.php?file=booking">
            <i class="glyphicon glyphicon-globe"></i>

            <div>Total Booking</div>
            <div><?php echo $v['D'];?></div>
            <span class="notification red"><?php echo $v['D'];?></span>
        </a>
    </div>
</div>



<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">User</a>
        </li>

    </ul>
</div>


<div class=" row">
    <?php
	$sel = "select count(sp_id)as E from serviceprovider_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['E'];?> Total Service Provider" class="well top-block" href="index.php?file=serviceprovider">
            <i class="glyphicon glyphicon-eye-open"></i>

            <div>Total Service Provider</div>
            <div><?php echo $v['E'];?></div>
            <span class="notification blue"><?php echo $v['E'];?></span>
        </a>
    </div>
	<?php
	$sel = "select count(u_id)as F from user_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['F'];?> Total Customer" class="well top-block" href="index.php?file=user">
            <i class="glyphicon glyphicon-edit"></i>

            <div>Total Customer</div>
            <div><?php echo $v['F'];?></div>
            <span class="notification green"><?php echo $v['F'];?></span>
        </a>
    </div>
</div>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Other</a>
        </li>

    </ul>
</div>


<div class=" row">
    <?php
	$sel = "select count(id)as G from about_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['G'];?> About Us" class="well top-block" href="index.php?file=about">
            <i class="glyphicon glyphicon-eye-open"></i>

            <div>About Us</div>
            <div><?php echo $v['G'];?></div>
            <span class="notification"><?php echo $v['G'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(id)as H from contact_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['H'];?> Contact Us" class="well top-block" href="index.php?file=contact">
            <i class="glyphicon glyphicon-edit"></i>

            <div>Contact Us</div>
            <div><?php echo $v['H'];?></div>
            <span class="notification green"><?php echo $v['H'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(f_id)as I from feedback_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['I'];?> Total Feedback" class="well top-block" href="index.php?file=feedback">
            <i class="glyphicon glyphicon-font"></i>

            <div>Feedback</div>
            <div><?php echo $v['I'];?></div>
            <span class="notification yellow"><?php echo $v['I'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(c_id)as J from city_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['J'];?> Total City" class="well top-block" href="index.php?file=booking">
            <i class="glyphicon glyphicon-picture"></i>

            <div>Total City</div>
            <div><?php echo $v['J'];?></div>
            <span class="notification red"><?php echo $v['J'];?></span>
        </a>
    </div>
    <?php
	$sel = "select count(s_id)as K from services_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['K'];?> Total Service" class="well top-block" href="index.php?file=services">
            <i class="glyphicon glyphicon-align-justify"></i>

            <div>Total Service</div>
            <div><?php echo $v['K'];?></div>
            <span class="notification blue"><?php echo $v['K'];?></span>
        </a>
    </div>	
</div>
