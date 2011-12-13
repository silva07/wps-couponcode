<?php

$hostedButtonId = "";
$amount = 0;

$arr = array(
"take5" => array("hostedButtonId" => "", "discount" => "5"),
"take10" => array("hostedButtonId" => "", "discount" => "10")
);

	foreach ($arr as $key => $value) {
	
		if ($key == $_POST["couponCode"])
		{
			$hostedButtonId = $value["hostedButtonId"];
			$discount = $value["discount"];
			$amount = ($amount - $discount);
			break;
		}
	}

?>


<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Coupon Code</title>

<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="apDiv1">
	<h3>Slick Tie $<?php echo  $amount; ?></h3>
	<img src="tie.png" width="72" height="130">
</div>
    
<div id="apDiv2">
	A tie by any other name would still look as sweet.  But a tie at a lower price ...
  	<br><br>
  <form action="coupon-code.php" method="post">
   	 	<input type="text" name="couponCode"  placeholder="coupon code" >
    	<input type="submit" name="submitCouponCode" value="apply coupon">
    </form>
    <br><br>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="<?php echo  $hostedButtonId; ?>">
        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
            border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

</div>

</body>
</html>
