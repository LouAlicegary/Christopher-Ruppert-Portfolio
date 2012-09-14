<?php 
	require_once ('./connect.php');

/////////////////////////
//
// utility functions for creating elements 
// 
// call the file with ajax and  proper thingers and it will make what you want
// or include it and call the functions manually
//
/////////////////////////
 
function page_header() {

	$name = "Christopher Ruppert";
	$first_name = "chris";
	
	echo "
		<!DOCTYPE html>
			<html>
				<head>";
	echo '			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

	echo "			<title>$name</title>
					<link type='text/css' rel='stylesheet' href='css/$first_name.php'>
					<link href='http://fonts.googleapis.com/css?family=Quicksand|Esteban|Junge|Linden+Hill|Exo|Viga|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
					
					<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>
					<!-- <script type='text/javascript' language='javascript' src='includes/jquery.tinyscrollbar.min.js'></script> -->
					<script type='text/javascript' language='javascript' src='js/" . $first_name . ".js'></script>
					<!-- styles needed by jScrollPane -->";

	 echo "	<style type='text/css'>
				{ height: 500px;  margin: auto }
			</style>";
			
			/*
				.slideshow { height: 232px; width: 232px; margin: auto }
				.slideshow img { padding: 15px; border: 1px solid #ccc; background-color: #eee; }
			*/
	echo '		
			<!-- include Cycle plugin -->
			<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
			
			<script type="text/javascript">
				$(document).ready(function() {
				    $(".slideshow").cycle({
						fx: "fade" // choose your transition type, ex: fade, scrollUp, shuffle, etc...
					});
				});
			</script>';

			/*echo '
			<link type="text/css" href="../css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
			<!-- the mousewheel plugin - optional to provide mousewheel support -->
			<script type="text/javascript" src="../includes/jquery.mousewheel.js"></script>
			<!-- the jScrollPane script -->
			<script type="text/javascript" src="../includes/jquery.jscrollpane.min.js"></script>';
			*/

		echo "
				</head>
				<body>";
}

function page_footer() {

	echo "		</body>
			</html>";
}


/////////////////
// pull all thumbnails for a section
// 	section name must have no space or special chars.
/////////////////
function getThumbnails($section_name, $starting_pic) {

	global $conn;
	$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

	//now create the thumbnails
	$returnString = '';
	$base_path = '/ruppert/imgs/chris/' . str_replace(" ","_",$section_name);
	$path_array = explode("/",$base_path);
	$query = "select i.item_filename FROM sections s INNER JOIN items i ON i.groups = s.cat_id INNER JOIN item_details d ON i.id = d.id where name = '$section_name' order by d.display_order";
	$result = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));	
	
	//echo sizeOf($path_array) . ;
	//must customize for chrises db
	//$query = "SELECT i.item_filename FROM artists a INNER JOIN sections s ON a.id = s.owner INNER JOIN items i ON i.groups = s.cat_id WHERE a.name = '$artist'";
	//echo mysqli_num_rows($result);
	
	$num_rows = mysqli_num_rows($result);
	//echo $num_rows;
	//echo $starting_pic;
	if ($num_rows - $starting_pic < 4) {
		$starting_pic = $num_rows - 4;
	}
	
	$returnString .= "<div id='up_nav' class='nav_button'><img id='' alt='$starting_pic,$section_name' src=\""  .  "imgs/up.png" . "\" /></div>";
	
	$counter = 0;
	$break_flag = 0;
	$overall_height = 0;
	
	while ( ($row = mysqli_fetch_row($result)) && ($break_flag != 1) ) { // && $break_flag != 1
		if ($counter < $starting_pic) {}
		
		else {
			
		
		//echo $row;
	
			if (strpos($row[0],'.')) {
				$file_string = "http://www.loualicegary.com" . $base_path . DIRECTORY_SEPARATOR . $row[0];
				//echo $file_string;
				$result_array = getimagesize($file_string);	
				$overall_height += 80 * ($result_array[1] / $result_array[0]);	
				
				if (($overall_height < 480) ) {
					
					$returnString .= "<div class='thumbnail'><a href='" 
							. $base_path . DIRECTORY_SEPARATOR . $row[0]
							. "'><img id='thumb$counter' src=\""  
							.  $base_path . DIRECTORY_SEPARATOR . "thumbs" . DIRECTORY_SEPARATOR . $row[0]
							. "\" /></a></div>";					
				}
				else {
					$break_flag = 1;
					
				}	

							//	echo "."; 
							//$file_string = "http://www.loualicegary.com" . $base_path . DIRECTORY_SEPARATOR . $row[0];
							//echo $file_string;
							//$result_array = getimagesize($file_string);
							//echo $result_array[0]."x".$result_array[1];
							//echo " x ";
							//echo $result_array[1];
			}
	
		}
		
		$counter = $counter + 1;
	
	}

	$max_count = $counter-1;
	$returnString .= "<div id='down_nav' class='nav_button'><img id='' alt='$max_count,$section_name' src=\""  .  "imgs/down.png" . "\" /></div>";
	//$returnString .= "<div class='thumbnail'><img id='' src=\""  .  "imgs/down.png" . "\" /></div>";
	
	echo $returnString;

}

function sectionPicker($section_name) {

	global $conn;
	$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

		$query = "select name,cat_id from sections";
		//echo $query;
		$result = mysqli_query($conn, $query) or die ("Section Picker Error " . mysqli_error($conn));
		//echo mysqli_num_rows($result);

		echo "<select  name='groupsFor[]'>";

		while ($row = mysqli_fetch_row($result)) {

			echo "<option value=" . $row[1] . ($section_name == $row[0] ? " selected=selected " :" " ) .  ">" . substr($row[0],0,9) . (strlen($row[0])>9?'...':'')  .  "</option>";

			}
		echo "		</select>";

}


function getSections ($artist) {
	global $conn;
	$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

		$base_path = "./ruppert/imgs/$artist";
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
					<h3>$cleanedSectionName<span class=\"sub_hdr\"></span></h3>
			</div>";

/*			echo "
<!-- <img class='side_image' src=\"$main_img_path/" . $main_img->getFileName()  . "\" /> -->
";*/

		}
//		echo "<noscript>";
//			createThumbnails($base_path); //to be created and added later with jquery+ajax
//		echo "</noscript>";

	$returnString .= "</div>
	</div>";

	echo $returnString;
	//return $returnString;
}

//////////////////////////////
// retrieve details by image name
//////////////////////////////
function getDetails($image_name) {

	global $conn;
$conn = mysqli_connect("localhost","sweetlou_ruppert","ruppert","sweetlou_ruppert2") ;

	//now create the thumbnails
	$returnString = '';	
	
	//$base_path = '../imgs/chris/' . str_replace(" ","_",$section_name);
	
	$path_array = explode("/",$base_path);
//echo sizeOf($path_array) . ;
	//must customize for chrises db
	//$query = "SELECT i.item_filename FROM artists a INNER JOIN sections s ON a.id = s.owner INNER JOIN items i ON i.groups = s.cat_id WHERE a.name = '$artist'";
	$query = "SELECT d.title, 
                         d.create_date, 
                         d.medium, 
                         d.dimensions, 
                         d.collection, 
                         d.location,
                         d.explanation,
                         d.master,
			 d.subtitle
                  FROM items i INNER JOIN item_details d 
                  ON i.id = d.id 
                  WHERE item_filename = \"$image_name\"";

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


//echo 'TESTING';


/// MAIN SWITCH - this is what makes the file work either as an php include or js ajax call. ///
if ((isset($_POST['submitted'])) || (isset($_GET['submitted']))) {
//if it's not submitted then this file does nothing

//echo '<script type="text/javascript">window.alert("Sorry, we only allow uploading GIF images")</script>';
//echo 'TESTING123';

	//convert POST vars for easy use, should have been passed in properly
	if (isset($_POST['submitted'])) {
		//echo "post <br />";
		foreach ($_POST as $key => $value) {
			${$key} = $value;
			//echo "$$key = $value <br />";
		}
	} else {
		//echo "Get <br />";
		foreach ($_GET as $key => $value) {
			${$key} = $value;
//			echo "$$key = $value <br />";
		}
	}

	$return = '';
	$base_dir = '../imgs/'. $base_dir;

//echo $base_dir;

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
		case 'sectionPicker':
			sectionPicker($section_name);
			break;
		default:
			break;

	}//end switch

}//end submitted

//mysqli_close($conn); 
//echo "outside";

?>
