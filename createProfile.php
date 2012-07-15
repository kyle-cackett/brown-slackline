<?php 
/*This currently allows overwriting profiles and disallows duplicate names*/
require "resources/constants.php";

if(loggedIn()) {

	if(empty($_POST['firstName']) || empty($_POST['profile']) || empty($_POST['interests']) || empty($_FILES['headShot']) || empty($_FILES['actionShot'])) {
		exit("All fields must be filled in!");
	}

	$newMember = new Member();
	$newMember->firstName = $_POST['firstName'];
	$newMember->lastName = empty($_POST['lastName']) ? 'Slacker' : $_POST['lastName'];
	$newMember->profile = $_POST['profile'];
	$newMember->interests = "Other Interests: ".$_POST['interests'];
	$newMember->headShot = strtolower($newMember->firstName."_".$newMember->lastName)."_action.jpg";
	$newMember->actionShot = strtolower($newMember->firstName."_".$newMember->lastName)."_head.jpg";
	$newMember->createdBy = username();

	$filename = $profilesDir."/".strtolower($newMember->firstName)."_".strtolower($newMember->lastName).".txt";

	if(file_exists($filename)) exit("Profile already exists :-(");

	$file = fopen($filename, "w");
	fwrite($file, serialize($newMember));
	fclose($file);

	move_uploaded_file($_FILES['headShot']['tmp_name'], $profilesDir."/".$newMember->headShot);
	move_uploaded_file($_FILES['actionShot']['tmp_name'], $profilesDir."/".$newMember->actionShot);

}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>