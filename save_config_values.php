<?php
	require_once('db_operation.php');
	
	header('Content-Type: application/json');
	
	if(isset($_POST['configs'])) {
		var $tweetCount;
		
		db_operation("TRUNCATE TABLE nm_config");
		
		$json = $_POST['configs'];
		$data = json_decode($json, true);
		
		// insert each entry from the config values
		foreach ($data as $item) {
			$ConfigKey = $item['ConfigKey'];
			
			// if a tweet count was specified, we need to calculate the offset
			if ($item['ConfigValue'] == 'TweetCountOffset') 
				$result = db_operation("SELECT COUNT(*) As TweetCount FROM tweets");
	
				if ($row = mysql_fetch_assoc($result)) {
					$tweetCount = $row['TweetCount'];
				} else {
					$tweetCount = 0;
				}
				// eg, if there have been 6 tweets, and a tweet count of 40 was specified,
				// the config value will be 34
				$ConfigValue = $item['ConfigValue'] - $tweetCount;
			} else {
				$ConfigValue = $item['ConfigValue'];
			}
			
			db_operation("INSERT INTO nm_config ( ConfigKey, ConfigValue ) VALUES ( '$ConfigKey', '$ConfigValue' )");
		}
		echo "Completed successfully";
	} else {
		echo "Unable to save trigger threshold information";
	}
?>
