
$(document).ready(function() {

	var ua = navigator.userAgent, click_event = (ua.match(/iPad/i) || ua.match(/iPhone/i)) ? "touchstart" : "click";
	
	if (click_event == "touchstart") {
		function stopScrolling( touchEvent ) { touchEvent.preventDefault(); }
		document.addEventListener( 'touchstart' , stopScrolling , false );
		document.addEventListener( 'touchmove' , stopScrolling , false );			
	}		
	
	var iname;
	
	var state = 0;
	
	var slide_num;
	
	var winH = $(window).height();
	var winW = $(window).width();
	var ratio = winH/winW;
	
	//alert("bababooey");	
		
	//get the thumbnails if section name clicked on
	$('.section_header').live(click_event,function(event) {

		var section_name = $(this).children('h3').text();
		var image_path = section_name.replace(" ", "_");
		image_path = "imgs/chris/" + image_path + "/";
		
		slide_num = 1;
		
		state = 1;
		
		var section_pane = $('#section_pane');
		var top_pane = $('#top_pane');
		var sig_pane = $('#sig_pane');
		var artwork_pane = $('#artwork_pane');
		
		if (window.orientation == 0) {
			sig_pane.hide();
			section_pane.hide();
			top_pane.empty();
			top_pane.show();
			artwork_pane.empty();
			artwork_pane.show();
		}
		else{
			artwork_pane.empty();
			artwork_pane.show();
		}

		
		if (section_name == "contact and commissions") {
			artwork_pane.load('includes/php/contact_mobile.php');
			
				//var top_string = "<div class='top_nav_icon' id='home_icon'><img src='imgs/home.png'></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>contact information</div><div class='top_nav_icon' id='info_icon'><!--<img src='imgs/info.png'></div>";
				//var top_string = "<div class='top_nav_icon' id='home_icon'><img src='imgs/home.png'></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>contact information</div><div class='top_nav_icon' id='info_icon'><img src='imgs/info.png'></div>";	
				//var top_string = "<div id='top_nav_writing'><h2>christopher ruppert</h2><br>contact information</div>";	
				var top_string = "<div id='home_icon'><img src='imgs/home.png'></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>contact information</div><div id='blank_icon'><img src='imgs/blank.png'></div>";	
				
				top_pane.append(top_string);
				
				//$('#top_pane').append(winH + "->" + cat_height_string);
				//$('#top_pane').css({"height":top_pane_height_string});
				//$('#top_pane').css({"min-height":top_pane_height_string});
				font_height = winH * .1 / 3;
				font_height_string = font_height + "px";
				$('#top_pane').css({"font-size":font_height_string});
				$('#top_pane').css({"line-height":font_height_string});
				//$('#top_pane').css({"background-color":"black"});
				//$('#top_pane').css({"color":"white"});
				top_nav_width = winW - (.2 * winH) - 81; // 20px margin x 2 sides x 2 icons + 1px
				top_nav_width_string = top_nav_width + "px";
				$('#top_nav_writing').css({"width":top_nav_width_string});
				//$('#section_pane').css({"height":section_pane_height_string});
				//$('#section_pane').css({"min-height":section_pane_height_string});
		}
		else {
			top_pane.empty();
			$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name, 'screen_height': (winH *.9), 'screen_width':winW},function(data){
				//alert(data);
				artwork_pane.append(data);
				setTimeout( function(){ 
					
						var images = document.getElementsByTagName("img");
						for (i=1; i < images.length; i++) {
							big_num = $('#artwork_pane').height();
							small_num = images[i].height;
							margin_offset = (big_num - small_num) / 2;
							images[i].style.marginTop=margin_offset+"px";							
						}

					
						var index_b = data.indexOf(".jpg") + 4;
						var cut_string = data.substring(0,index_b);
						var index_a = cut_string.lastIndexOf("/");
						var good_string = cut_string.substring(index_a+1,cut_string.length);				
						iname = good_string;
										
						var total_paintings_string= data.match(/<li>/g);  
						var total_paintings = total_paintings_string.length;
						
						//var top_string = "<div class='top_nav_icon' id='home_icon'><img src='imgs/home.png' height=" + winH*.1 + " width=" + winH*.1 + "></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>" + section_name + " (1 of " + total_paintings + ")</div><div class='top_nav_icon' id='info_icon'><img src='imgs/info.png' height=" + winH*.1 + " width=" + winH*.1 + "></div>";
						var top_string = "<div class='top_nav_icon' id='home_icon'><!--<img src='imgs/home.png'>--></div><div id='top_nav_writing'><h2>christopher ruppert</h2><br>" + section_name + " (" + slide_num + " of " + total_paintings + ")</div><div class='top_nav_icon' id='info_icon'><!--<img src='imgs/info.png'>--></div>";				
						top_pane.append(top_string);
						
						
						window.mySwipe = new Swipe(document.getElementById('slider'), {
							startSlide: 0, speed: 400, auto: 0,
							callback: function(event, index, elem) {
								//top_pane.empty();
								slide_num = index+1;
								
								var the_string = elem.innerHTML;
								var index_b = the_string.indexOf(".jpg") + 4;
								var cut_string = the_string.substring(0,index_b);
								var index_a = cut_string.lastIndexOf("/");
								var good_string = cut_string.substring(index_a+1,cut_string.length);
								iname = good_string;
								//top_pane.append("<h2>christopher ruppert - " + section_name + "<br></h2> - image " + (index+1) + " of " + total_paintings + " -");
								$('#top_nav_writing').html("<h2>christopher ruppert</h2><br>" + section_name + " (" + slide_num + " of " + total_paintings + ")");
								
								$('#dar').remove();
								
							}
						});
																		
						font_height = winH * .1 / 3;
						font_height_string = font_height + "px";
						$('#top_pane').css({"font-size":font_height_string});
						$('#top_pane').css({"line-height":font_height_string});
						
					}, 
				500);	
	
			});			
		} 
	
	});
	
	$('#slider').live(click_event,function(event) {
		window.mySwipe.next();
	});
	
	
	$('#home_icon').live(click_event,function(event) {
		$('#sig_pane').show(); 
		$('#section_pane').show();
		$('#top_pane').hide(); 
		$('#artwork_pane').hide();
		$('#artwork_pane').empty();
		state = 0;
	});
	
	
	$('#info_icon').live(click_event,function(event) {
		var images = document.getElementsByTagName("img");
		//alert(images.length);
		//myindex = slide_num + 2;
		big_num = $(window).width();
		small_num = images[slide_num].width;
		details_offset = (big_num - small_num) / 2;
		//var baba = images[3].width;
		//alert(baba);
		//alert($('#slider').width());
		
		var dataa = "<div id='dar' title='Basic dialog'>"; //Mabel<br>2003<br>oil on canvas<br>21\" x 26\"<br>Artist's Collection<br>Neighbor and Model from Bolton Hill, Baltimore</div>";
		$.post('includes/php/functions_mobile.php',{'submitted':'submitted','reason':'details','image_name':iname},function(data){
			dataa = dataa + data;
			$('#artwork_pane').append(dataa);
			$('#dar').bPopup({opacity: 0, modal: false, position: [-details_offset,winH/10]}); //dialog({resizable: false, width: "100%"}); //appendTo: '#slider'
			//$('#dar').css({'width':small_num+"Px"});
			setTimeout( function(){ $('#dar').remove()  } , 2500); //bPopup().close();
		});
		
	});
	
	window.onresize = function() {
		//your code
		//alert('resize');
		winW = $(window).width();
		winH = $(window).height();

		//alert("MAIN: " + $('#main').height() + " SLIDER: " + $('#slider').height());
		
		if (window.orientation == 0) {
			if (state == 0) {
				$('#top_pane').hide(); 
				$('#artwork_pane').hide();
				$('#sig_pane').show(); 
				$('#section_pane').show();
				//alert('90->0sections sig_pane: ' + $('#sig_pane').height() + ' section_pane: ' + $('#section_pane').height() + ' winH: ' + winH + ' orientation: ' + window.orientation); 
			} 
			else {
				$('#sig_pane').hide(); 
				$('#section_pane').hide();
				$('#top_pane').show(); 
				$('#artwork_pane').show();
				//alert('90->0 + paintings'); 
			} 
		}
		else {
			if (state == 0) {
				$('#top_pane').hide(); 
				$('#sig_pane').show(); 
				$('#section_pane').show();
				$('#artwork_pane').show();
				//alert('0->90sections sig_pane: ' + $('#sig_pane').height() + ' section_pane: ' + $('#section_pane').height() + ' winH: ' + winH + ' orientation: ' + window.orientation); 
			} 
			else {
				$('#top_pane').hide(); 
				$('#sig_pane').show(); 
				$('#section_pane').show();
				$('#artwork_pane').show();
				//alert('0->90 + paintings'); 
			}
		}

		cat_height = winH * .70 / 8;
		cat_height_string = cat_height + "px";
		font_height = cat_height / 1.5;
		font_height_string = font_height + "px";
		$('.section_header').css({"font-size":font_height_string});
		$('.section_header').css({"line-height":cat_height_string});		
	
		font_height = winH * .1 / 3;
		font_height_string = font_height + "px";
		$('#top_pane').css({"font-size":font_height_string});
		$('#top_pane').css({"line-height":font_height_string});

		//alert("boost");
						
						var images = document.getElementsByTagName("img");
						for (i=1; i < images.length; i++) {
							big_num = $('#artwork_pane').height();
							small_num = images[i].height;
							margin_offset = (big_num - small_num) / 2;
							images[i].style.marginTop=margin_offset+"px";							
						}
						
	
	}
	
	
});

$(window).load(function() {

	/*var ua = navigator.userAgent, click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";*/
				
});

