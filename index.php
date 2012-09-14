<?php 
$artist = 'chris';

include("./functions.php"); //"./includes/functions.php"

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
			<div id='display_pane'>
			
			
				<div id='slideshow' class='slideshow'>
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/original_paintings/02_mabel.jpg' height='400'  />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/master_copies/03_picasso_the_embrace.jpg' height='350'  />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/sculpture_and_performance/09_brothers_breton.jpg' height='350'  />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/tattoo/10_Peony_for_Meadow.jpg' height='350'  />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/early_work/bullfight.jpg' height='350' />
					<img src='http://www.loualicegary.com/ruppert/imgs/chris/recent_work/01_yellow_skull.jpg' height='350' />
				</div>
			
			</div>
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


