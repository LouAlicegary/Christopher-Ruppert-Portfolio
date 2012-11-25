<?php 
	require_once ('connect.php');

//THIS PHP AJAX CONNECTION IS NECESSARY SO THAT JAVASCRIPT (LOCALLY RUN) CAN INTERACT WITH SQL (ON SERVER)
/// MAIN SWITCH - this is what makes the file work either as an php include or js ajax call. ///
/// if it's not submitted then this file does nothing
if ((isset($_POST['submitted'])) || (isset($_GET['submitted']))) {
	//convert POST vars for easy use, should have been passed in properly
	if (isset($_POST['submitted']))
		foreach ($_POST as $key => $value)
			${$key} = $value; //echo "$$key = $value <br />";
	else
		foreach ($_GET as $key => $value)
			${$key} = $value; //	echo "$$key = $value <br />";

	switch($reason) {
		case 'thumbnails':
			getThumbnails($section_name, $screen_height, $screen_width);
			break;
		case 'sections':
			getSections($artist);
			break;
		case 'details':
			getDetails($image_name);
			break;
		default:
			break;
	}
}

/////////////////
// pull all thumbnails for a section
// 	section name must have no space or special chars.
/////////////////
function getThumbnails($section_name, $screen_height, $screen_width) {

	global $conn;
	//$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2");

	$returnString = "<div id='slider'><ul id='Gallery'>";
	$base_path = '/imgs/chris/' . str_replace(" ","_",$section_name);
	$path_array = explode("/",$base_path);
	
	$query = "select i.item_filename FROM sections s INNER JOIN items i ON i.groups = s.cat_id INNER JOIN item_details d ON i.id = d.id where name = '$section_name' order by d.display_order";
	$result = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));	
	$num_rows = mysqli_num_rows($result);
	
	$screen_ratio = $screen_width / $screen_height;
							
	while ( ($row = mysqli_fetch_row($result)) ) {
		if (strpos($row[0],'.')) {
			$file_string = "http://www.christopherruppert.com" . $base_path . DIRECTORY_SEPARATOR . $row[0];
			
			list($width, $height, $type, $attr) = getimagesize("../.." . $base_path . DIRECTORY_SEPARATOR . $row[0]);
			$painting_ratio = $width / $height;
			
			if ($painting_ratio > $screen_ratio) {
				$size_string = "width=$screen_width";  
			}
			else {
				$size_string = "height=$screen_height";
			}
			
				 
			$returnString .= "<li><img src='$file_string' " . $size_string . " alt='" . $width . "x" . $height . "x" . $screen_height . "x" . $screen_width . "' /></li>";
		}	
	}				
	
	$returnString .= "</ul></div>";
					           			          
	echo $returnString;
}

			


function getSections ($artist) {
		
		global $conn;
	    //$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

		$base_path = "./imgs/$artist";
		$thumb_path = $base_path . "/thumbs";
		$main_img_path = $thumb_path . "/main";

		$returnString = "";
		//get section names from the db
		$query = "SELECT s.name FROM artists a INNER JOIN sections s ON a.id = s.owner WHERE a.name = '$artist' and s.active = 1 order by s.sec_order";
		$result  = mysqli_query($conn,$query) or die("Query Error ($query)<br />" . mysqli_error($conn));
		$returnString .= "<div class='sections'>";
		while ($row = mysqli_fetch_row($result)) { 
			$cleanedSectionName = $row[0];
			$section_name = str_replace(" ","_",$section_name);
			//create the content header
			$returnString .= "
				<div class='section_header' id='$section_name' >
					<h3>$cleanedSectionName</h3>
				</div>";

		}
		$returnString .= "</div>";
		//</div>";
		echo $returnString;
		//return $returnString;  
 
 
 /*	
  	global $conn;
	//$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

		$base_path = "./imgs/$artist";
		$thumb_path = $base_path . "/thumbs";
		$main_img_path = $thumb_path . "/main";

		$returnString = "";
		//get section names from the db
		$query = "SELECT s.name FROM artists a INNER JOIN sections s ON a.id = s.owner WHERE a.name = '$artist' and s.active = 1 order by s.sec_order";
		$result  = mysqli_query($conn,$query) or die("Query Error ($query)<br />" . mysqli_error($conn));
		$returnString .= "<div class='sections'>";
		
		
		
		$row_cnt = $result->num_rows;
		$section_height = 75 / $row_cnt; 
		 
		 
		 
		while ($row = mysqli_fetch_row($result)) { 
			$cleanedSectionName = $row[0];
			$section_name = str_replace(" ","_",$section_name);
			//create the content header
			$returnString .= "
				<div class='section_header' id='$section_name' style='background-color:#00ff00'>
					<h3>$cleanedSectionName + $row_cnt <span class=\"sub_hdr\"></span></h3>
				</div>";
			
		}
		
	$returnString .= "</div>";
	//</div>";

	echo $returnString;
	//return $returnString;

  */
}




//////////////////////////////
// retrieve details by image name
//////////////////////////////
function getDetails($image_name) {

	global $conn;
	//$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2");

	//now create the thumbnails
	$returnString = '';	
	
	//$base_path = '../imgs/chris/' . str_replace(" ","_",$section_name);
	
	$path_array = explode("/",$base_path);
	//echo sizeOf($path_array) . ;
	//must customize for chrises db
	//$query = "SELECT i.item_filename FROM artists a INNER JOIN sections s ON a.id = s.owner INNER JOIN items i ON i.groups = s.cat_id WHERE a.name = '$artist'";
	$query = "SELECT d.title, d.create_date, d.medium, d.dimensions, d.collection, d.location, d.explanation, d.master, d.subtitle
              FROM items i INNER JOIN item_details d ON i.id = d.id WHERE item_filename = \"$image_name\"";

	$result = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
	//echo mysqli_num_rows($result);
	
	while ($row = mysqli_fetch_row($result)) {

		//this checks to see if the filename has an extension, via the dot
		$returnString .= "<div class='image_title'>" . $row[0] . "</div>"  
					   . "<div class='image_subtitle'>" .  $row[8] . "</div>"
					   . "<div class='image_master'>" . ($row[7]?'after ':'') . $row[7] . "</div>"
					   . "<div class='image_create_date'>" .  substr($row[1],0,4) . "</div>"
					   . "<div class='image_medium'>" .  $row[2] . "</div>"
					   . "<div class='image_dimensions'>" .  $row[3] . "</div>"
					   . "<div class='image_collection'>" .  $row[4] . "</div>"
					   . "<div class='image_location'>" .  $row[5] . "</div>"
					   . "<div class='image_explanation'>" .  $row[6] . "</div>";	
	}
	echo $returnString;
}

?>
