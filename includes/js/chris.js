
$(document).ready(function() {
	
	//get the sections
	$.post('includes/php/functions.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
		$('#section_pane').append(data);
	});

	var ua = navigator.userAgent;
    var click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";
    	
	
	//get the thumbnails if section name clicked on
	$('.section_header').live(click_event,function(event) {

		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
		var section_name = $(this).children('h3').text();
		
		$('.section_header h3:contains("contact")').css("color","#000000");
		$('.section_header').css("color","#000000");
		$(this).css("color","#BB0000");

		$.post('includes/php/functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name, 'starting_pic':'0'},function(data){

			$('#thumbnail_pane').append(data);
			
			var tds = document.getElementById("thumbnail_pane").getElementsByTagName("a");
			
			for (ct=0; ct < tds.length; ct++) {
				var list = tds[ct].innerHTML;
				var beg=list.search("src=");
				var end=list.search("\">");
				var alt_string = list.substr(beg+5,end-beg-5);
	
				var image_path = alt_string;
				(new Image).src = image_path;				
			}

			var t=setTimeout(function(){$("#tS3").thumbnailScroller({scrollerType:"clickButtons",scrollerOrientation:"vertical",scrollSpeed:2,scrollEasing:"easeOutCirc",scrollEasingAmount:600,acceleration:4,scrollSpeed:800,noScrollCenterSpace:10,autoScrolling:0,autoScrollingSpeed:2000,autoScrollingEasing:"easeInOutQuad",autoScrollingDelay:2000});},2000)
			
			var list = tds[0].innerHTML;
			var beg=list.search("src=");
			var end=list.search("\">");
			var alt_string = list.substr(beg+5,end-beg-5);

			var image_path = alt_string; //$(this).attr('src');
			image_path = image_path.replace('/thumbs','');
			$('#display_pane').append("<div class='spacer'>&nbsp;</div>");
			var tag = "<img id=\"big_image\" src=\"" + image_path  + "\" \>";
			$('#display_pane').append(tag);

			var image_name_array = image_path.split('/'); //basepath(image_path);
			var image_name = image_name_array[image_name_array.length - 1];
	
			//show details of first piece
			$.post('includes/php/functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
				var details = $('#details');
				details.empty();
				details.append("<div class='spacer'>&nbsp;</div>");
				details.append(data);
			});		
			
			
			$("#big_image").load(function() {
        		var big_wid = $('#display_pane').width();
        		var small_wid = $(this).width();
        		var the_wid = big_wid - small_wid - 10; // -10 for buffer between desc and pic
        		$('#details').css({ 'margin-left': -the_wid });
    		});
    				
		});
 
	});

	//get the big image on a thumbnail click
	$(' a > img').live(click_event,function(event) { //.thumbnail >

		event.preventDefault();
		event.stopPropagation();

		//clear the pane before the next one comes in.
		$('#display_pane').empty();

		//modify the thumbnail path to point to the big image
		var image_path = $(this).attr('src');
		image_path = image_path.replace('/thumbs','');
		
		//create a tag out of it
		var tag = "<img id=\"big_image\" src=\"" + image_path  + "\" \>";
		$('#display_pane').append("<div class='spacer'>&nbsp;</div>");
		$('#display_pane').append(tag);

		var image_name_array = image_path.split('/'); //basepath(image_path);
		var image_name = image_name_array[image_name_array.length - 1];

		$.post('includes/php/functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
			var details = $('#details');
			details.empty();
			details.append("<div class='spacer'>&nbsp;</div>");
			details.append(data);
		});
		
		$("#big_image").load(function() {
        	var big_wid = $('#display_pane').width();
        	var small_wid = $(this).width();
        	var the_wid = big_wid - small_wid - 10; // -10 for buffer between desc and pic
        	//alert("big " + big_wid + " small " + small_wid + " the " + the_wid);
        	$('#details').css({ 'margin-left': -the_wid });
    	});
		
	});

});



$(window).load(function() {

	//alert("here");

	var ua = navigator.userAgent;
    var click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";


	$('.section_header h3:contains("contact")').live(click_event,function(event) {
		event.preventDefault();
		event.stopPropagation();

		$('#display_pane').empty();
		$('#details').empty();
		//$('#display_pane').append('<div style="height: 100px">Christopher Ruppert</div><div style="height: 100px"><div style="display: inline"><a href="mailto:c.ruppert@christopherruppert.com"><img src="http://www.loualicegary.com/ruppert/imgs/96_black_email.png" alt="" /></a></div><div style="display: inline; height: 100px; line-height: 100px; vertical-align: middle">c.ruppert@christopherruppert.com</div></div><div style="height: 100px"><a href="http://www.facebook.com/ruppertchristopher"><img src="http://www.loualicegary.com/ruppert/imgs/96_black_facebook.png" alt="" /></a>Christopher Ruppert</div><div style="height: 100px"><img src="http://www.loualicegary.com/ruppert/imgs/96_black_telephone.png" alt="" />+1 (503) 555-1212</div><div style="height: 100px"><img src="http://www.loualicegary.com/ruppert/imgs/96_black_globe.png" alt="" />Portland, Oregon, USA</div>');
		$('#thumbnail_pane').empty();
		
		$('.section_header').css("color","#000000");
		$(this).css("color","#BB0000");
		
	
		
		$('#display_pane').load('includes/php/contact_mobile.php');
		$('#display_pane').hide();
		setTimeout( function(){ 
			fonth = $(window).height()/30 + "px";
			lineh = $(window).height()/15 + "px";
			
			$("#commissions").css({"line-height":lineh});
			$("#commissions").css({"font-size":fonth});	
			$('#display_pane').show();
		} , 500);

	});

	$('#signature').live(click_event,function(event) {
		window.location = 'index.php';
	});

    var textareaWidth = $('#thumbnail_pane')[0].scrollWidth;
    $("#thumbnails").css('width',textareaWidth + "px");
				
});