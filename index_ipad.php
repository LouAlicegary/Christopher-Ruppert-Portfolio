<?php 
	include("includes/php/functions_mobile.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Christopher Ruppert - iPad</title>
					
		<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>
		<script type="text/javascript" language='javascript'  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
		<script type='text/javascript' language='javascript' src='includes/js/swipe.js'></script>
		<script type='text/javascript' language='javascript' src='http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js'></script>
		<script type='text/javascript' language='javascript' src='includes/js/jquery.thumbnailScroller.js'></script>
		<script type='text/javascript' language='javascript' src='http://dinbror.dk/downloads/jquery.bpopup-0.7.0.min.js'></script>
		<script type='text/javascript' language='javascript' src='includes/js/chris_ipad.js'></script>
		
		<link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace|Raleway|Open+Sans+Condensed:300|Tulpen+One' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" media="all" href="jquery.thumbnailScroller.css" />
		<link type="text/css" rel="stylesheet" media="all" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/cupertino/jquery-ui.css"  />
		<link type='text/css' rel='stylesheet' media='screen and (orientation: portrait)' href='includes/css/style_mobile_white.css'>
		<link type='text/css' rel='stylesheet' media='screen and (orientation: landscape)' href='includes/css/style_mobile_landscape.css'>
		
    	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>	
    	<meta name="apple-mobile-web-app-capable" content="yes" />
 
 
		<script type="text/javascript">
			$(document).ready(function() {
				
				$("#artwork_pane").hide();
				
				setTimeout( function() { 
						var images = document.getElementsByTagName("img");
						for (i=0; i < images.length; i++) {
							
							pane_ratio = $(window).height() / ($(window).width()*.7);
							image_ratio = images[i].height / images[i].width;
							if ( pane_ratio > image_ratio ) {
								// pic will go 100% width but short height
								oldimagewidth = images[i].width;
								images[i].width = $("#artwork_pane").width();
								images[i].height = images[i].height / (oldimagewidth / $("#artwork_pane").width());
							}
							else {
								// pic will go 100% height but short width
								//alert(images[i].height);
								oldimageheight = images[i].height;
								oldimagewidth = images[i].width;
								images[i].height = $(window).height();
								images[i].width = oldimagewidth / (oldimageheight / $(window).height());
								//alert("old height: " + oldimageheight + " height: " + images[i].height + " old width: " + oldimagewidth + " width: " + images[i].width );
								//alert("yo");
							}	
							
							big_num = $(window).width();
							small_num = images[i].width;
							sections = $(window).width()*.3;
							margin_offset = (big_num - small_num - sections) / 2;
							images[i].style.marginLeft=margin_offset+"px";	
						} 				
				
				
						$(".slideshow").cycle({
							fx: "fade" // choose your transition type, ex: fade, scrollUp, shuffle, etc...
						});
						
						$("#artwork_pane").show();

				} , 1000); 

			/*

			*/													
				
			});
		</script>
		 
    					
	</head>

	<body>
		<div id='main'>
			
			<div id='sig_pane'>				
				<!--<img id='signature' src='imgs/ruppert_signature.png'>-->
			</div>
			
			<div id='top_pane'>				
			</div>	
			
			<div id='artwork_pane'>	
					<div id='slideshow' class='slideshow'>
						<img src='http://www.christopherruppert.com/imgs/chris/original_paintings/12_scarlet.jpg' />
						<img src='http://www.christopherruppert.com/imgs/chris/master_copies/03_picasso_the_embrace.jpg' />
						<img src='http://www.christopherruppert.com/imgs/chris/sculpture_and_performance/09_brothers_breton.jpg'   />
						<img src='http://www.christopherruppert.com/imgs/chris/tattoo/08_Adams_Raspberries.jpg'  />
						<img src='http://www.christopherruppert.com/imgs/chris/recent_work/01_yellow_skull.jpg' />
					</div>
				</div>							
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
						font_height = cat_height / 2;
						font_height_string = font_height + "px";
						//sig_height = winH * .30;
						//sig_height_string = sig_height + "px";
	
						//$('.section_header').css({"height":cat_height_string});
						//$('.section_header').css({"min-height":cat_height_string});
						$('.section_header').css({"font-size":font_height_string});
						$('.section_header').css({"line-height":cat_height_string});
						//$('#signature').css({"height":sig_height_string});
						
					});
				</script>					
				
			</div>
		</div>
		
		
	</body>
</html>