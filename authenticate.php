<?php
if (hash("sha256", $_POST['password']) === "bd02945f101d1b8be072a820eb884a5a942efa94501beed4bf9263d0391b49f2" && $_POST['username'] === "admin") {
	setcookie('login',$_POST['username'].','.md5($_POST['username'].'tubular'));	
} else {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>