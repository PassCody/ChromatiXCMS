<?php
echo('
<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ChromatiX-CMS Installer</title>
		<link rel="shortcut icon" href="./imgs/Logo.png" />
	</head>
	
	<body>
		<center>
			<form action="install_checker.php" method="post" autocomplete="off">
				<h1>
					ChromatiX-CMS Installer
				</h1>
				<h3>
					Domain Settings
				</h3>
				<table>
					<tr>
						<td>
							<label for="domain_name">
								Domain:
							</label>
						</td>
						<td>
							<input type="text" name="domain_name">
						</td>
					</tr>
					<tr>
						<td>
							<label for="project_name">
								Project Name:
							</label>
						</td>
						<td>
							<input type="text" name="project_name">
						</td>
					</tr>
				</table>
				<hr>
				
				<h3>
					Database Settings
				</h3>
				<table>
					<tr>
						<td>
							<label for="db_ip">
								DataBase IP:
							</label>
						</td>
						<td>
							<input type="text" name="db_ip">
						</td>
					</tr>
					<tr>
						<td>
							<label for="db_port">
								DataBase Port:
							</label>
						</td>
						<td>
							<input type="text" name="db_port">
						</td>
					</tr>
					<tr>
						<td>
							<label for="db_user">
								DataBase User:
							</label>
						</td>
						<td>
							<input type="text" name="db_user">
						</td>
					</tr>
					<tr>
						<td>
							<label for="db_key">
								DataBase Password:
							</label>
						</td>
						<td>
							<input type="password" name="db_key">
						</td>
					</tr>
					<tr>
						<td>
							<label for="db_name">
								DataBase Name:
							</label>
						</td>
						<td>
							<input type="text" name="db_name">
						</td>
					</tr>
				</table>
				<hr>
				
				<h3>
					Private Stuff:
				</h3>
				<table>
					<tr>
						<td>
							<label for="f_name">
								First Name:
							</label>
						</td>
						<td>
							<input type="text" name="f_name">
						</td>
					</tr>
					<tr>
						<td>
							<label for="l_name">
								Last Name:
							</label>
						</td>
						<td>
							<input type="text" name="l_name">
						</td>
					</tr>
					<tr>
						<td>
							<label for="street">
								Street & House Number:
							</label>
						</td>
						<td>
							<input type="text" name="street">
						</td>
					</tr>
					<tr>
						<td>
							<label for="p_code">
								Post Code & State:
							</label>
						</td>
						<td>
							<input type="text" name="p_code">
						</td>
					</tr>
					<tr>
						<td>
							<label for="land">
								Land:
							</label>
						</td>
						<td>
							<input type="text" name="land">
						</td>
					</tr>
					<tr>
						<td>
							<label for="e_mail">
								Contact E-Mail:
							</label>
						</td>
						<td>
							<input type="text" name="e_mail">
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<button type="submit">Install Config</button>
						</td>
						<td>
							<button type="reset">Reset</button>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>');
?>
