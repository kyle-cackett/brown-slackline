<?php 
	$navbar = "resources/navbar.php";
	$frameworks = "resources/frameworks.html";
	$resources = "resources/resources.html";
	
	#--PHOTOS--#
	$photosDir = "photos";
	$thumbnailsDir = $photosDir."/thumbnails";
	$photosPerPage = 16;

	#If thummbnails width and height are changed the thumbnailDir must be cleared
	$thumbnailWidth = 140;
	$thumbnailHeight = 90;
	$thumbnailRatio = $thumbnailWidth/$thumbnailHeight;

	#--PROFILES--#
	$profilesDir = "profiles";
?>