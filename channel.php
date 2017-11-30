<!DOCTYPE html>
<html>
<head>
	<title>Chat Channel</title>
	<link type="text/css" rel="stylesheet" href="channelStyle.css" /> 
	
</head>

<body>

<div id="wrap" class="menu">
	<div id="menu">
		<p id="welcome">Welcome, 
		<!-- JS to get username cookie -->
			<script type="text/javascript"> 
				function getCookie(cname) {
					var name = cname + "=";
					var ca = document.cookie.split(';');
					for(var i = 0; i < ca.length; i++) {
						var c = ca[i];
						while (c.charAt(0) == ' ') {
							c = c.substring(1);
						}
						if (c.indexOf(name) == 0) {
							return c.substring(name.length, c.length);
						}
					}
					return "";
				}
				
				document.write(getCookie("username"));
			</script>
			
		<b></b></p>
			<form action="logout.php" method="post">
				<input type="submit" name="logoutButton" value="Logout">
			</form>
		<div style="clear:both"></div>
	</div>
</div>

<div id="wrap" class="chatbox">
	<div id="chatbox">
		<?php
		if(file_exists("log.html") && filesize("log.html") > 0){
			$handle = fopen("log.html","r");
			$contents = fread($handle, filesize("log.html"));
			fclose($handle);
		
			echo $contents;
		}
		?>
	</div>
</div>

<div id="wrap" class="message">
	<div id="message">
		<form name="messageForm" action="" autocomplete="off" >
			<input name="usermsg" type="text" id="usermsg" size="63" />
			<input name="submitmsg" type="submit" id="submitmsg" value="Send" />
		</form>
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
	//jQuery Document
	$(document).ready(function(){
	
	});
</script>

<script type="text/javascript">
	$("#submitmsg").click(function(){
		//console.log("submitting");
		var clientmsg = $("#usermsg").val();
		//console.log(clientmsg);
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		loadLog();
		return false;
	
	});

	function loadLog(){
	console.log('loadLog');
	var oldscrollHeight = $(".chatbox").attr("scrollHeight");
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$(".chatbox").html(html);
			var newscrollHeight = $(".chatbox").attr("scrollHeight");
				if(newscrollHeight > oldscrollHeight){
					$(".chatbox").animate({scrollTop: newscrollHeight});
				}
			},
			
		});
	}
	console.log('settingInterval');
	setInterval(loadLog, 1500);

</script>



</body>

</html>
