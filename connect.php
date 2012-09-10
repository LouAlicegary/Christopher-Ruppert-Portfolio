<?php
	include ("./config.php");
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,ARTIST_DB) or die('Connect Error:' . mysqli_error($conn) . "<br/>");
	
?>
