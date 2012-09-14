
$(document).ready(function() {

	//get the sections
	$.post('ie_functions.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
		//alert(data);
		$('#section_pane').append(data);
	});

	var ua = navigator.userAgent,
    	click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";
    	
	$('#up_nav').live(click_event,function(event) {

		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
				
		var str=this.innerHTML;
		var beg=str.search("alt=");
		var end=str.search("\" src");
		var alt_string = str.substr(beg+5,end-beg-5);
		var alt_string_array = alt_string.split(",");
		var startingpic = alt_string_array[0];
		var sectionname = alt_string_array[1];
		startingpic = startingpic-4;
		//alert("UPNAV starting pic: " + startingpic + "section name: " + sectionname );
		
		$.post('ie_functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':sectionname,'starting_pic':startingpic},function(data){
			$('#thumbnail_pane').append(data);
		});
 
	});

	$('#down_nav').live(click_event,function(event) {
		//alert(this.id);
		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
				
		var str=this.innerHTML;
		var beg=str.search("alt=");
		var end=str.search("\" src");
		var alt_string = str.substr(beg+5,end-beg-5);
		var alt_string_array = alt_string.split(",");
		var startingpic = alt_string_array[0];
		var sectionname = alt_string_array[1];
		//alert("DOWNNAV starting pic: " + startingpic + "section name: " + sectionname );
		
		$.post('ie_functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':sectionname,'starting_pic':startingpic},function(data){
			$('#thumbnail_pane').append(data);
		});
 
	});

	
	//get the thumbnails if section name clicked on
	$('.section_header').live(click_event,function(event) {

		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
		var section_name = $(this).children('h3').text();
		//alert("Section Name: " + section_name);

		$.post('ie_functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name, 'starting_pic':'0'},function(data){

			$('#thumbnail_pane').append(data);
			
			var list = document.getElementById("thumbnail_pane").childNodes[1].childNodes[0].innerHTML; //.nodeValue;  //childNodes[0].childNodes[0]
			var beg=list.search("src=");
			var end=list.search("\">");
			var alt_string = list.substr(beg+5,end-beg-5);

			var image_path = alt_string; //$(this).attr('src');
			image_path = image_path.replace('/thumbs','');
			$('#display_pane').append("<div class='spacer'>&nbsp;</div>");
			var tag = "<img src=\"" + image_path  + "\" \>";
			$('#display_pane').append(tag);

			var image_name_array = image_path.split('/'); //basepath(image_path);
			var image_name = image_name_array[image_name_array.length - 1];
	
			//show details of first piece
			$.post('ie_functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
			//alert(data);
				var details = $('#details');
				details.empty();
				details.append("<div class='spacer'>&nbsp;</div>");
				details.append(data);
			});				
		});
 
 		$('#display_pane').empty();
	});


	
	//var pos = $(window).height() - 90;	
	//var cssObj = {'height':pos};
	//$('#thumbnail_pane').css(cssObj);
    //alert($(window).height() + " " + $('#display_pane').height() + " " + $('#thumbnails').height());



	//get the big image on a thumbnail click. boom.	
	$('.thumbnail > a > img').live(click_event,function(event) {
		event.preventDefault();
		event.stopPropagation();

		//clear the pane before the next one comes in.
		$('#display_pane').empty();

		//modify the thumbnail path to point to the big image
		var image_path = $(this).attr('src');
		image_path = image_path.replace('/thumbs','');
		
		//create a tag out of it
		var tag = "<img src=\"" + image_path  + "\" \>";
		$('#display_pane').append("<div class='spacer'>&nbsp;</div>");
		$('#display_pane').append(tag);

		var image_name_array = image_path.split('/'); //basepath(image_path);
		var image_name = image_name_array[image_name_array.length - 1];

		$.post('ie_functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
			var details = $('#details');
			details.empty();
			details.append("<div class='spacer'>&nbsp;</div>");
			details.append(data);
		});
	});


});



$(window).load(function() {

	var ua = navigator.userAgent,
    click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";

	$('.section_header h3:contains("contact")').live(click_event,function(event) {
		event.preventDefault();
		event.stopPropagation();

		$('#display_pane').empty();
		$('#details').empty();
		$('#display_pane').load("./contact.html");
	});
	
	$('#credits').live(click_event,function(data){
		window.location = '../admin/index.php';
	});

    var textareaWidth = $('#thumbnail_pane')[0].scrollWidth;
    $("#thumbnails").css('width',textareaWidth + "px");
				
});