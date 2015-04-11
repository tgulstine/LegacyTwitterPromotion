<?php
	require_once('db_operation.php');
	
	class KeyValuePair {
		var $ConfigKey;
		var $ConfigValue;
	}

	header('Content-Type: application/json');
	
	$result = db_operation('SELECT ConfigKey, ConfigValue FROM nm_config');
	$configValues = [];
	
	while ($row = mysql_fetch_assoc($result)) {
		$keyValuePair = new KeyValuePair();
		$keyValuePair->ConfigKey = $row['ConfigKey'];
		$keyValuePair->ConfigValue = $row['ConfigValue'];
		array_push($configValues, $keyValuePair);
	}

	echo json_encode($configValues);
?>