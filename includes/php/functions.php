<?php 
	require_once ('connect.php');

/// MAIN SWITCH - this is what makes the file work either as an php include or js ajax call. ///
/// if it's not submitted then this file does nothing

if ((isset($_POST['submitted'])) || (isset($_GET['submitted']))) {

	//convert POST vars for easy use, should have been passed in properly
	if (isset($_POST['submitted'])) {
		foreach ($_POST as $key => $value) {
			${$key} = $value; 
		}
	} 
	else {
		foreach ($_GET as $key => $value) {
			${$key} = $value;
		}
	}
	$return = '';

	switch($reason) {
		case 'thumbnails':
			getThumbnails($section_name, $starting_pic);
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

function getThumbnails($section_name, $starting_pic) {

	global $conn;

	$returnString = '';
	$base_path = '/imgs/chris/' . str_replace(" ","_",$section_name);
	//$path_array = explode("/",$base_path);
	
	$query = "select w.item_filename FROM sections s INNER JOIN works w ON w.groups = s.cat_id where name = '$section_name' order by w.display_order";
    $result = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
	$num_rows = mysqli_num_rows($result);

	$returnString = '<div id="tS3" class="jThumbnailScroller"><div class="jTscrollerContainer"><div class="jTscroller">';
							
	while ( ($row = mysqli_fetch_row($result)) ) {
		if (strpos($row[0],'.')) {
			$file_string = "http://www.christopherruppert.com" . $base_path . "/" . "thumbs" . "/" . $row[0]; 
			$returnString .= "<a href='" . $base_path . "/" . $row[0] . "'><img src='$file_string' /></a>";
		}
	}												
								
	$returnString .= '</div></div><a href="#" class="jTscrollerPrevButton"></a><a href="#" class="jTscrollerNextButton"></a></div>';

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
		//////////2013.04.16///////$query = "SELECT s.name FROM artists a INNER JOIN sections s ON a.id = s.owner WHERE a.name = '$artist' and s.active = 1 order by s.sec_order";
		$query = "SELECT s.name FROM sections s WHERE s.active = 1 order by s.sec_order";
        $result  = mysqli_query($conn,$query) or die("Query Error ($query)<br />" . mysqli_error($conn));
		$returnString .= "<div class='sections'>";
		while ($row = mysqli_fetch_row($result)) { 
			$cleanedSectionName = $row[0];
			$section_name = str_replace(" ","_",$section_name);
			//create the content header
			$returnString .= "<div class='section_header' id='$section_name' ><h3>$cleanedSectionName<span class=\"sub_hdr\"></span></h3></div>";
		}
	$returnString .= "</div>";

	echo $returnString;
}




//////////////////////////////
// retrieve details by image name
//////////////////////////////

function getDetails($image_name) {

	global $conn;

	$returnString = '';	
	
	//$path_array = explode("/",$base_path);
	
	$query = "SELECT title, create_date, medium, dimensions, collection, location, explanation, master, subtitle FROM works WHERE item_filename = \"$image_name\"";
	$result = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
	
	while ($row = mysqli_fetch_row($result)) {
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
