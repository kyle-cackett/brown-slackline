<?php 
	$navbar = "resources/navbar.php";
	$frameworks = "resources/frameworks.html";
	$resources = "resources/resources.html";
	$footer = "resources/footer.php";
	$captcha = "resources/recaptchalib.php";
	
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
		public $createdBy;

		function getFullname() {
			return $this->firstName."-".$this->lastName;
		}

		function getFilename() {
			return strtolower($this->firstName)."_".strtolower($this->lastName).".txt";
		}
	}

	function loggedIn() {
		if(isset($_COOKIE['login'])) {
			list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
    		if (md5($c_username.'tubular') == $cookie_hash) return true;
    	}
    	return false;
	}

	function username() {
		if(isset($_COOKIE['login']) && loggedIn()) return substr($_COOKIE['login'], 0, strpos($_COOKIE['login'],','));
		return NULL;
	}	
?>