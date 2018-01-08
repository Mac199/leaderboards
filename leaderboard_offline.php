

<!doctype html>
<html>
<head>
<?php 
	$browser = "";
	if(!strpos($_SERVER['HTTP_USER_AGENT'],"iPad")){
		$browser = "-ie"; 
	}
?>
<meta charset="utf-8">
<meta name = "viewport" content = "initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<title>Leaderboard</title>
<link href="fonts.css" rel="stylesheet" type="text/css">
<?php 

	$browser = "";
	if(strpos($_SERVER['HTTP_USER_AGENT'],"iPad")){
	?>
<link href="styles.css" rel="stylesheet" type="text/css">
	<?php
	}
	else{
		$browser = "-ie"; 
	?>
<link href="styles-ie.css" rel="stylesheet" type="text/css">
	<?php
	}
?>
<script src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="wwid.js"></script>
<script type="text/javascript">
</script>
</head>

<body>
<div id="hold" style="width:1920px;height:1080px;background:url(Leaderboard_Offline<?php echo $browser;?>.png) no-repeat;position:absolute;top:0px;left:0px;"></div>
<div id="returnE" style="position: absolute; top: 12px; font-size: 19px; width: 80px; height: 80px; left: 14px; background: url(returnL<?php echo $browser; ?>.png); background-repeat: no-repeat;" ontouchstart='this.style.background="url(return_downL<?php echo $browser; ?>.png)"' ontouchend='javascript:history.go(1-history.length);' onclick='javascript:history.go(1-history.length);'></div> 
</body>
</html>
