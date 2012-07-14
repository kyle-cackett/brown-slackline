<?php 
	$navbar = "resources/navbar.php";
	$frameworks = "resources/frameworks.html";
	$resources = "resources/resources.html";
	$footer = "resources/footer.html";
	
	#--PHOTOS--#
	$photosDir = "photos";
	$thumbnailsDir = $photosDir."/thumbnails";
	$photosPerPage = 16;

	#If thummbnails width and height are changed the thumbnailDir must be cleared
	$thumbnailWidth = 140;
	$thumbnailHeight = 90;
	$thumbnailRatio = $thumbnailWidth/$thumbnailHeight;
	$thumbnailsScript = "thumbnails.php";

	#--PROFILES--#
	$profilesDir = "profiles";

	class Member {
		public $firstName;
		public $lastName;
		public $profile;
		public $interests;
		public $actionShot;
		public $headShot;
	}

	function loggedIn() {
		if($_COOKIE['login']) {
			list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
    		if (md5($c_username.'tubular') == $cookie_hash) return true;
    	}
    	return false;
	}	
?>