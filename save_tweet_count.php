<?php
	require_once('db_operation.php');
	
	header('Content-Type: application/json');
	
	if(isset($_POST['configs'])) {
		var $tweetCount;
		
		$json = $_POST['configs'];
		$data = json_decode($json, true);
		
		// insert each entry from the config values
		foreach ($data as $item) {
			$ConfigKey = $item['ConfigKey'];
			
			// if a tweet count was specified, we need to calculate the offset
			if ($ConfigKey == 'TweetCount') {
				$targetedTweetCount = $item['ConfigValue'];
				$currTweetCount = 0;
				
				echo "targeted value: " . $targetedTweetCount . "\n";
				
				while ($currTweetCount < $targetedTweetCount) {
					$result = db_operation("SELECT COUNT(*) As TweetCount FROM tweets");
		
					if ($row = mysql_fetch_assoc($result)) {
						$currTweetCount = $row['TweetCount'];
					} else {
						$currTweetCount = 0;
					}
					
					echo "curr tweet count: " . $currTweetCount . "\n";
					
					if ($currTweetCount < $targetedTweetCount) {
						// pad the tweets table with dummy entries to match the record count specified
						db_operation("INSERT INTO tweets ( TweetText, TweetAuthor, ProfileImageUrl ) VALUES ( '', '', '' )");
					}
				}
			} 
			
			db_operation("UPDATE nm_config SET ConfigValue = $targetedTweetCount WHERE ConfigKey = 'TweetCount'");
		}
		echo "Completed successfully";
	} else {
		echo "Unable to save trigger threshold information";
	}
?>
