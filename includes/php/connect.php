<?php
	//include("../../config.php");
	//global $conn;

	//global $db_host;
	//global $db_login;
	//global $db_pass;
	//global $db_database;
	
	//$db_host = "localhost";
	//$db_login = "sweetlou_ruppert";
	//$db_pass = "ruppert";
	//$db_database = "sweetlou_ruppert2";
	
	$db_host = "ruppert.db.9721098.hostedresource.com";
	$db_login = "ruppert";
	$db_pass = "CRupp3rt!";
	$db_database = "ruppert"; //sweetlou_ruppert
	
	$conn = mysqli_connect($db_host,$db_login,$db_pass,$db_database) or die('Connect Error:' . mysqli_error($conn) . "<br/>");
	
?>
