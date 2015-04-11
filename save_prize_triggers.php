<?php
	require_once('db_operation.php');
	
	header('Content-Type: application/json');
		
	if(isset($_POST['entries'])) {
		// delete all previous entries; the page produces a total refresh of contents
		db_operation('TRUNCATE TABLE trigger_information');

		// insert each entry from the grid
		$json = $_POST['entries'];
		$data = json_decode($json, true);

		foreach ($data as $item) {
			$TriggerLevel = $item['TriggerLevel'];
			$PrizeDescription = $item['PrizeDescription'];
			db_operation("INSERT INTO trigger_information ( TriggerLevel, PrizeDescription ) VALUES ( '$TriggerLevel', '$PrizeDescription' )");
		}
		
		// TO DO: generate some JSON back to the client
		echo $json;
	} else {
		echo "Unable to save trigger threshold information";
	}
?>