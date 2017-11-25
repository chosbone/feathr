<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homework 3 Answers</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
	<?php
	function checkData($data, $problem='')
	{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	if ($problem && strlen($data) == 0)
    {
        die($problem);
    }
    return $data;
	}
	?>
	
	<?php
	
	//establish connection
	$link = mysqli_connect("localhost", "root", "", "feathr");
	
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	
	$username = checkData($_POST['uname']);	
	$email = checkData($_POST['email']);
	$pass = $_POST['pass'];
	$vpass = $_POST['vpass'];
	
	//check that username doesnt already exist
	$sqlUser = "SELECT username FROM `usertable` WHERE username = '$username'";
	$sqlUserResult = mysqli_query($link, $sqlUser);
	$userSql = getOneObj($sqlUserResult);
	$userInTable = false;
	
	function getOneObj($qvar){
		if ($qvar)
		{
		   // Fetch one and one row
		   while ($row=mysqli_fetch_array($qvar))
		   {
				return $row[0];
		   }
		} 
	}
	if($userSql === $username){
		$userInTable = true;	
	}
	
	
	
	//checkers that email and pass are valid/same
	$emailCheck = false;
	$passCheck = false;
	
	//hash pass
	$passwordHash= password_hash($pass, PASSWORD_BCRYPT);
	
	// Remove all illegal characters from email
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	// Validate e-mail
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "$email is a valid email address"."<br>";
		$emailCheck = true;
	} else {
		echo "$email is not a valid email address"."<br>";
	}
	// Compare Passwords
	if($pass === $vpass){
		$passCheck = true;
	}
	
	//checker to see that all checkers are valid
	$allCheck = false;
	
	
	//enter values if $pass and $vpass match
	if($emailCheck && $passCheck && !$userInTable){
		$sql = "INSERT INTO usertable (username, email, passwordhash) VALUES
            ('$username','$email','$passwordHash')";
		$allCheck = true;
	}
	elseif(!$emailCheck){
		echo "Email is not valid!"."<br>";
	}
	elseif($userInTable){
		echo "Username is already taken!"."<br>";
	}
	else{
		echo "Passwords do not match!"."<br>";
	}
	
	if($allCheck){
		if(mysqli_query($link, $sql)){
			echo "Account Created!";
		} 
	}	
	else{
		echo "Account not created! Please correct your inputs!";
	}
	
	?>
	
	</body>
</html>