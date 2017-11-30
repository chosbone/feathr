<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homework 3 Answers</title>
    <link rel="stylesheet" href="style.css">
	<script src="hw3script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

	//start session
	session_start();
	
	require('connect.php');
	
	$username = checkData($_POST['user']);	
	$password = checkData($_POST['userpw']);
	
	
	//search database for user/passhash --> returns object
	$sqlUser = "SELECT username FROM `usertable` WHERE username = '$username'";
	$sqlPHash = "SELECT passwordhash FROM `usertable` WHERE username = '$username'";
	$sqlUserResult = mysqli_query($link, $sqlUser);
	$sqlPHashResult = mysqli_query($link, $sqlPHash);
	//holders for user and hash 
	$userSql = getOneObj($sqlUserResult);
	$hashSql = getOneObj($sqlPHashResult);
	//$arraySql = getArray($sqlUsP);
	
	
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
	
	
	if($username === $userSql && password_verify($password, $hashSql)){
		echo "USERNAME AND PASSWORD VALID!!!";
		echo "Username = $username"."<br>";
		echo "Password = $password"."<br>";
		echo "PassHash = $hashSql"."<br>";
		echo "Values from mysql USER = $userSql  HASH = $hashSql";
		//sets cookie when username is correct
		//set session name for cookies
		$cookie_name = 'username';
		$cookie_value = $username;
		setcookie($cookie_name, $cookie_value, time() + (60 * 20));
		
		header('Location: channel.php');
		
	}
	else{
		echo "USERNAME AND PASSWORD NOT VALID!!!";
		echo "Username = $username"."<br>";
		echo "Password = $password"."<br>";
		echo "PassHash = $hashSql"."<br>";
		echo "Values from mysql USER = $userSql  HASH = $hashSql"."<br>";
		
	}	
	
	
	// Check connection
	//if($link === false){
	//	die("ERROR: Could not connect. " . mysqli_connect_error());
	//}
	

	?>
	
	</body>
</html>
