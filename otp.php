<?php
function guid()
{ 
	mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	$charid = strtoupper(md5(uniqid(rand(), true)));
	$uuid = substr($charid, 0, 4);
	return $uuid;
}	      
$otp=guid();
$phn=$_GET["phn"];
$r = file_get_contents('http://sms.goforsms.com/sendsms.asp?user=teclab&password=123456&sender=teclab&text=OTP+for+registration+is:'.$otp.'&PhoneNumber='.$phn.'&track=1');
echo $r;
?>
<html>
<head>
</head>
<body>
<center>
<table>
<tr>
<td>OTP:</td>
<td><input type="text" name="otp"id="otp" />
</td></tr></table>
<input type="button" value="submit" onclick="compare()"/>
<script>
function compare()
{
	var otp="<?php echo $otp; ?>";
	console.log(otp);
	var value=document.getElementById('otp').value;
	if(otp==value)
	{
		alert("registration successful");
	}
	else
		alert("Enter a valid OTP");
}
</script>
</center>
</body>
</html>