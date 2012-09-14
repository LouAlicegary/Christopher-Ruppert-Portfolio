<?php 
	$artist = 'chris';
	$name = "Christopher Ruppert";
	$first_name = "chris";
	
	include("ie_functions.php"); //"./includes/functions.php"
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> <?php $name ?> </title>
		
		<link type='text/css' rel='stylesheet' href='ie_css.css'>
		<link href='http://fonts.googleapis.com/css?family=Quicksand|Esteban|Junge|Linden+Hill|Exo|Viga|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
					
		<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>
		<script type='text/javascript' language='javascript' src='ie_chris.js'></script>
		
		 <!--include Cycle plugin -->
		<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
			
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
			<div id='artist_name'>Christopher Ruppert</div>
			
			<div id='section_pane'>
				<!--<div class='spacer'>&nbsp;</div>-->
				<!--<div id='credits'>
					site design by<br />
					steve hughes / lou alicegary (2012)
				</div>-->
			</div>
		
			<div id='thumbnails'>
				<!--<div class='spacer'>&nbsp;</div>-->
				<div id='thumbnail_pane'></div>
			</div>
			
			<div id='display_pane' class='display_pane'>
				<div class='spacer'>&nbsp;</div>
				<div id='slideshow' class='slideshow'>
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/original_paintings/02_mabel.jpg' style='position: relative;' />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/master_copies/03_picasso_the_embrace.jpg' />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/sculpture_and_performance/09_brothers_breton.jpg'   />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/tattoo/10_Peony_for_Meadow.jpg'  />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/early_work/bullfight.jpg' />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/recent_work/01_yellow_skull.jpg' />
				</div>
			</div>
		
			<div id='details_pane'>
				<!--<div class='spacer'>&nbsp;</div>-->
				<div id='details'></div>
				<div id='links'></div>
			</div>
					
		</div>
	</body>
</html>