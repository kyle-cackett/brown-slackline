<!DOCTYPE html>
<?php require "resources/constants.php";?>
<html>
	<head>
		<title>Brown Slackline | Meetings</title>
		<?php require $frameworks;?>
		<script type="text/javascript">
			var active = "#meetings";
		</script>
		<?php require $resources;?>
	</head>
	<body>
		<?php require $navbar;?>
		<div>
			<div id="background-meeting" class="background">
				
				<div class="container">
					<h1 class="hero-font pagename pad-bottom">Meetups</h1>
					<iframe src="http://www.google.com/calendar/embed?src=brown.edu_hedcaratp0gg39pa82k0r3cptk%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
				</div>
			</div>
		</div>
		<?php require $footer;?>
	</body>
</html>


