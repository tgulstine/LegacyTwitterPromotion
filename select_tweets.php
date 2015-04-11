<?php
	require_once('db_operation.php');

	class TweetInfo {
		var $Id;
		var $TweetAuthor;
		var $TweetText;
		var $ProfileImageUrl;
		var $DateCreated;
	}

	header('Content-Type: application/json');

	$searchTags = '';
	
	$result = db_operation('SELECT ConfigKey, ConfigValue FROM nm_config');
	
	if ($row = mysql_fetch_assoc($result)) {
		if ($row['ConfigKey'] == 'SearchTags')
			$searchTags = $row['ConfigValue'];
	}
	
	$result = db_operation("SELECT Id, TweetAuthor, TweetText, ProfileImageUrl FROM tweets WHERE LOWER(TweetText) LIKE LOWER('%$searchTags%') ORDER By DateCreated DESC");
	$tweets = [];
	while ($row = mysql_fetch_assoc($result)) {
			$tweet = new TweetInfo();
			$tweet->Id = $row['Id'];
			$tweet->TweetAuthor = $row['TweetAuthor'];
			$tweet->TweetText = $row['TweetText'];
			$tweet->ProfileImageUrl = $row['ProfileImageUrl'];
			array_push($tweets, $tweet);
	}

	echo json_encode($tweets);

?>
