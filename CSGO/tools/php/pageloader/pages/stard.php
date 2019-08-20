<div class="article_heading" id="article_heading" name="article_heading">
	Neuzuwachs
</div>
<div class="article_body" id="article_body" name="article_body">
	<?php
		echo("<center>");
		$query = "SELECT * FROM `members` WHERE `permissions` = 0 AND `banned` = 0 ORDER BY entryid DESC LIMIT 1";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_object();
		if (!empty($obj)) {
			echo("Wir heißen bei uns <a href='?".$obj->username."'>".$obj->username."</a> als neues Mitglied willkommen.<br>Wir wünschen dir viel Spaß und Erfolg bei uns.<br><br>");
		}
		$query = "SELECT * FROM `members` WHERE `permissions` > 0 AND `banned` = 0 ORDER BY entryid DESC LIMIT 1";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_object();
		if (!empty($obj)) {
			echo("Wir heißen bei uns <a href='?".$obj->username."'>".$obj->username."</a> als festes neues Mitglied willkommen.<br>Wir wünschen dir viel Spaß und Erfolg bei uns.");
		}
		echo("</center>");
	?>
</div>
<br>
<div class="article_heading" id="article_heading" name="article_heading">
	Willkommen
</div>
<div class="article_body" id="article_body" name="article_body">
	<?php
		$query = "SELECT * FROM `news`";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		if (!empty($obj)) {
			echo str_replace("%p_name%", $p_name, str_replace("%date%", $obj['Date'], utf8_encode($obj['content'])));
		}
		if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
			if (!empty($_SESSION['user-username']) && $_SESSION['user-permissions']-1 == 6 || $_SESSION['user-permissions']-1 == 7) {
				echo("<center><button type=\"button\" onclick=\"location.href='./tools/acp/php/wellcome_editor.php'\">Bearbeiten</button></center>");
			}
		}
	?>
</div>