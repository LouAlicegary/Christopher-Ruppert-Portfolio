$(document).ready(function() {
//$('#thumbnail_pane.scroll_pane').jScrollPane(function(){alert('hi');});

	var ua = navigator.userAgent,
    click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";

	//get the sections
	$.post('../includes/functions.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
//alert(data);
		$('#section_pane').append(data);
	});


//	$('#thumbnail_pane').jScrollPane();

	//get the thumbsnails
	$('.section_header').live(click_event,function(event) {

		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
		var section_name = $(this).children('h3').text();

		$.post('../includes/functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name},function(data){
//alert(data);
			$('#thumbnail_pane').append(data);
		});

	});
	
	var pos = $(window).height() - 90;	

	var cssObj = {
			'height':pos
		}

	$('#thumbnail_pane').css(cssObj);


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
		$('#display_pane').append(tag);

		var image_name_array = image_path.split('/'); //basepath(image_path);
		var image_name = image_name_array[image_name_array.length - 1];

		//here is where we get a bunch of info from the database and display it. includes/getDetails? or includes/functions?reason=details;
		$.post('../includes/functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
//alert(data);
			var details = $('#details');
			details.empty();
			details.append(data);
		});
/* this is taken out until i can figure out how to make it happen immediately and smoothly 
		var winHeight = $(window).height();
		var imgHeight = $('#display_pane').children('img').height();

		var shim  = (winHeight - imgHeight)/4;	
		//alert(shim);
		//$('#display_pane img').css({'margin-top':shim});*/
	});

});
$(window).load(function () {

	/*$('.section_header h3:contains("terms and conditions")').live('click',function(event) {

		event.preventDefault();
		event.stopPropagation();

		//var terms = "<p id='terms'>A fine work of art is uniquely qualified to celebrate the world we love and there are few things that bring more lasting pleasure. Each work is rendered with the utmost originality in mind and all projects are completed to the total satisfaction of both the artist and client. Only the finest materials and techniques are used to ensure posterity. Please contact Christopher Ruppert with your ideas and budget. </p><p>Serious inquiries only.</p>";
		var terms = "<p id='terms'>A fine work of art is uniquely qualified to celebrate the world we love and there are few things that bring more lasting pleasure. Each work is rendered with the utmost originality in mind and all projects are completed to the total satisfaction of both the artist and client. Only the finest materials and techniques are used to ensure posterity. Please contact Christopher Ruppert with your ideas and budget. </p><p>Serious inquiries only.</p>";

		$('#display_pane').empty();
		$('#thumbnail_pane').empty();
		$('#display_pane').append(terms);

	});*/
	var ua = navigator.userAgent,
    click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";

	$('.section_header h3:contains("contact")').live(click_event,function(event) {

		event.preventDefault();
		event.stopPropagation();

		//var terms = "<a href='mailto:c.ruppert@christopherruppert.com' >c.ruppert@christopherruppert.com</a>";

		$('#display_pane').empty();
		$('#details').empty();
		$('#display_pane').load("./contact.html");

	});
	$('#credits').live(click_event,function(data){
		window.location = '../admin/index.php';

	});


	var cssObj = {
      'width' : '4em',
      'font-weight' : '',
      'font-weight' : '',
      'color' : 'rgb(0,40,244)'
    }
    
    $("#admin_table tr > :nth-child(1) input").css(cssObj);

    var textareaWidth = $('#thumbnail_pane')[0].scrollWidth;

    // width of our wrapper equals width of the inner part of the textarea
    if (ua.match(/iPad/i)) {
		$('#details').css({
			'position':'fixed',
			'left':'10px',
			'bottom':'50px'

			});
    		//$("#thumbnail_pane").css({'height':"9000px",'overflow':'auto'});
	}else { 
    		$("#thumbnails").css('width',textareaWidth + "px");
	}
				
	

	



});
