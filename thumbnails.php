<?php 
#--THUMBNAIL CREATION CODE--runs if thumbnail does not exist (consider cronjob)
#TODO test type of image
function generateThumbnail($filename) {
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
}
