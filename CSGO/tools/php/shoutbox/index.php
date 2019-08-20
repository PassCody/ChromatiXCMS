<?php
	session_start();
	$value = "";
	$value = basename($_SERVER['REQUEST_URI']);
	include('../connector/connector.php');
	$query = "SELECT * FROM `shoutbox` ORDER BY entryid DESC";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	while($obj = $result->fetch_object()) {
		if ($obj != null || !empty($obj)) {
		
			echo("
			<p style='font-size: 14px; color:orange;'>
				$obj->text
			</p>
			<table style='width: 100%; font-size: 11px; color:orange;'>
				<tr>
					<td style='text-align: start; color:orange;'>
						Von: <a style='font-size: 11px; color:orange;' href='?".$obj->user."'>".$obj->user."
					</td>
					<td style='text-align: end; color:orange;'>
						Am: ".$obj->date_time."
					</td>
				</tr>
			</table>
			<hr>
			");
		}
		else {
			echo("<center>Shout-Box is empty</center>");
		}
	}
	mysqli_close($db);
?>