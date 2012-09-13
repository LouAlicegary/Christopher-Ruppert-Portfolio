<?php 
$artist = 'chris';

include("./includes/functions.php");

page_header();

echo "
	<div id='main'>
		<div id='section_pane'>";
echo "			<div class='spacer'>&nbsp;</div>";

//create a section that has the sections is JS is turned off.
//getSections('chris');

echo "			<noscript>";
echo "				<p>Please turn on JavaScript to view the page properly.</p>";
echo "			</noscript>";

echo "			<div id='credits'>
				site design by<br /> steve hughes (2012)
			</div>";
echo "		</div>";

echo "		<div id='thumbnails'>";

echo "			<div class='spacer'>&nbsp;</div>";
echo "			<div id='thumbnail_pane'>";


echo "			</div>
		</div>";
echo "		<div id='center_pane'>	

			<div id='artist_name'>Christopher Ruppert</div>
			<div id='display_pane'></div>
		</div>";

echo "		<div id='details_pane'>";
echo "			<div class='spacer'>&nbsp;</div>";
echo "			<div id='details'>
			</div>
			<div id='links'>
<!--				<div class='friendly_link'>
					<img src='' />
				</div>
				<div class='friendly_link'>
					<img src='' />
				</div>
-->				
			</div>
		</div>
			
	</div>

";
page_footer();

?>


