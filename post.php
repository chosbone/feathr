<?php
date_default_timezone_set('America/New_York');
session_start();
if(isset($_COOKIE['username'])){
	$text = $_POST['text'];
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_COOKIE['username'].": ".stripslashes(htmlspecialchars($text))."</div>");
	fclose($fp);
}
?>
