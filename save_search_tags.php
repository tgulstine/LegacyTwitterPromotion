<?php
	require_once('db_operation.php');
	
	header('Content-Type: application/json');
	
	if(isset($_POST['configs'])) {
		$json = $_POST['configs'];
		$data = json_decode($json, true);
		
		// insert each entry from the config values
		foreach ($data as $item) {
			$ConfigKey = $item['ConfigKey'];
			
			// if a tweet count was specified, we need to calculate the offset
			if ($ConfigKey == 'SearchTags') {
				$ConfigValue = $item['ConfigValue'];
				db_operation("INSERT INTO nm_config ( ConfigKey, ConfigValue ) VALUES ( '$ConfigKey', '$ConfigValue' )");
			}
		}
		echo "Completed successfully";
	} else {
		echo "Unable to save trigger threshold information";
	}
?>
