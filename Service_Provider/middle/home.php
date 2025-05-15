<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Wedding</a>
        </li>

    </ul>
</div>


<div class=" row">
    <?php
	$sel = "select count(s_id)as A from service_tb where sp_id = '$_SESSION[sid]'";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['A'];?> Total Service" class="well top-block" href="index.php?file=service">
            <i class="glyphicon glyphicon-eye-open"></i>

            <div>Total Service</div>
            <div><?php echo $v['A'];?></div>
            <span class="notification blue"><?php echo $v['A'];?></span>
        </a>
    </div>
	<?php
	$sel = "select count(r_id)as B from rating_tb where sp_id = '$_SESSION[sid]'";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['B'];?> Total Rating" class="well top-block" href="index.php?file=rating">
            <i class="glyphicon glyphicon-edit"></i>

            <div>Total Rating</div>
            <div><?php echo $v['B'];?></div>
            <span class="notification green"><?php echo $v['B'];?></span>
        </a>
    </div>
	<?php
	$sel = "select count(b_id)as C from booking_tb where sp_id = '$_SESSION[sid]'";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $v['C'];?> Total Booking" class="well top-block" href="index.php?file=booking">
            <i class="glyphicon glyphicon-edit"></i>

            <div>Total Booking</div>
            <div><?php echo $v['C'];?></div>
            <span class="notification green"><?php echo $v['C'];?></span>
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
	$sel = "select count(u_id)as D from user_tb";
	$r = $con->query($sel);
	foreach($r as $v);
	?>
	
    <div class="col-md-3 col-sm-3 col-xs-6">
    <a data-toggle="tooltip" title="<?php echo $v['D'];?> Total Customer" class="well top-block" href="index.php?file=user">
    <i class="glyphicon glyphicon-eye-open"></i>

            <div>Total Customer</div>
            <div><?php echo $v['D'];?></div>
            <span class="notification blue"><?php echo $v['D'];?></span>
        </a>
    </div>

</div>
