<div class="article_heading" id="article_heading" name="article_heading">
	Das Team
</div>
<div class="article_body" id="article_body" name="article_body">
	<?php
		$query = "SELECT * FROM `members` WHERE `permissions` > 0 AND `banned` = 0 ";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		while($obj = $result->fetch_object()){
			echo("
			<table style='width: 100%;'>
				<tr style='width: 100%;'>
					<td style='border-bottom:1pt solid grey; width: 50%; text-align: start;'>
						<img src='./imgs/Logo.png' style='width:250px; height: 250px;'></img>
					</td>
					<td style='border-bottom:1pt solid grey; width: 50%; text-align: end;'>
						<a href='?".$obj->username."'>".$obj->username."</a><br>");
						if ($obj->permissions+1-1 == 0) {
							echo("<p style='color:#29f6e3;'>User</p>");
						}
						if ($obj->permissions+1-1 == 1) {
							echo("<p style='color:#292ff6;'>Member</p>");
						}
						if ($obj->permissions+1-1 == 2) {
							echo("<p style='color:#f69329;'>VIP</p>");
						}
						if ($obj->permissions+1-1 == 3) {
							echo("<p style='color:#3cf629;'>Moderator</p>");
						}
						if ($obj->permissions+1-1 == 4) {
							echo("<p style='color:#29b2f6;'>Supporter</p>");
						}
						if ($obj->permissions+1-1 == 5) {
							echo("<p style='color:#e3f629;'>Team Leader</p>");
						}
						if ($obj->permissions+1-1 == 6) {
							echo("<p style='color:#f68029;'>Admin</p>");
						}
						if ($obj->permissions+1-1 == 7) {
							echo("<p style='color:#f62929;'>Owner</p>");
						}
					echo("				
					</td>
				</tr>
			</table>
			");
		}
	?>
</div>
