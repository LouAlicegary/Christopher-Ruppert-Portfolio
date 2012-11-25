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
		<link href="jquery.thumbnailScroller.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/cupertino/jquery-ui.css" type="text/css" media="all" />
		<link type='text/css' rel='stylesheet' href='includes/css/style_mobile.css'>
					
	</head>

	<body>
		<div id='main'>
			
			<div id='top_pane'>				
				<img id='signature' src='imgs/ruppert_signature.png'>
			</div>
			
			<div id='section_pane'>
				<script>
					$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
						$('#section_pane').append(data);

						var winW = $(window).width(); 
						var winH = $(window).height(); 
						
						cat_height = winH * .70 / 8;
						cat_height_string = cat_height + "px";
						font_height = cat_height / 1.5;
						font_height_string = font_height + "px";
						sig_height = winH * .30;
						sig_height_string = sig_height + "px";
	
						$('.section_header').css({"height":cat_height_string});
						$('.section_header').css({"min-height":cat_height_string});
						$('.section_header').css({"font-size":font_height_string});
						$('.section_header').css({"line-height":cat_height_string});
						$('#signature').css({"height":sig_height_string});

					});
				</script>					
				
			</div>
		</div>
	</body>
</html>