


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> </title>
					
		<script type='text/javascript' language='javascript' src='includes/js/jquery-1.7.2.min.js'></script>

		<!--ADDED FOR THUMBNAIL CAROUSEL PLUGIN-->
		<link href="jquery.thumbnailScroller.css" rel="stylesheet" type="text/css" />
		<script src="includes/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script src="includes/js/jquery.thumbnailScroller.js"></script>

	</head>
	
	<body>

					<div id="tS3" class="jThumbnailScroller">
					    <div class="jTscrollerContainer">
					        <div class="jTscroller">
					            <a href="#"><img src="thumbs/img1.jpg" /></a>
					            <a href="#"><img src="thumbs/img2.jpg" /></a>
					            <a href="#"><img src="thumbs/img3.jpg" /></a>
					            <a href="#"><img src="thumbs/img4.jpg" /></a>
					            <a href="#"><img src="thumbs/img5.jpg" /></a>
					            <a href="#"><img src="thumbs/img6.jpg" /></a>
					            <a href="#"><img src="thumbs/img7.jpg" /></a>
					            <a href="#"><img src="thumbs/img8.jpg" /></a>
					        </div>
					    </div>
					    <a href="#" class="jTscrollerPrevButton"></a>
					    <a href="#" class="jTscrollerNextButton"></a>
					</div>


<script>
//jQuery.noConflict();

(function($){
window.onload=function(){
        $("#tS3").thumbnailScroller({
        scrollerType:"clickButtons",
        scrollerOrientation:"vertical",
        scrollSpeed:2,
        scrollEasing:"easeOutCirc",
        scrollEasingAmount:600,
        acceleration:4,
        scrollSpeed:800,
        noScrollCenterSpace:10,
        autoScrolling:0,
        autoScrollingSpeed:2000,
        autoScrollingEasing:"easeInOutQuad",
        autoScrollingDelay:500
    });
}
})(jQuery);
</script>

		
	</body>
</html>