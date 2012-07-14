<!DOCTYPE html>
<?php require "resources/constants.php";?>
<html>
	<head>
		<title>Brown Slackline</title>
		<?php require $frameworks;?>
		<script type="text/javascript">
			var active = "#home";
		</script>
		<?php require $resources;?>
	</head>
	<body>
		<?php require $navbar;?>
			<div id="background-home" class="background">
				<div class="container absolute-children">
					<img id="backdrop-home" class="center pad-top" src="assets/bgHome.png" height="524px" width="422px"/>
					

					<div id="intro-home" class="span4 intro">
						<p><h3 class="drop-cap">The Brown Slackline Club</h3> provides a weekly opportunity for Brown students and Providence community members interested in 
							slacklining, to practice together and share knowledge and techniques. The club was founded in the fall of 2010 by Kyle 
							Cackett. He was initially the sole member, and had only the equipment to set up a single primitive 1" line. Now the club 
							sets several lines, both 1" and 2", and has an ever growing number of participants. The club holds weekly meetings that 
							are located on Brown's Main Green at the center of the campus. Everyone is welcome, regardless of experience, so come 
							slack with us!</p>
					</div>

					<div id="p2-home" class="span6 intro">
						<p><h3 class="drop-cap">Slacklining is a challenging sport</h3> involving balance and core strength that uses webbing tensioned between two anchor points. 
							While rope walking has been around for thousands of years, slacklining began in the 1970s when climbers in Yosemite Valley 
							began stringing up their webbing between trees and trying to walk on it. Recently, slacklining has exploded and is now an up 
							and coming sport that can be described as a mixture of tightrope walking and trampolining. There are several forms of 
							slacklining, including tricklining, longlining and highlining. The Brown Slackline Club typically practices tricklining, but 
							has been known to tie an occasional longline and highline.<p>
					</div>

					<div id="p3-home" class="span7 intro">
						<p><h3>Tricklining</h3> This is likely the most common form of slacklining, and involves walking and doing jumps and tricks on the line.
						 	It can be practiced on both 1" and 2" webbing, although it is more popular to use a 2" line. Tricklines are generally at high 
						 	tension to allow for optimal springiness, and are tied low to the ground. There are competitions for tricklining, where competitors 
						 	go head to head, and are judged based on the tricks they perform. Andy Lewis is thought to be the pioneer of tricklinging, as 
						 	he has introduced numerous tricks to the sport, and is still the man to beat in competitions.
						<br/><br/>
						<h3>Longlining</h3> This version of slacklining involves mainly walking, although some have been known to do tricks, on a long 1" slackline. 
						Longlines are loosely defined as a slackline that is over 100 ft long. Longlining gets more challenging the longer the line is, because 
						more play is created in the middle of the line, causing the line to be more difficult to control. 
						</p>
					</div>

					<div id="p4-home" class="span5 intro">
						<p>	<h3>Highlining</h3> This type of slacklining is not for the faint of heart or those afraid of heights. Highliners set their slacklines up over 
						gorges or places that are hundreds to thousands of feet in the air. 1" webbing is used along with a secure backup system for the tensioning 
						device. Highliners typically wear a harness and leash attached to the line, so that they will not fall to their deaths. However, some very 
						confident slackliners will "free solo" a highline, and walk the line without any type of safety device. Highlining is very meditative and 
						walkers feel a huge sense of accomplishment after sending the line.</p>
					</div>
				</div>
			</div>
		<?php include $footer;?>
	</body>
</html>