<!doctype html>
<?php
	include "database/db_mysql.inc";
	
	#Area scores query
	$db->query("SELECT group_id2, SUM(score) AS total_score FROM challenges_points WHERE group_id2 != '' AND event_id=6 GROUP BY group_id2 ORDER BY total_score DESC LIMIT 0,3");
	
	#Region scores query
	$db1->query("SELECT group_id3, SUM(score) AS total_score FROM challenges_points WHERE group_id3 != '' AND event_id=6 GROUP BY group_id3 ORDER BY total_score DESC LIMIT 0,6");
	
	#Individual scores query
	$db2->query("SELECT first_name, last_name, SUM(score) AS total_score FROM challenges_points WHERE event_id=6 GROUP BY user_id ORDER BY total_score DESC LIMIT 0,3");
	
?>


<html>
<head>
<meta charset="utf-8">
<meta name = "viewport" content = "initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<title>Leaderboard</title>
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

<link href="fonts.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	if(!navigator.online){
		//location.href = "leaderboard_offline.php";
	}
		
makeLeader();
});
function makeLeader(){

<?php
	$x = 1;
	
	while($db->next_record()){
		$group_id2 = $db->f('group_id2');
		
?>
		document.getElementById('leaderboardArea').innerHTML+='<div id="number"><img src="<?php echo $x.$browser ?>.png" /></div><div id="region"><?php echo addslashes($group_id2); ?></div><div id="score"><?php echo $db->f('total_score'); ?></div><br/><br/><br/>';
<?php
		$x++;	
	}
	$x = 1;

	while($db1->next_record()){
		$group_id3 = $db1->f('group_id3');
?>
		document.getElementById('leaderboardRegion').innerHTML+='<div id="number"><img src="<?php echo $x.$browser ?>.png" /></div><div id="region"><?php echo addslashes($group_id3); ?></div><div id="score"><?php echo $db1->f('total_score'); ?></div><br/><br/><br/>';

<?php
		$x++;	
	}
	$x = 1;

	while($db2->next_record()){
		
		$first_name = $db2->f('first_name');
		$last_name = $db2->f('last_name');
?>					
		document.getElementById('leaderboardIndividual').innerHTML+='<div id="number"><img src="<?php echo $x.$browser ?>.png" /></div><div id="region"><?php echo addslashes($first_name)." ".addslashes($last_name); ?></div><div id="score"><?php echo $db2->f('total_score'); ?></div><br/><br/><br/>';
<?php
		$x++;
	}
?>

		



}
</script>

</head>

<body>
<div id="hold">
	<div id="leaderboardArea"></div> 
	<div id="leaderboardRegion"></div> 
	<div id="leaderboardIndividual"></div> 
</div>  
</body>
</html>
