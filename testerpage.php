<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>TESTER PAGE</h1>
	<?php
	//shows how to use cookies
	$cookie_name = 'username';
	if(!isset($_COOKIE[$cookie_name])) {
	  print 'Cookie with name "' . $cookie_name . '" does not exist...';
	} else {
	  print 'Cookie with name "' . $cookie_name . '" value is: ' . $_COOKIE[$cookie_name];
	}
	?>
  </body>
</html>
	 