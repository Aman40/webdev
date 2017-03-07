<?php
/*May have to save any client $_SESSION edits before ending the session*/
	session_start();
	session_unset();
	session_destroy();
	header("location: sample.php");
?>
