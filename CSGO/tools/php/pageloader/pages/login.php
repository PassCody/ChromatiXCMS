<?php ?>
<div class="article_heading" id="article_heading" name="article_heading">
	Login
</div>
<div class="article_body" id="article_body" name="article_body">
	<center>
		<form action="./tools/php/connector/db_checker.php" method="POST">
			<table>
				<tr>
					<td>
						<label for="account">User Name: </label>
					</td>
					<td>
						<input type="text" id="account" name="account">
					</td>
				</tr>
				<tr>
					<td>
						<label for="passwort">Passwort: </label>
					</td>
					<td>
						<input type="password" id="passwort" name="passwort">
					</td>
				</tr>
				<tr>
					<td>
						<button type="submit" id="db_check_button" name="db_check_button" value="login">Login</button>
					</td>
					<td>
						<button type="button" onclick="location.href='./'">Abbrechen</button>
					</td>
				</tr>
			</table>
		</form>
		<br>
		<h4 style='color: #FF7F24;'>Bitte füllen Sie alle Felder Ordnungsgemäß aus.</h4>
	</center>
</div>