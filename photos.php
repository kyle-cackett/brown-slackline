<!DOCTYPE html>
<?php require_once "resources/constants.php";?>
<html>
	<head>
		<title>Brown Slackline | Photos </title>
		<?php require $frameworks;?>
		<script type="text/javascript">
			var active = "#photos"; //Declare current page for navbar active link 
		</script>
		<script type="text/javascript">
			var photos = <?php $photos = array();
						foreach (scandir($photosDir) as $photo) {
							if (strcmp($photo, '.gitignore') == 0 || strcmp($photo,'.htaccess') == 0) continue;
							if (is_file($photosDir."/".$photo)) $photos[] = $photo;
						}
						echo json_encode($photos);?>;
			var photosPerPage = <?php echo $photosPerPage;?>;
			var page = 0;
			var lastPage = Math.ceil(photos.length/photosPerPage)-1;
		</script>
		<?php require $resources;?>
		<script type="text/javascript" src="scripts/pagespecificscripts/photos.js"></script> <!fix this>
	</head>
	<body>
	<?php require $navbar;?>
	<?php require $thumbnailsScript;?>
	<div id="background-photos" class="background">
		<div class="container absolute-children">
			<h1 class="hero-font pagename">Pictures</h1>
			<div id="left-arrow" class="arrow center-vertically"></div>
			<div id="gallery" class="span9">
				<ul class="thumbnails">
					<?php 
					$photoID = 0;
					foreach (scandir($photosDir) as $photo) {
						if (strcmp($photo, '.gitignore') == 0 || strcmp($photo, '.htaccess') == 0) continue;
						$filename = $photosDir."/".$photo;

						if (is_file($filename)) {
							generateThumbnail($photo, $photosDir, $thumbnailsDir, $thumbnailWidth, $thumbnailHeight, $thumbnailRatio);

							if ($photoID < $photosPerPage) { ?>
								<li> 
									<img id="<?php echo "photo".$photoID?>" class="thumbnail" onclick="toggleModal('<?php echo $photosDir."/".$photo;?>');" src="<?php echo $thumbnailsDir.'/'.$photo;?>"  alt="<?php echo $photo;?>"/>
								</li>
							<?php }
							$photoID++;
						}
					}?>
				</ul>
			</div>
			<div id="right-arrow" class="arrow center-vertically"></div>
		</div>
		<?php if(loggedIn()) { ?>
		<div class="container absolute-children pad-top">	
			<form enctype="multipart/form-data" method="post" action="uploadPhotos.php">
				<button class="btn btn-primary upload-photos-control" type="button">Upload JPEGs</button>
				<input id="upload-photos-input" class="upload-photos-control masked-file-input" type="file" multiple="true" name="photos[]" onchange="this.form.submit()"/>
			</form>
		</div>
		<?php } ?>
	</div>
	<div class="modal hide fade" id="myModal">
  		<div class="modal-header">
    		<button class="close" data-dismiss="modal">&times;</button>
    		<h3>Photo</h3>
  		</div>
  		<div class="modal-body">
    		<img id="viewing"/>
  		</div>
  		<div class="modal-footer">
    		<a class="btn" data-dismiss="modal">Close</a>
  		</div>
	</div>
	<?php include $footer;?>
	</body>
</html>