<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Make a Feathr Account!</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
	<div class = "centered">
    <form name="upload" action="newLogin.php" method="post">
      <table width="20%" align="center">
	  
		<tr id = "titlereg">
          <td colspan=2><center>Register</center></td>
        </tr>
	  
	  
		<tr>
			<td><input type="text" name="uname" required autofocus placeholder="enter a username" size=25></td>
		 
		</tr>
		<?php
		session_start();
		if(isset($_SESSION['errorUser'])){
			if($_SESSION['errorUser']){
				echo "<tr><td class='error'>Username already taken!</td></tr>";
			}
		}
		?>

		
      <tr>

			<td><input type="text" name="email" required placeholder="enter your email" size=25></td>
		
      </tr>
		<?php
		//session_start();
		if(isset($_SESSION['errorEmail'])){
			if($_SESSION['errorEmail']){
				echo "<tr><td class='error'>Please enter a valid email address!</td></tr>";
			}
		}
		?>

  
      <tr>
			<td><input type="Password" name="pass" required placeholder="create a password" size=25></td>
      </tr>

      <tr>
			<td><input type="Password" name="vpass" required placeholder="verify your password" size=25></td>
      </tr>
		<?php
		//session_start();
		if(isset($_SESSION['errorPass'])){
			if($_SESSION['errorPass']){
				echo "<tr><td class='error'>Passwords do not match!</td></tr>";
			}
		}
		?>
	  
      <tr>
          <td><input type="submit"></td>
      </tr>
		
    </table>
    </form>
	</div>
  </body>
</html>
