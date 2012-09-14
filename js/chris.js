$(document).ready(function() {
//$('#thumbnail_pane.scroll_pane').jScrollPane(function(){alert('hi');});

	//alert("AAA");
	var ua = navigator.userAgent,
    click_event = (ua.match(/iPad/i)) ? "touchstart" : "click";
	//alert("BBB");
	//get the sections
	$.post('functions.php',{'submitted':'submitted','reason':'sections','artist':'chris'},function(data){
	//alert("data");
		$('#section_pane').append(data);
	});

	//alert("CCC");
	//$('#thumbnail_pane').jScrollPane();

	$('#up_nav').live(click_event,function(event) {
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
		startingpic = startingpic-4;
		//alert("UPNAV starting pic: " + startingpic + "section name: " + sectionname );
		
		$.post('functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':sectionname,'starting_pic':startingpic},function(data){
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
		
		$.post('functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':sectionname,'starting_pic':startingpic},function(data){
			$('#thumbnail_pane').append(data);
		});
 
	});
	//get the thumbsnails
	$('.section_header').live(click_event,function(event) {

		//alert("Header Clicked.");
		$('#thumbnail_pane').empty();
		$('#display_pane').empty();
		$('#details').empty();
		var section_name = $(this).children('h3').text();
		//alert("Section Name: " + section_name);

		$.post('functions.php',{'submitted':'submitted','reason':'thumbnails','section_name':section_name, 'starting_pic':'0'},function(data){
		    //alert(data);
			$('#thumbnail_pane').append(data);
			var list = document.getElementById("thumbnail_pane").childNodes[1].childNodes[0].innerHTML; //.nodeValue;  //childNodes[0].childNodes[0]

			var beg=list.search("src=");
			var end=list.search("\">");
			var alt_string = list.substr(beg+5,end-beg-5);
			//var alt_string_array = alt_string.split(",");			
			
			//alert(alt_string);
			
			
					var image_path = alt_string; //$(this).attr('src');
					image_path = image_path.replace('/thumbs','');
					//create a tag out of it
					var tag = "<img src=\"" + image_path  + "\" \>";
					$('#display_pane').append(tag);
					
					
			
					var image_name_array = image_path.split('/'); //basepath(image_path);
					var image_name = image_name_array[image_name_array.length - 1];
			
					//here is where we get a bunch of info from the database and display it. includes/getDetails? or includes/functions?reason=details;
					$.post('functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
					//alert(data);
						var details = $('#details');
						details.empty();
						details.append(data);
					});
						
			
			
			//document.getElementById("thumbnail_pane").childNodes[1].childNodes[0].childNodes[0].hide(); //css('display', 'none');
			//document.getElementById("thumbnail_pane").childNodes[1].childNodes[0].css('display', 'none');
			//list.width = 150;
			//document.getElementById("thumbnail_pane").childNodes[1].css('display', 'none');
			//$("#thumb1").hide();
			//setTimeout(function(){alert()}, 500);
			/*
			var nodecount = document.getElementById("thumbnail_pane").childNodes.length;
			my_w = 0;
			my_h = 0;
			ratio = 0.0;
			total = 0;
			w_string = "";
			h_string = "";
			total_string = "";
			//alert(document.getElementById("thumbnail_pane").innerHTML);
			for (i=1; i < nodecount-1; i++) {
				my_w = document.getElementById("thumbnail_pane").childNodes[i].childNodes[0].childNodes[0].width;
				my_h = document.getElementById("thumbnail_pane").childNodes[i].childNodes[0].childNodes[0].height;
				ratio = my_h/my_w;
				total += (ratio * 80);
				//alert (total);
				//alert(my_w + "x" + my_h + " total = " + total + " -> " + i);
				//alert(document.getElementById("thumbnail_pane").childNodes[i].childNodes[0].childNodes[0].height);
				w_string = w_string + my_w + " ";
				h_string = h_string + my_h + " ";
				total_string = total_string + total + " ";
				if (total > 530) {
					break;
				}
				//alert(document.getElementById("thumbnail_pane").childNodes[i].innerHTML);
			}
			//setTimeout(function(){}, 500);
			//alert(w_string + " x " + h_string + " total = " + total_string + " -> " + i);
			//alert(total_string);
			for (j=i-1; j < nodecount; j++) {
				$("#thumb" + j).hide();
			}
			//alert(document.getElementById("thumbnail_pane").innerHTML);
			//alert(nodecount);
			*/
		});
 
 
 		$('#display_pane').empty();
 		//alert("EXISTS");
 		var tp = document.getElementById("thumbnail_pane");
 		//alert(tp.childNodes[1].childNodes[0].childNodes[0].innerText); //.childNodes[1].childNodes[0].childNodes[0]
		//$('#display_pane').html(document.getElementById("thumbnail_pane"));
		//$('#display_pane').append(document.getElementById("thumbnail_pane").childNodes[1].childNodes[0].childNodes[0].innerHTML);
		
		//  //modify the thumbnail path to point to the big image
		//var image_path = $(this).attr('src');
		//image_path = image_path.replace('/thumbs','');
		//  //create a tag out of it
		//var tag = "<img src=\"" + image_path  + "\" \>";
		//$('#display_pane').append(tag);

		//var image_name_array = image_path.split('/'); //basepath(image_path);
		//var image_name = image_name_array[image_name_array.length - 1];

		//  //here is where we get a bunch of info from the database and display it. includes/getDetails? or includes/functions?reason=details;
		//$.post('functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
		//  //alert(data);
		//	var details = $('#details');
		//	details.empty();
		//	details.append(data);
		//});

	});
	
	var pos = $(window).height() - 90;	

	//alert("Height: " + pos);

	var cssObj = {'height':pos};

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
		$.post('functions.php',{'submitted':'submitted','reason':'details','image_name':image_name},function(data){
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
