<?php
	function db_operation($sql) {
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = '';
		//$dbhost = 'localhost';
		//$dbuser = 'conver33_nm';
		//$dbpass = 'g0Irish!';
		//$dbhost = 'localhost';
		//$dbuser = 'root';
		//$dbpass = 'g0Irish!';
		
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db('twitterapi');
		//mysql_select_db('conver33_nm');
		//mysql_select_db('negra');
	
		$result = mysql_query( $sql, $conn );
		mysql_close($conn);
		return $result;		
	}
?>