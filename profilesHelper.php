<?php 
function getProfiles($profilesDir) {

	$members = array();
	foreach(glob($profilesDir."/*.txt") as $profileFileName) {
		array_push($members,unserialize(file_get_contents($profileFileName)));
	}
	return $members;
}

/*
Params file name of profile to return.  Returns a member object
if a profile with the given filename is found NULL otherwise.
*/
function getProfile($profilesDir,$filename) {
	$pathname = $profilesDir."/".$filename;
	if (file_exists($pathname)) return unserialize(file_get_contents($pathname));
	return NULL;
}?>