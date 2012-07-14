<?php 
function getProfiles($profilesDir) {

	$members = array();
	foreach(glob($profilesDir."/*.txt") as $profileFileName) {
		array_push($members,unserialize(file_get_contents($profileFileName)));
	}

	return $members;
}?>