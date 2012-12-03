<?php 
	include("includes/php/functions_mobile.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Christopher Ruppert</title>
					
		<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>
		<script type="text/javascript" language='javascript'  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
		<script type='text/javascript' language='javascript' src='includes/js/swipe.js'></script>
		<script type='text/javascript' language='javascript' src='http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js'></script>
		<script type='text/javascript' language='javascript' src='includes/js/jquery.thumbnailScroller.js'></script>
		<script type='text/javascript' language='javascript' src='http://dinbror.dk/downloads/jquery.bpopup-0.7.0.min.js'></script>
		<script type='text/javascript' language='javascript' src='includes/js/chris_mobile.js'></script>
		
		<link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace|Raleway|Open+Sans+Condensed:300|Tulpen+One' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" media="all" href="jquery.thumbnailScroller.css" />
		<link type="text/css" rel="stylesheet" media="all" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/cupertino/jquery-ui.css"  />
		<link type='text/css' rel='stylesheet' media='screen and (orientation: portrait)' href='includes/css/style_mobile_white.css'>
		<link type='text/css' rel='stylesheet' media='screen and (orientation: landscape)' href='includes/css/style_mobile_landscape.css'>
		
    	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>	
    	<meta name="apple-mobile-web-app-capable" content="yes" />
    					
	</head>

	<body>
		<div id='main'>
			
			<div id='sig_pane'>				
				<img id='signature' src='imgs/ruppert_signature.png'>
			</div>
			
			<div id='top_pane'>				
			</div>	
			
			<div id='artwork_pane'>				
			</div>						
			
			<div id='section_pane'>
				<script>
					$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
						$('#section_pane').append(data);
						
						var winH = $(window).height();
						var winW = $(window).width();
						
						//$('#main').css({'height': winH + 'px'});
						//alert("orientation: " + window.orientation);
						
						cat_height = winH * .70 / 8;
						cat_height_string = cat_height + "px";
						font_height = cat_height / 1.5;
						font_height_string = font_height + "px";

						$('.section_header').css({"font-size":font_height_string});
						$('.section_header').css({"line-height":cat_height_string});
						
					});
				</script>					
				
			</div>
		</div>
	</body>
</html>