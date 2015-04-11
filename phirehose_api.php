<?php
	require_once('db_operation.php');
	require_once('lib/Phirehose.php');
	require_once('lib/OauthPhirehose.php');

	class FilterTrackConsumer extends OauthPhirehose
	{
		public function enqueueStatus($status)
		{
			//$db = new PDO('mysql:host=localhost;dbname=negra;charset=utf8', 'root', 'g0Irish!');
			$db = new PDO('mysql:host=localhost;dbname=twitterapi;charset=utf8', 'root', '');
			
			//echo $status;
			$data = json_decode($status, true);
			if (is_array($data) && isset($data['user']['screen_name'])) {
				$twitter_text = $db->quote($data['text']); // mysql_real_escape_string($data['text']);
				$twitter_author = $data['user']['screen_name'];
				$profile_image_url = $data['user']['profile_image_url'];
				db_operation("INSERT INTO tweets ( TweetText, TweetAuthor, ProfileImageUrl ) VALUES ( $twitter_text, '$twitter_author', '$profile_image_url' )");

				echo "Entered data successfully\n";
			}
		}
	}

	$search_tags = '#ThePerfectComplement';
	
	// let's get the search tags from the config table
	$result = db_operation("SELECT ConfigValue FROM nm_config WHERE ConfigKey = 'SearchTags'");
	
	if ($row = mysql_fetch_assoc($result)) {
		$search_tags = $row['ConfigValue'];
	}
		
	// The OAuth credentials you received when registering your app at Twitter
	//define("TWITTER_CONSUMER_KEY", "n1mgiKdmorBN04Q3NacxS7o6y");
	//define("TWITTER_CONSUMER_SECRET", "XH3NDFLMjyTNxOWB7cDjxuk9ixgcODVOGtJZFEJg0VPLG4MUZN");
	// The OAuth data for the twitter account
	//define("OAUTH_TOKEN", "382251829-EtaGbTeB4ltLQBazorrKbLGC7mNA1wi6wHmjmt3s");
	//define("OAUTH_SECRET", "nIHO5sU1LGqpiAcJ9mcWAgEy8dR88u2lgrNsQs3uX44F5");
	
	define("TWITTER_CONSUMER_KEY", "5uXrRbXGyJBjq5XA4k7CYt0bf");
	define("TWITTER_CONSUMER_SECRET", "3Uiv3Ftgt13zJy4zEYtap5zKPplSxTbi0rrp5iyx1697ZFZhIg");
	// The OAuth data for the twitter account
	define("OAUTH_TOKEN", "251660977-A9rpHSofBpzSDsgGXGlaI0Gh1k8VoBUx4x9TFWPx");
	define("OAUTH_SECRET", "Bj8jtKV3Pamwtp2UvMMZcqORRilCsIKLNg9SiilnudKVw");
	
	
	echo "started tweet monitor, search tag(s): " . $search_tags . "\n";
	// Start streaming
	$sc = new FilterTrackConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
	$sc->setTrack(array($search_tags));
	$sc->consume();
?>