$(document).ready(function() {

	$('.quadrant').live('click', function(event) {
		var section_id = $(this).attr('id');
	alert(section_id);
		$(this).children().editable('./editBlock.php',{data:"{'block_id':" + section_id + ",'':''}"});
	});


});
