<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Dynamic Drive: CSS Liquid Layout #3.7- (Fixed-Fixed-Fluid)</title>
		
		<style type="text/css">

			body {
				margin:0;
				padding:0;
				line-height: 1.5em;
			}
			
			b {
				font-size: 110%;
			}
			
			em {
				color: red;
			}
			
			#topsection {
				background: #EAEAEA;
				height: 90px; /*Height of top section*/
			}
			
			#topsection h1 {
				margin: 0;
				padding-top: 15px;
			}
			
			#contentwrapper {
				float: right;
				width: 100%;
				margin-left: -430px; /*Set left margin to -(leftColumnWidth + RightColumnWidth)*/
			}
			
			#contentcolumn {
				margin-left: 430px; /*Set left margin to (leftColumnWidth + RightColumnWidth)*/
			}
			
			#leftcolumn {
				float: left;
				width: 230px; /*Width of left column in pixels*/
				background: #C8FC98;
			}
			
			#rightcolumn {
				float: left;
				width: 200px; /*Width of right column in pixels*/
				background: #FDE95E;
			}
			
			#footer {
				clear: both;
				width: 100%;
				background: black;
				color: #FFF;
				text-align: center;
				padding: 4px 0;
			}
			
			#footer a {
				color: #FFFF80;
			}
			
			.innertube {
				margin: 10px; /*Margins for inner DIV inside each column (to provide padding)*/
				margin-top: 0;
			}
		</style>

		<script type="text/javascript">
			/*** Temporary text filler function. Remove when deploying template. ***/
			var gibberish=["This is just some filler text", "Welcome to Dynamic Drive CSS Library", "Demo content nothing to read here"]
			function filltext(words){
			for (var i=0; i<words; i++)
			document.write(gibberish[Math.floor(Math.random()*3)]+" ")
			}
		</script>

	</head>
	
	<body>
		<div id="maincontainer">
			<div id="topsection">
				<div class="innertube"><h1>CSS Liquid Layout #3.7- (Fixed-Fixed-Fluid)</h1></div>
			</div>
			
			<div id="contentwrapper">
				<div id="contentcolumn">
					<div class="innertube"><b>Content Column: <em>Fluid</em></b> <script type="text/javascript">filltext(45)</script></div>
				</div>
			</div>
			
			<div id="leftcolumn">
				<div class="innertube"><b>Left Column: <em>230px</em></b> <script type="text/javascript">filltext(20)</script></div>
			</div>
	
			<div id="rightcolumn">
				<div class="innertube"><b>Right Column: <em>200px</em></b> <script type="text/javascript">filltext(15)</script></div>
			</div>
	
			<div id="footer"><a href="http://www.dynamicdrive.com/style/">Dynamic Drive CSS Library</a></div>
		</div>
	</body>
</html>