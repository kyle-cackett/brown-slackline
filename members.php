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
	<script type="text/javascript" src="scripts/pagespecificscripts/members.js"></script> <!fix this>
</head>
<?php include "profilesHelper.php";?>
<body>
	<?php require $navbar;?>
	<div class="background">
		<div class="container">
			<h1 class="hero-font pagename pad-bottom">Members
				<?php if(loggedIn()) { ?> <button class="btn btn-primary pull-right" type="button" onclick="$('#new-member-info').toggle(600);">Add Member</button><?php } ?>
			</h1>
			<?php if(loggedIn()) {?>
			<div id="new-member-info" class="row pad-bottom">
				<form enctype="multipart/form-data" action="profiles.php" method="post">
					<div class="span2">
						<div id="headshot-standin" class="thumbnail absolute-children">
							<img id="preview-headshot" class="preview" src="#" alt="headshot-preview"/>
							<button class="headshot-control btn btn-success">Headshot</button>
							<input id="headshot-input" class="headshot-control masked-file-input" type="file" name="headShot" onchange="previewUpload(this,'#preview-headshot');"/>
						</div>
					</div>
					<div class="span6">
						<input id="first-name" class="name-input" type="text" name="firstName" placeholder="First Name"/>
						<input id="last-name" class="name-input" type="text" name="lastName" placeholder="Last Name"/><br/>
						<textarea id="profile" name="profile" placeholder="Profile" rows="8"></textarea><br/>
						<input class="four-fifths-width" type="text" name="interests" placeholder="Interests"/>
						<input type="submit" value="Submit" class="pull-right btn btn-inverse"/>
					</div>
					<div class="span4">
						<div id="actionshot-standin" class="thumbnail absolute-children">
							<img id="preview-actionshot" class="preview" src="#" alt="actionshot-preview"/>
							<button class="actionshot-control btn btn-success">Action Shot</button>
							<input id="actionshot-input" class="actionshot-control masked-file-input" type="file" name="actionShot" onchange="previewUpload(this, '#preview-actionshot');"/>
						</div>
					</div>	
				</form>
			</div>
			<hr/>
			<?php } ?>
			<?php foreach (getProfiles($profilesDir) as $member) {?>
				<div id="<?php echo $member->getFullname();?>" class="row pad-bottom">
					<div class="span2">
						<div class="thumbnail">
							<img src="<?php echo $profilesDir."/".$member->headShot;?>"/>
							<h3 class="hero-font center"><?php echo $member->firstName;?></h3>
							<?php if(loggedIn() && ($member->createdBy === username() || strcmp(username(), "admin") === 0)) { ?>
							<button class="btn btn-warning" type="button" onclick="editableProfile('#<?php echo $member->getFullname();?>');">Edit</button>
							<button class="btn btn-danger" type="button" onclick="deleteProfile('<?php echo $member->getFilename();?>');">Delete</button>
							<?php } ?>
						</div>
					</div>
					<div class="span6">
						<p class="profile-text"><?php echo $member->profile;?></p>
						<p class="interests"><?php echo $member->interests;?></p>
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