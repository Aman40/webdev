<?php
function customErrorHandler($error_level, $error_message) {
	$error_message = "Error [".$error_level."]: ".$error_message."<br>";
	echo $error_message;
	error_log("$error_message", 1, "amaniham40@gmail.com",
	"A goddamn error has occurred") or die("Sorry bruh! Can't log");
}
?>
