<!DOCTYPE html>
<?php require "resources/constants.php";?>
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
							if (strcmp($photo, '.gitignore') == 0) continue;
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
	<div id="background-photos" class="background">
		<div class="container absolute-children">
			<h1 class="hero-font pagename">Pictures</h1>
			<div id="left-arrow" class="arrow center-vertically"></div>
			<div id="gallery" class="span9">
				<ul class="thumbnails">
					<?php 
					$photoID = 0;
					foreach (scandir($photosDir) as $photo) {
						if (strcmp($photo, '.gitignore') == 0) continue;
						$filename = $photosDir."/".$photo;

						if (is_file($filename)) {
							#--THUMBNAIL CREATION CODE--runs if thumbnail does not exist (consider cronjob)
							if (!file_exists($thumbnailsDir."/".$photo)) {

								list($width,$height) = getimagesize($filename);
								$aspectRatio = $width/$height;
								$thumb = imagecreatetruecolor($thumbnailWidth,$thumbnailHeight);
								$src_x = 0;
								$src_y = 0;
								$src_w = $width;
								$src_h = $height;
								if ($aspectRatio < $thumbnailRatio) {
									//Take all width but only some of height
									$src_h = intval($width/$thumbnailRatio);
									$src_y = intval(($height-$src_h)/2);

								} elseif ($aspectRatio > $thumbnailRatio) {
									//Take all height but only some of width
									$src_w = intval($height*$thumbnailRatio);
									$src_x = intval(($width-$src_w)/2);
								}

								$image = imagecreatefromjpeg($filename);
								imagecopyresampled($thumb, $image, 0, 0, $src_x, $src_y, $thumbnailWidth, $thumbnailHeight, $src_w, $src_h);
								imagejpeg($thumb, $thumbnailsDir."/".$photo);
								imagedestroy($thumb);
							}
							#--END THUMBNAIL CREATION CODE--
							if $photoID < $photosPerPage { ?>
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
	</body>
</html>