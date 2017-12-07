<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
	<link rel="icon" href="favicon.ico?"/>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <div class = "centered">
    <form name="loginForm" method="post" action="login.php">
      <table width="20%" align="center">
        

        <tr id = "title">
          <td colspan=2><center>Feathr</center></td>
        </tr>


        <tr>
          <td><input type="text" size=25 name="user" placeholder="username"></td>
        </tr>


        <tr>
          <td><input type="Password" size=25 name="userpw" placeholder="password"></td>
        </tr>
	
	<?php
		session_start();
		if(isset($_SESSION['error'])){
			if($_SESSION['error']){
				echo "<tr><td class='error'>Incorrect username or password</td></tr>";
			}
		}
	?>

        <tr>
          <td><input type="submit" value="Login"></td>
        </tr>
        
        
        <tr id = "registerlink">
          <td><a href="newacct.html">register</a></td>
        </tr>

           
      </table>
    </form>
    </div>
  </body>
</html>
