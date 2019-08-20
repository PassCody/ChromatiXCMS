<div class="article_heading" id="article_heading" name="article_heading">
	Matches
</div>
<div class="article_body" id="article_body" name="article_body">
	<table style="width: 100%;">
		<tr>
			<th style='border-bottom:1px groove orange;'>
				Heim Team:
			</th>
			<th style='border-bottom:1px groove orange;'>
				Punkte:
			</th>
			<th style='border-bottom:1px groove orange;'>
				Gast Team:
			</th>
			<th>
			</th>
		</tr>
		<?php
			echo(substr($value, strpos($value, "?") + 9));
			$query = "SELECT * FROM `matches`";
			$stmt = $db->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			while($obj = $result->fetch_object()) {
				echo("
				<tr>
					<form action='./tools/acp/php/matches_editor.php' method='POST'>
						<td style='text-align: start; border-bottom:1px groove orange;' name='home_team'>
							".utf8_encode($obj->home_team)."
						</td>
						<td style='border-bottom:1px groove orange;'>
							<table style='width: 100%;'>
								<tr>
									<th>
									</th>
									<th style='text-align: center;' name='points'>
										".utf8_encode($obj->points)."
									</th>
									<th>
									</th>
								</tr>
								<tr>
									<td style='text-align: start;' name='map_one_name'>
										".utf8_encode($obj->map_one_name)."
									</td>
									<td>
									</td>
									<td style='text-align: end;' name='map_one_points'>
										".utf8_encode($obj->map_one_points)."
									</td>
								</tr>
								<tr>
									<td style='text-align: start;' name='map_two_name'>
										".utf8_encode($obj->map_two_name)."
									</td>
									<td>
									</td>
									<td style='text-align: end;' name='map_two_points'>
										".utf8_encode($obj->map_two_points)."
									</td>
								</tr>
							</table>
						</td>
						<td style='border-bottom:1px groove orange; text-align: end;' name='guest_team'>
							".utf8_encode($obj->guest_team)."
						</td>
					</form>
				</tr>
				");
			}
		?> 
	</table>
		<?php
			if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
				if (!empty($_SESSION['user-username']) && $_SESSION['user-permissions']-1 == 6 || $_SESSION['user-permissions']-1 == 7) {
					echo("
					<center>
						<button type=\"button\" onclick=\"location.href='./tools/acp/php/matches_add_match.php'\">Erstellen</button>
					</center>
					");
				}
			}
		?>
</div>
