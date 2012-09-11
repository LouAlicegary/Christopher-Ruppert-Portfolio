<?php
session_start();
ini_set(`display_errors`,1);
error_reporting(E_ALL);

require_once "PEAR.php";
require_once "MDB2.php";
require_once "Auth.php";
require_once("../config.php");
//require_once("../includes/db_controller.php");
require_once("../includes/functions.php");

function loginFunction() {
     echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?login=1\" >";
     echo "<input type=\"text\" name=\"username\">";
     echo "<input type=\"password\" name=\"password\">";
     echo "<input type=\"submit\">";
     echo "</form>";
}


	if (isset($_GET['login']) && $_GET['login'] == 1) {
	     $optional = true;
	} else {
	     $optional = false;
	}


	$page_title = "Site Admin";
	$header = "Login";	
	$site_name = "Site Admin";
	echo "<!DOCTYPE html>
		<html>
		<head>
			<title>$page_title</title>
			<link type='text/css' rel='stylesheet' href='../css/chris.php' >
			<link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'>
			<script src='../includes/jquery.js' rel='javascript' type='text/javascript' language='javascript'></script>
			<script type='text/javascript' language='javascript'>
				$(document).ready(function() {
					var cssObj = {
						'width':'11em'
						}
					$('#admin_table tr :nth-child(2) input').css(cssObj);
					cssObj = {
						'width':'11em'
						}
					$('#admin_table tr :nth-child(3) input').css(cssObj);
					cssObj = {
						'width':'2em'
						}
					$('#admin_table tr :nth-child(5) input').css(cssObj);
					cssObj = {
						'width':'8em'
						}
					$('#admin_table tr :nth-child(6) input').css(cssObj);
					cssObj = {
						'width':'20em'
						}
					$('#admin_table tr :nth-child(8) input').css(cssObj);
					cssObj = {
						'width':'4em'
						}
					$('#admin_table tr :nth-child(11) input').css(cssObj);
					cssObj = {
						'width':'4em'
						}
					$('#admin_table tr :nth-child(12) input').css(cssObj);
				});
			</script>


		</head>
		<body>	
			<div id='content_div'>
				<div id='header'>
					<div id='page_header'><span id='header_name'>$site_name</span>
				</div>";

	$host = DB_HOST;
	$user = DB_USER;
	$password = DB_PASS;
	$database = ARTIST_DB;
	$options = array(
	  'dsn' => "mysqli://$user:$password@$host/$database",
		'table'=>'auth',
		'db_options'  => array('portability' => MDB2_PORTABILITY_ALL ^ MDB2_PORTABILITY_FIX_CASE)
	  );
	$a = new Auth("MDB2", $options, "loginFunction",$optional);

	$start = $a->start();


	if ((isset($_GET['logout'])) || isset($_POST['logout'])) {
		$a->logout();
		$a->start();
	}

	//check if they're authorized and if so, show them the page!
	if ($a->getAuth()) {
/********************** PROTECTED STUFF GOES HERE ***************/

		//create a log out feature of the thing.
		$who = $a->getUsername();
	     	echo "<div>Welcome " . $who . ", what would you like to do?</div>";
		echo "	<form method='get' action='" . $_SERVER['PHP_SELF'] . "' /> 
				<input type='submit' name='go home' value='go home' />
				<input type='submit' name='logout' value='logout' />
				<a href='../$who/index.php'>Return to Gallery</a>
			</form>";


		echo "</div>";//close the header div

		$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die("<p>Connection Error</p>");

		mysqli_select_db($conn, ARTIST_DB);

		//print_r($_POST);	

		echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "' >";

		if ($_POST['submit'] == 'update') {

		//if it's submitted, then update everything


			$counter = 0;

			$item_id = $_POST['item_id'];
			$max = sizeof($item_id); 

			$title_array = $_POST['descriptionFor'];
			//$desc_array = $_POST ['descFor'];
			$group_array =  $_POST['groupsFor'];
			$display_order_array = $_POST ['display_orderFor'];
			$location_array = $_POST ['locationFor'];
			$collection_array = $_POST ['collectionFor'];
			$explanation_array = $_POST ['explanationFor'];
			$master_array = $_POST ['masterFor'];
			$medium_array = $_POST ['mediumFor'];
			$dimensions_array = $_POST ['dimensionsFor'];
			$create_date_array = $_POST ['createDateFor'];


			$updateQ = array();

			for ($j = 0; $j < $max; $j++) {
				//echo "max = " . $max . "<br />";
				//echo "$j = " . $item_id_array[$j] . " " . $group_array[$j] . " " . $desc_array[$j] . "<br />";
				$updateQ[] = "UPDATE item_details AS d INNER JOIN items i INNER JOIN sections s ON d.id = i.id AND i.groups = s.cat_id SET  " 
						. "d.title = \"" . mysqli_real_escape_string($conn,$title_array[$j]) 
						. "\", i.groups = \"" . $group_array[$j] 
						. "\", d.display_order = \"" . $display_order_array[$j] 
						. "\", d.location = \"" . mysqli_real_escape_string($conn,$location_array[$j]) 
						. "\", d.collection = \"" . $collection_array[$j] 
						. "\", d.explanation = \"" . mysqli_real_escape_string($conn,$explation_array[$j]) 
						. "\", d.master = \"" . mysqli_real_escape_string($conn,$master_array[$j])
						. "\", d.medium = \"" . mysqli_real_escape_string($conn,$medium_array[$j]) 
						. "\", d.dimensions = \"" . mysqli_real_escape_string($conn,utf8_decode($dimensions_array[$j])) 
						. "\", d.create_date = \"" . mysqli_real_escape_string($conn,$create_date_array[$j] . "-01-01 00:00:00") 
						. "\" WHERE d.id = " . $item_id[$j];

				$updateR = mysqli_query($conn, $updateQ[$j]) or die("Query Error[$j]: " . $updateQ[$j] . "<br />" . mysqli_error($conn) . "<br />");
			}
			for ($k = 0; $k < $max; $k++) {
				$updateR = mysqli_query($conn, $updateQ[$k]) or die("Query Error: " . mysqli_query($conn) . "<br />");
				//if ($updateR) echo "Successfully ran query: " . $updateQ[$k] . "<br />";
				$updated = TRUE;
				
			}
		} 

		if (isset($_POST['cat_id'])) {

		echo "<div class='thinborder'>";
	
				//let them choose a section, to navigate away
				$sectionQ = "SELECT cat_id, name FROM sections ORDER BY sec_order";

				$sectionR = mysqli_query($conn, $sectionQ) or die('Error <br/> ' . mysqli_error($conn));
				echo 'please choose section to edit: ';
				echo "<select name='cat_id'>";
				while ($row = mysqli_fetch_row($sectionR)) {
					echo "<option value=" . $row[0] . " " . ( $row[0] == $_POST['cat_id'] ? " selected=selected " : " "  ) . "  >" . $row[1] . "</option>";
				}	
				echo "</select>";
				echo "<input type=submit name=submit value=submit />";
				if ($updated) echo "<span class='updated'>items updated!</span>";


		echo "</div>";



				$cat_id = $_POST['cat_id'];

				//echo "cat id = $cat_id<br />";
					$query = "SELECT i.item_filename, 
							 d.title,
							 d.subtitle,
							 s.name, 
							 d.display_order,
							 d.location, 
							 d.collection, 
							 d.explanation, 
							 d.master,
							 d.medium, 
							 d.dimensions, 
							 d.create_date,
							 d.id,
                                                         i.groups 
						  FROM items i 
						       INNER JOIN item_details d 
						       INNER JOIN sections s 
						       ON i.id = d.id AND i.groups = s.cat_id 
						  WHERE s.cat_id = $cat_id 
						  ORDER BY i.groups, d.display_order";

					$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

					echo "<table id='admin_table'>";

					echo "<th></th>";
					echo "<th>Title</th>";
					echo "<th>Subtitle</th>";
					echo "<th>Section</th>";
					echo "<th>Order</th>";
					echo "<th>Location</th>";
					echo "<th>Collection</th>";
					echo "<th>Explanation</th>";
					echo "<th>From (mastercopy)</th>";
					echo "<th>Medium</th>";
					echo "<th>Size</th>";
					echo "<th>Year</th>";
		//			echo "<th>Item ID</th>";


					$i = 0;
					while($row = mysqli_fetch_row($result)) {

						$base_path = '../imgs/chris';
						$description = $row[1];
						$subtitle = $row[2];
						$groups = $row[13];
						$section_name = $row[3];
						$display_order = $row[4];
						$location = stripslashes($row[5]);
						$collection = stripslashes($row[6]);
						$explanation = stripslashes($row[7]);
						$master = stripslashes($row[8]);
						$medium = $row[9];
						$dimensions = htmlentities($row[10],ENT_COMPAT,"utf-8");
						$create_date = substr($row[11],0,4);
						$id = $row[12];

						echo "<tr>";
						echo "
							<td><img class='admin_thumbnail_image' src=\"" . $base_path . "/" . str_replace(" ","_",$section_name) . "/thumbs/" .  htmlentities($row[0]) . "\" alt='" . $description . "' /></td>
							<td><input type='text' name='descriptionFor[]' value=\"" . $description . "\" /></td>
							<td><input type='text' name='subtitleFor[]' value=\"" . $subtitle . "\" /></td>
							<td>";	
							sectionPicker($section_name);	
						echo "	</td>
							<td><input type='text' name='display_orderFor[]' value=\"" . $display_order . "\" /></input></td>
							<td><input type='text' name='locationFor[]' value=\"" . $location . "\" /></input></td>
							<td><input type='text' name='collectionFor[]' value=\"" . $collection . "\" /></input></td>
							<td><input type='text' name='explanationFor[]' value=\"" . $explanation . "\" /></input></td>
							<td><input type='text' name='masterFor[]' value=\"" . $master . "\" /></input></td>
							<td><input type='text' name='mediumFor[]' value=\"" . $medium . "\" /></input></td>
							<td><input type='text' name='dimensionsFor[]' value=\"" . $dimensions . "\" /></input></td>
							<td><input type='text' name='createDateFor[]' value=\"" . $create_date . "\" /></input><!-- </td>
							<td><label>" . $id . "</label>--><input type='hidden' name='item_id[]' value='" . $id ."' /></td>
							";
						echo "</tr>";
					}
					echo "</table>";
					echo "<input type=submit name=submit value=update />";
				} //close if 'update'
			 else {
		echo "<div>";
	
				//let them choose a section, to navigate away
				$sectionQ = "SELECT cat_id, name FROM sections ORDER BY sec_order";

				$sectionR = mysqli_query($conn, $sectionQ) or die('Error <br/> ' . mysqli_error($conn));
				echo 'choose section please';
				echo "<select name='cat_id'>";
				while ($row = mysqli_fetch_row($sectionR)) {
					echo "<option value=" . $row[0] . " " . ( $row[0] == $_POST['cat_id'] ? " selected=selected " : " "  ) . "  >" . $row[1] . "</option>";
				}	
				echo "</select>";
				echo "<input type=submit name=submit value=submit />";


		echo "</div>";

			}

			echo "</form>";
		
			mysqli_close($conn);

	/****************************************************************/	
		} else {
		//if they're not logged in...
			if (!isset($_GET['login'])) {
			     echo "<div><a href=\"" . $_SERVER['PHP_SELF'] . "?login=1\">Click here to log in</a></div>";
			}
			echo "</div>";//close the header div
		}

		//close out the page
		echo "
			</div>
		</body>
	</html>
	";
	?>
