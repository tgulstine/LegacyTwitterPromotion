<?php
	require_once('db_operation.php');
	
	class TriggerLevel {
		var $TriggerThreshold;
		var $PrizeDescription;
	}
	$result = db_operation('SELECT * FROM tweets');
	$triggerLevels = [];
	while ($row = mysql_fetch_assoc($result)) {
		$triggerLevel = new TriggerLevel();
		$triggerLevel->TriggerLevel = $row['TriggerLevel'];
		$triggerLevel->PrizeDescription = $row['PrizeDescription'];
		array_push($triggerLevels, $triggerLevel);
	}
	
		echo json_encode($triggerLevels);
?>