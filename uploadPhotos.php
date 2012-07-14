<?php 
require_once "resources/constants.php";
require $thumbnailsScript;
if(loggedIn()) {
	for($i=0; $i<count($_FILES['photos']['name']); $i++) {
		if(preg_match("#image/#", $_FILES['photos']['type'][$i]) === 1) {
			/*Generate unique name*/
			$filename = uniqid("photo_").".".array_pop(explode("/", $_FILES['photos']['type'][$i]));
			$pathname = $photosDir."/".$filename;
			while (file_exists($pathname)) {
				$filename = uniqid("photo_").".".array_pop(explode("/", $_FILES['photos']['type'][$i]));
				$pathname = $photosDir."/".$filename;
			}
			/*Move file to photos folder*/
			move_uploaded_file($_FILES['photos']['tmp_name'][$i], $pathname);
			generateThumbnail($filename, $photosDir, $thumbnailsDir, $thumbnailWidth, $thumbnailHeight, $thumbnailRatio);
		}
	}
}
header("Location: ".$_SERVER['HTTP_REFERER']);?>
