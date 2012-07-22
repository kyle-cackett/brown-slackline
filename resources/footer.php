<div id="footer" class="navbar center">
	<div class="navbar-inner">
		<ul class="nav">
			<li><a id="activate-contact-modal" name="contact-modal" href="#">Contact Us</a></li>
			<li><a href="login.php">Admin</a></li>
		</ul>
	</div>
</div>
<?php 
require_once("ayah.php");
$ayah = new AYAH();
if (!empty($_POST)) {
	// Use the AYAH object to get the score.
        $score = $ayah->scoreResult();
        // Check the score to determine what to do.
        if ($score) {
                // Send the email
        	if(isset($_POST['email']) && isset($_POST['message'])) {
        		$subject = isset($_POST['subject'])? $_POST['subject'] : "Hello Brown Slackline!";
        		$headers = 'From: '.$_POST['email']."\r\n".'Reply-To: '.$_POST['email']."\r\n"; 
        		mail('kyle.cackett@gmail.com', $subject, $_POST['message'], $headers);
        	}
        	
        }
}?>
<div id="mask" class="modal-utilities"></div>
<div id="contact-modal" class="modal-utilities well">
	<form action="" method="post">
		<input name="email" type="text" placeholder="Contact Email"/><br/>
		<input name="subject" type="text" placeholder="Subject"/><br/>
		<textarea name="message" placeholder="Message" rows="4"></textarea><br/>
		<?php
			echo $ayah->getPublisherHTML();
		?>
		<input type="submit" value="Send Email" class="btn btn-inverse pull-right"/>
	</form>
</div>