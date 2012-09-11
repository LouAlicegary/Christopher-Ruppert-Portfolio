<?php
header("Content-type: text/css");

?>
html {
	height: 100%;
}
body {
	font-family: 'Esteban';
	height: 100%;
	margin: 0px;
	
}
h1,h2,h3 {
	font-family: 'Esteban';
}
form {
	display: inline-block;

}
#main {
	height: 100%;
	position: relative;
}
#top_pane div {
	display: inline-block;
}
#artist_name {
	text-align: center;
}
#logo {
	width: 8em;
	min-height: 8em;
	
}
.profile_thumb {
	display: inline-block;
	width: 25%;
	height: 35%;
	margin: 0 auto;

}
.profile_thumb img {
	width: 100px;
	height: 100px;
}

#footer {
	text-align: center;
	margin: 0 auto;
}
#section_pane, #thumbnails, #center_pane, #details_pane {
	position: relative;
	display: inline-block;
}
#thumbnails {
	width: 100px;
	height: 100%;
	overflow: hidden;
	

}
#section_pane {
	width: 250px;
	height: 90%;
	vertical-align: top;

	text-align: center;
}

#thumbnail_pane {
	
	width: 100px;
	height: 90%;
	overflow: auto;
	overflow-y: scroll;
	overflow-x: none;
}
#center_pane {

	vertical-align: top;
	width: 600px;
	height: 90%;
}
#display_pane {
	width: 600px;
	height: 90%;
	vertical-align: top;
	align: center;

	
}
#display_pane img {
	height: auto;
	max-width: 600px;
	max-height: 90%;
	margin: 0 auto;
}
#details_pane {
	width: 250px;
	height: 90%;
	vertical-align: top;
}
#tagline {

}
#header div {
	display: inline-block;
	width: 25%;
}
#header form {
	width: 600px;
}
.thumbnail {
	margin-bottom: .3em;
}
.thumbnail img {

	width: 80px;
	
}
#artist_name {
	font-size: 2em;
}
.spacer {
	font-size: 2em;
	
}
.section_header:hover {
	cursor: pointer;
}
#credits {

	position: fixed;
	bottom: 10px;
	margin: 0 auto;
	width: 250px;
	vertical-align: bottom;
	font-size: .35em;
	}
#details {
	margin: .5em auto;
}
.image_collection {
}
.image_location {
}
.admin_thumbnail_image {
	width: 50px;	
}
#terms {
	margin-top: 5em;

}
$terms + p {
	margin-top: 1em;
}
table#admin_table, #admin_table td {
	border: 1px solid black;
}
.thinborder {
	border: 1px solid black;
	border-radius: .5em;
	radius: 1em;
	-moz-border-radius: .5em;
	-webkit-border-radius: .5em;
	
	margin: .5em;
	padding: .5em;
}

.updated {
	color: green;
	margin-left: 5em;
	margin-right: 5em;
}
