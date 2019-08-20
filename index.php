<?php
	if(file_exists('./tools/config.php')) {
	echo('
	<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Team ChromatiX</title>
			<link rel="shortcut icon" href="./imgs/Logo.png" />
			<link rel="stylesheet" type="text/css" href="./css/main.css">
		</head>
		
		<body>
			<center>
				<div class="logo" id="logo" name="logo"></div>
				<h1>CHOOSE YOUR GAME</h1>
				<table>
					<tr>
						<th>
							Minecraft
						</th>
						<th>
							CS:GO
						</th>
					</tr>
					<tr>
						<td>
							<div class="landing_mc" id="landing_mc" name="landing_mc" alt="Minecraft" onclick="location.href=\'./MC\'"></div>
						</td>
						<td>
							<div class="landing_csgo" id="landing_csgo" name="landing_csgo" alt="Counter-Strike: Globale Offensive" onclick="location.href=\'./CSGO\'"></div>
						</td>
					</tr>
				</table>
			</center>
		</body>
	</html>');
	}
	else{
		header('Location: ./installer.php');
	}
?>
