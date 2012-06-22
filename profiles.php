<?php class Member {
	public $firstName;
	public $lastName;
	public $profile;
	public $interests;
	public $actionShot;
	public $headShot;
}

function getProfiles($profilesDir) {

	$members = array();
	foreach(glob($profilesDir."/*.txt") as $profileFileName) {
		array_push($members,unserialize(file_get_contents($profileFileName)));
	}

	return $members;
}?>