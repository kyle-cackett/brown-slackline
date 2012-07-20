<?php 
/*This currently allows overwriting profiles and disallows duplicate names*/
require "resources/constants.php";
require "profilesHelper.php";

if(loggedIn()) {

	$method = $_SERVER['REQUEST_METHOD'];

	if(strcmp($method, "POST") === 0) {
	
		if(empty($_POST['firstName']) || empty($_POST['profile']) || empty($_POST['interests']) || (empty($_FILES['headShot']) || empty($_FILES['actionShot']) && !isset($_POST['filename']))) {
			exit("All fields must be filled in!");
		}

		/*Editing profiles
		If a profile already exists and no new photos were submitted
		$old[photo] will have the name of the existing photo to use
		in the new profile. If new photos do exist unlink the old ones.
		*/
		$oldMember = isset($_POST['filename']) ? getProfile($profilesDir,$_POST['filename']) : NULL;
		$oldActionShot = NULL;
		$oldHeadShot = NULL;
		$oldCreator = NULL;
		if (isset($oldMember)) {
			$oldActionShot = $profilesDir."/".$oldMember->actionShot;
			$oldHeadShot = $profilesDir."/".$oldMember->headShot;
			$oldCreator = $oldMember->createdBy;
			if ($_FILES['actionShot']['error'] != UPLOAD_ERR_NO_FILE) unlink($oldActionShot);
			if ($_FILES['headShot']['error'] != UPLOAD_ERR_NO_FILE) unlink($oldHeadShot);
			unlink($profilesDir."/".$oldMember->getFilename());	
		}

		$newMember = new Member();
		$newMember->firstName = $_POST['firstName'];
		$newMember->lastName = empty($_POST['lastName']) ? 'Slacker' : $_POST['lastName'];
		$newMember->profile = $_POST['profile'];
		$newMember->interests = "Other Interests: ".$_POST['interests'];
		$newMember->headShot = strtolower($newMember->firstName."_".$newMember->lastName)."_action.jpg";
		$newMember->actionShot = strtolower($newMember->firstName."_".$newMember->lastName)."_head.jpg";
		$newMember->createdBy = isset($oldCreator) ? $oldCreator : username();

		$filename = $profilesDir."/".strtolower($newMember->firstName)."_".strtolower($newMember->lastName).".txt";

		if(file_exists($filename) && !isset($_POST['filename'])) exit("Profile already exists :-(");

		$file = fopen($filename, "w");
		fwrite($file, serialize($newMember));
		fclose($file);

		if ($_FILES['headShot']['error'] != UPLOAD_ERR_NO_FILE) {
			move_uploaded_file($_FILES['headShot']['tmp_name'], $profilesDir."/".$newMember->headShot);
		} else {
			rename($oldHeadShot, $profilesDir."/".$newMember->headShot);
		}
		if ($_FILES['actionShot']['error'] != UPLOAD_ERR_NO_FILE) {
			move_uploaded_file($_FILES['actionShot']['tmp_name'], $profilesDir."/".$newMember->actionShot);
		} else {
			rename($oldActionShot, $profilesDir."/".$newMember->actionShot);
		}
	} else if(strcmp($method, "DELETE") === 0) {

		parse_str(file_get_contents("php://input"));

		if (isset($filename) && file_exists($profilesDir."/".$filename)) {		
			$member = getProfile($profilesDir,$filename);			
			if(strcmp(username(), "admin") == 0 || strcmp(username(), $member->createdBy) == 0) {
				unlink($profilesDir."/".$member->actionShot);
				unlink($profilesDir."/".$member->headShot);
				unlink($profilesDir."/".$member->getFilename());
			}
		}
	}
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>