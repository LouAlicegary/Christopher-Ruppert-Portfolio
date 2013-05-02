<?php 
	$artist = 'chris';
	$name = "Christopher Ruppert";
	$first_name = "chris";
	
	include("includes/php/functions.php");

	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
  		header('Location: http://christopherruppert.com/index_ipad.php');
  		exit();
	}
	if(stripos($ua,'iP') !== false) { // && stripos($ua,'mobile') !== false) {
  		header('Location: http://christopherruppert.com/index_ipad.php');
  		exit();
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> <?php echo $name ?> </title>
		
		<link type='text/css' rel='stylesheet' href='includes/css/style.css'>
		<link href="jquery.thumbnailScroller.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace|Raleway|Open+Sans+Condensed:300|Tulpen+One' rel='stylesheet' type='text/css'>
						
		<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>
		<script type='text/javascript' language='javascript' src='includes/js/chris.js'></script>
		<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
		
		<script src="includes/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script src="includes/js/jquery.thumbnailScroller.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$(".slideshow").cycle({
					fx: "fade" // choose your transition type, ex: fade, scrollUp, shuffle, etc...
				});
				
			});
		</script>
		
	</head>
	
	<body>
		<div id='main'>
			<div id='top_pane'></div>
			
			<div id='section_pane'>
				<img id="signature" src="imgs/ruppert_signature.png" width="260">
				<!--<div id='artist_name'>Christopher Ruppert</div>-->
				<!--<div class='spacer'>&nbsp;</div>-->
				<!--<div id='credits'>
					site design by<br />
					steve hughes / lou alicegary (2013)
				</div>-->
			</div>
		
			<div id='thumbnails'>
				<!--<div class='spacer'>&nbsp;</div>-->
				<div id='thumbnail_pane' class='thumbnail_pane'>

				</div>
			</div>
			
			<div id='display_pane' class='display_pane'>
				<div class='spacer'>&nbsp;</div>
				<div id='slideshow' class='slideshow'>
					<img src='http://www.christopherruppert.com/imgs/chris/original_paintings/12_scarlet.jpg' />
					<img src='http://www.christopherruppert.com/imgs/chris/master_copies/03_picasso_the_embrace.jpg' />
					<img src='http://www.christopherruppert.com/imgs/chris/sculpture_and_performance/09_brothers_breton.jpg'   />
					<img src='http://www.christopherruppert.com/imgs/chris/tattoo/09_Adams_Raspberries.jpg'  />
					<img src='http://www.christopherruppert.com/imgs/chris/recent_work/01_yellow_skull.jpg' />
				</div>
			</div>
		
			<div id='details_pane'>
				<!--<div class='spacer'>&nbsp;</div>-->
				<div id='details'></div>
				<div id='links'></div>
			</div>
					
		</div>
		
<script>
//jQuery.noConflict();

(function($){
window.onload=function(){
        $("#tS3").thumbnailScroller({
        scrollerType:"clickButtons",
        scrollerOrientation:"vertical",
        scrollSpeed:2,
        scrollEasing:"easeOutCirc",
        scrollEasingAmount:600,
        acceleration:4,
        scrollSpeed:800,
        noScrollCenterSpace:10,
        autoScrolling:0,
        autoScrollingSpeed:2000,
        autoScrollingEasing:"easeInOutQuad",
        autoScrollingDelay:500
    });
}
})(jQuery);
</script>



	</body>
</html>