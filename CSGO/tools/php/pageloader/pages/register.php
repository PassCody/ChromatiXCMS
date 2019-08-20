<div class="article_heading" id="article_heading" name="article_heading">
	Registration
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
						<input type="text" id="account" name="account" placeholder="User Name">
					</td>
				</tr>
				<tr>
					<td>
						<label for="passwort">Passwort: </label>
					</td>
					<td>
						<input type="password" id="passwort" name="passwort" placeholder="******">
					</td>
				</tr>
				<tr>
					<td>
						<label for="e-mail">E-Mail Adresse: </label>
					</td>
					<td>
						<input type="e-mail" id="e-mail" name="e-mail" placeholder="your@e-mail.com">
					</td>
				</tr>
				<tr>
					<td>
						<label for="steam-id">Steam ID: </label>
					</td>
					<td>
						<input type="text" id="steam-id" name="steam-id" placeholder="steam_0:0:000000000">
					</td>
				</tr>
				<tr>
					<td>
						<button type="submit" id="db_check_button" name="db_check_button" value="register">Registrieren</button>
					</td>
					<td>
						<button type="reset">Felder zurücksetzten</button>
					</td>
				</tr>
			</table>
		</form>
		<?php
			if ($value == "?register") {
				echo("<br><h4 style='color: #FF7F24;'>Bitte füllen Sie alle Felder Ordnungsgemäß aus.</h4>");
			}
		?>
	</center>
</div>