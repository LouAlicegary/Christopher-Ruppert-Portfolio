
$(document).ready(function() {
	

	var iname;
	
	var ua = navigator.userAgent, click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";
    	
	//get the thumbnails if section name clicked on
	$('.section_header').live(click_event,function(event) {

		var section_name = $(this).children('h3').text();
		var image_path = section_name.replace(" ", "_");
		image_path = "imgs/chris/" + image_path + "/";
		
		var section_pane = $('#section_pane');
		var top_pane = $('#top_pane');
		top_pane.empty();
		section_pane.empty();
		
		
		var winH = $(window).height();
		var winW = $(window).width();
			
		painting_height = winH * .90;
		painting_height_string = painting_height + "px";
		painting_width = winW;
		
		top_pane_height = winH * .1;
		top_pane_height_string = top_pane_height + "px";
		section_pane_height = winH * .9;
		section_pane_height_string = section_pane_height + "px";
		font_height = top_pane_height / 3;
		font_height_string = font_height + "px";
		sig_height = winH * .1;
		sig_height_string = sig_height + "px";	
		top_nav_width = winW - (.2 * winH) - 81; // 20px margin x 2 sides x 2 icons + 1px
		top_nav_width_string = top_nav_width + "px";
		

		
		if (section_name == "contact") {
			section_pane.load('includes/php/contact_mobile.php');
			
				var top_string = "<div class='top_nav_icon' id='home_icon'><img src='imgs/home.png' height=" + winH*.1 + " width=" + winH*.1 + "></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>contact information</div><div class='top_nav_icon' id='info_icon'><!--<img src='imgs/info.png' height=" + winH*.1 + " width=" + winH*.1 + ">--></div>";
				top_pane.append(top_string);
				
				//$('#top_pane').append(winH + "->" + cat_height_string);
				$('#top_pane').css({"height":top_pane_height_string});
				$('#top_pane').css({"min-height":top_pane_height_string});
				$('#top_pane').css({"font-size":font_height_string});
				$('#top_pane').css({"line-height":font_height_string});
				$('#top_pane').css({"background-color":"black"});
				$('#top_pane').css({"color":"white"});
				$('#top_nav_writing').css({"width":top_nav_width_string});
				$('#section_pane').css({"height":section_pane_height_string});
				$('#section_pane').css({"min-height":section_pane_height_string});
		}
		else {
			top_pane.empty();
			$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name, 'screen_height':painting_height, 'screen_width':painting_width},function(data){
				//alert(data);
				section_pane.append(data);
				
				var index_b = data.indexOf(".jpg") + 4;
				var cut_string = data.substring(0,index_b);
				var index_a = cut_string.lastIndexOf("/");
				var good_string = cut_string.substring(index_a+1,cut_string.length);
				
				iname = good_string;
				
				
				var total_paintings_string= data.match(/<li>/g);  
				var total_paintings = total_paintings_string.length;
				
				var top_string = "<div class='top_nav_icon' id='home_icon'><img src='imgs/home.png' height=" + winH*.1 + " width=" + winH*.1 + "></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>" + section_name + " (1 of " + total_paintings + ")</div><div class='top_nav_icon' id='info_icon'><img src='imgs/info.png' height=" + winH*.1 + " width=" + winH*.1 + "></div>";
				top_pane.append(top_string);
				
				
				window.mySwipe = new Swipe(document.getElementById('slider'), {
					startSlide: 0, speed: 400, auto: 0,
					callback: function(event, index, elem) {
						//top_pane.empty();
						
						var the_string = elem.innerHTML;
						var index_b = the_string.indexOf(".jpg") + 4;
						var cut_string = the_string.substring(0,index_b);
						var index_a = cut_string.lastIndexOf("/");
						var good_string = cut_string.substring(index_a+1,cut_string.length);
						iname = good_string;
						//top_pane.append("<h2>christopher ruppert - " + section_name + "<br></h2> - image " + (index+1) + " of " + total_paintings + " -");
						$('#top_nav_writing').html("<h2>christopher ruppert</h2><br>" + section_name + " (" + (index+1) + " of " + total_paintings + ")");
						
						//$('#dar').bPopup().close();
						$('#dar').remove();
					}
				});
				
					top_pane_height = winH * .1;
					top_pane_height_string = top_pane_height + "px";
					section_pane_height = winH * .9;
					section_pane_height_string = section_pane_height + "px";
					font_height = top_pane_height / 3;
					font_height_string = font_height + "px";
					sig_height = winH * .1;
					sig_height_string = sig_height + "px";	
					top_nav_width = winW - (.2 * winH) - 81; // 20px margin x 2 sides x 2 icons + 1px
					top_nav_width_string = top_nav_width + "px";
					
					//$('#top_pane').append(winH + "->" + cat_height_string);
					$('#top_pane').css({"height":top_pane_height_string});
					$('#top_pane').css({"min-height":top_pane_height_string});
					$('#top_pane').css({"font-size":font_height_string});
					$('#top_pane').css({"line-height":font_height_string});
					$('#top_pane').css({"background-color":"black"});
					$('#top_pane').css({"color":"white"});
					$('#signature').css({"height":sig_height_string});
					$('#top_nav_writing').css({"width":top_nav_width_string});
					$('#section_pane').css({"height":section_pane_height_string});
					$('#section_pane').css({"min-height":section_pane_height_string});
					$('#section_pane').css({"background-color":"black"});
					$('#slider').css({"height":section_pane_height_string});
			
			});			
		}

		
	});
	
	
	$('#home_icon').live(click_event,function(event) {
		window.location.reload();
	});
	
	$('#info_icon').live(click_event,function(event) {
		
		var dataa = "<div id='dar' title='Basic dialog'>"; //Mabel<br>2003<br>oil on canvas<br>21\" x 26\"<br>Artist's Collection<br>Neighbor and Model from Bolton Hill, Baltimore</div>";
		$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'details','image_name':iname},function(data){
			dataa = dataa + data;
			$('#section_pane').append(dataa);
			$('#dar').bPopup({position: [0, $(document).height()/10], opacity: 0, modal: false}); //dialog({resizable: false, width: "100%"}); //
			setTimeout( function(){ $('#dar').remove()  } , 2500); //bPopup().close();
			
			//alert(data)
		});
		
	});
	
	/*
	window.addEventListener("orientationchange", function() {
	  // Announce the new orientation number
	  if (window.orientation == "0") {
			window.location = "index_mobile.php";	  	
	  }
	  else {
	  		$('#main').empty();
	  		$('#main').append("<img src='imgs/ruppert_signature.png'>");
	  }
	});		
	*/


});

$(window).load(function() {

	var ua = navigator.userAgent,
    click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";
				
});

