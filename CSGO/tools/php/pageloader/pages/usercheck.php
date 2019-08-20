<div class="article_heading" id="article_heading" name="article_heading">
	<?php
		if(!empty($_SESSION['user-username'])) {
			$own_username = $_SESSION['user-username'];
			$own_permissions = $_SESSION['user-permissions'];
		}
		$visit_username = $_SESSION['visit_user-username'];
		$visit_register_date = $_SESSION['visit_user-register_date'];
		$visit_last_login_date = $_SESSION['visit_user-last_login_date'];
		$visit_steam_id = $_SESSION['visit_user-steam_id'];
		$visit_permissions = $_SESSION['visit_user-permissions'];
		$visit_ban_status = $_SESSION['visit_user-ban_status'];
		echo($visit_username);
	?>
</div>
<div class="article_body" id="article_body" name="article_body">
	<table style="width: 100%;">
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Username: 
			</td>
			<td style="border-bottom:1pt solid grey; text-align: end; width: 50%;">
				<?php echo($visit_username); ?>
			</td>
		</tr>
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Registered: 
			</td>
			<td style="border-bottom:1pt solid grey; text-align: end; width: 50%;">
				<?php echo($visit_register_date); ?>
			</td>
		</tr>
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Last Login: 
			</td>
			<td style="border-bottom:1pt solid grey; text-align: end; width: 50%;">
				<?php echo($visit_last_login_date); ?>
			</td>
		</tr>
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Steam-ID: 
			</td>
			<td style="border-bottom:1pt solid grey; text-align: end; width: 50%;">
				<?php echo($visit_steam_id); ?>
			</td>
		</tr>
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Rank: 
			</td>
			<?php 
				if ($visit_permissions-1 == 0) {
					echo("<td style='color:#29f6e3; border-bottom:1pt solid grey; text-align: end;'>User</td>");
				}
				if ($visit_permissions-1 == 1) {
					echo("<td style='color:#292ff6; border-bottom:1pt solid grey; text-align: end;'>Member</td>");
				}
				if ($visit_permissions-1 == 2) {
					echo("<td style='color:#f69329; border-bottom:1pt solid grey; text-align: end;'>VIP</td>");
				}
				if ($visit_permissions-1 == 3) {
					echo("<td style='color:#3cf629; border-bottom:1pt solid grey; text-align: end;'>Moderator</td>");
				}
				if ($visit_permissions-1 == 4) {
					echo("<td style='color:#29b2f6; border-bottom:1pt solid grey; text-align: end;'>Supporter</td>");
				}
				if ($visit_permissions-1 == 5) {
					echo("<td style='color:#e3f629; border-bottom:1pt solid grey; text-align: end;'>Team Leader</td>");
				}
				if ($visit_permissions-1 == 6) {
					echo("<td style='color:#f68029; border-bottom:1pt solid grey; text-align: end;'>Admin</td>");
				}
				if ($visit_permissions-1 == 7) {
					echo("<td style='color:#f62929; border-bottom:1pt solid grey; text-align: end;'>Owner</td>");
				}
			?>
		</tr>
		<tr style="width: 100%;">
			<td style="border-bottom:1pt solid grey; width: 50%;">
				Banned: 
			</td>
			<?php 
				if ($visit_ban_status-1 == 0) {
					echo("<td style='color:green; border-bottom:1pt solid grey; text-align: end;'>Not Banned</td>");
				}
				if ($visit_ban_status-1 == 1) {
					echo("<td style='color:red; border-bottom:1pt solid grey; text-align: end;'>Banned</td>");
				}
			?>
		</tr>
	</table>
	<?php
		if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
			if (!empty($own_username) && $_SESSION['user-permissions'] - 1 == 6 || $_SESSION['user-permissions'] - 1 == 7) {
				if ($_SESSION['visit_user-permissions'] - 1 < 6 && $_SESSION['visit_user-permissions'] - 1 !=  $_SESSION['user-permissions'] - 1) {
					echo('
					<form action="./tools/php/demoter_promoter/index.php" method="POST">
						<table style="width: 100%;">
							<tr style="width: 100%;">
								<td style="width: 33.33%;">
								');
								if($visit_permissions - 1 > 0) {
									echo('
									<button style="float: left;" title="Den Rank um eins Degradieren" id="demoter" name="demoter" value="'.$visit_username.'">
										Demote
									</button>
									');
								}
								echo('
								</td>
								<td style="width: 33.33%;">
								');
								if($visit_ban_status - 1 == 0) {
									echo('
									<button style="margin-left: 35%;" title="Den Benutzer von der Platform Verbannen" id="banning" name="banning" value="'.$visit_username.'">
										Banning
									</button>
									');
								}
								if($visit_ban_status - 1 == 1) {
									echo('
									<button style="margin-left: 35%;" title="Den Benutzer auf der Platform wieder zulassen" id="unbaning" name="unbaning" value="'.$visit_username.'">
										Unbaning
									</button>
									');
								}
								echo('
								</td>
								<td style="width: 33.33%;">
								');
								if($visit_permissions - 1 < 5) {
									echo('
									<button style="float: right;" title="Den Rank um eins Befördern" id="promoter" name="promoter" value="'.$visit_username.'">
										Promote
									</button>
									');
								}
								echo('
								</td>
							</tr>
						</table>
					</form>
					');
				}
			}
		}
	?>
	<center>
		<button type="button" onclick="location.href='./' <?php unset($_SESSION['visit_user-username']);unset($_SESSION['visit_user-e_mail']);unset($_SESSION['visit_user-register_date']);unset($_SESSION['visit_user-last_login_date']);unset($_SESSION['visit_user-register_ip']);unset($_SESSION['visit_user-last_login_ip']);unset($_SESSION['visit_user-steam_id']);unset($_SESSION['visit_user-permissions']); ?>">Zurück zum Start</button>
	</center>
</div>