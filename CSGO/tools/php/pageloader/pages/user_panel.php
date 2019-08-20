<div class="article_heading" id="article_heading" name="article_heading">
	User Panel
</div>
<div class="article_body" id="article_body" name="article_body">
	<table style='width: 100%;'>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Username: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-username']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				E-Mail: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-e_mail']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Registered: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-register_date']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Registered IP: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-register_ip']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Last Login: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-last_login_date']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Last Logedin IP: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-last_login_ip']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Steam-ID: 
			</td>
			<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
				<?php echo($_SESSION['user-steam_id']); ?>
			</td>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Rank: 
			</td>
			<?php 
				if ($_SESSION['user-permissions']-1 == 0) {
					echo("<td style='color:#29f6e3; border-bottom:1pt solid grey; width: 50%; text-align: end;'>User</td>");
				}
				if ($_SESSION['user-permissions']-1 == 1) {
					echo("<td style='color:#292ff6; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Member</td>");
				}
				if ($_SESSION['user-permissions']-1 == 2) {
					echo("<td style='color:#f69329; border-bottom:1pt solid grey; width: 50%; text-align: end;'>VIP</td>");
				}
				if ($_SESSION['user-permissions']-1 == 3) {
					echo("<td style='color:#3cf629; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Moderator</td>");
				}
				if ($_SESSION['user-permissions']-1 == 4) {
					echo("<td style='color:#29b2f6; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Supporter</td>");
				}
				if ($_SESSION['user-permissions']-1 == 5) {
					echo("<td style='color:#e3f629; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Team Leader</td>");
				}
				if ($_SESSION['user-permissions']-1 == 6) {
					echo("<td style='color:#f68029; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Admin</td>");
				}
				if ($_SESSION['user-permissions']-1 == 7) {
					echo("<td style='color:#f62929; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Owner</td>");
				}
			?>
		</tr>
		<tr style='width: 100%;'>
			<td style='border-bottom:1pt solid grey; width: 50%;'>
				Banned: 
			</td>
			<?php 
				if ($_SESSION['user-ban-status']-1 == 0) {
					echo("<td style='color:green; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Not Banned</td>");
				}
				if ($_SESSION['user-ban-status']-1 == 1) {
					echo("<td style='color:red; border-bottom:1pt solid grey; width: 50%; text-align: end;'>Banned</td>");
				}
			?>
		</tr>
		<?php
		if ($_SESSION['user-permissions']-1 > 3){
			echo("
			<tr style='width: 100%;'>
				<td style='border-bottom:1pt solid grey; width: 50%;'>
					<center>
						UNFINISHED USERPANEL
					</center>
				</td>
				<td style='border-bottom:1pt solid grey; width: 50%;'>
					<center>
						UNFINISHED USERPANEL
					</center>
				</td>
			</tr>
			");
		}
		?>
	</table>
	<button type="button" onclick="location.href='./?logout'">Logout</button>
</div>
