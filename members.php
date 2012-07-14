<!DOCTYPE html>
<?php require "resources/constants.php";?>
<html>
<head>
	<title> Brown Slackline | Members </title>
	<?php require $frameworks;?>
	<script type="text/javascript">
		var active = "#members";
	</script>
	<?php require $resources;?>
</head>
<?php include "profiles.php";?>
<body>
	<?php require $navbar;?>
	<div class="background">
		<div class="container">
			<h1 class="hero-font pagename pad-bottom">Members</h1>
			<?php foreach (getProfiles($profilesDir) as $member) {?>
				<div class="row pad-bottom">
					<div class="span2">
						<div class="thumbnail">
							<img src="<?php echo $profilesDir."/".$member->headShot;?>"/>
							<h3 class="hero-font center"><?php echo $member->firstName;?></h3>
						</div>
						<?php if(loggedIn()) { ?>
							<button class="btn btn-warning">Edit</button>
							<button class="btn btn-danger">Delete</button>
						<?php } ?>
					</div>
					<div class="span6">
						<p><?php echo $member->profile;?></p>
						<p><?php echo $member->interests;?></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img src="<?php echo $profilesDir."/".$member->actionShot?>"/>
						</div>
					</div>
				</div>
				<hr/>
			<?php }?>
		</div>
	</div>
	<?php include $footer;?>
</body>

</html>