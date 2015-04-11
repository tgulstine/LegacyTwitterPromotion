<?php
	require_once('db_operation.php');

	class TweetInformation
	{
		$var TweetCount;
	]
	
	header('Content-Type: application/json');

	$result = db_operation("SELECT COUNT(*) As TweetCount FROM tweets");
	
	$tweetInformation = new TweetInformation();
	if ($row = mysql_fetch_assoc($result)) {
		$tweetInformation->TweetCount = $row['TweetCount'];
	} else {
		$tweetInformation->TweetCount = 0;
	}
	echo json_encode($tweetInformation);
?>