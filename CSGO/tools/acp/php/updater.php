<?php
	session_start();
	if ($_POST['updater'] == 'news_display'){
		news_seter();
	}
	else {
		if ($_POST['updater'] == 'matches_display') {
			matches_seter();
		}
		else {
			if($_POST['updater'] == 'match_create'){
				match_create();
			}
		}
	}
	
	
	
	FUNCTION news_seter() {
		require('../../php/connector/connector.php');
		$content = $_POST['news_displayer'];
		$query = "SELECT * FROM `news`";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_object();
		$check = utf8_encode($obj->content);
		if(empty($check)) {
			date_default_timezone_set("Europe/Berlin");
			$timestamp = time();
			$date = date("Y.m.d H:i:s",$timestamp);
			$query = "INSERT INTO `news` (`content`, `Date`) VALUES (?,?)";
			$stmt = $db->prepare($query);
			$stmt->bind_param('ss', utf8_decode($content), $date);
			$stmt->execute();
			$stmt->close();
			header('Location: ../../../');
		}
		else {
			if ($check != $content) {
				date_default_timezone_set("Europe/Berlin");
				$timestamp = time();
				$date = date("Y.m.d H:i:s",$timestamp);
				$query = "UPDATE `news` SET `content`=?,`Date`=?";
				$stmt = $db->prepare($query);
				$stmt->bind_param('ss', utf8_decode($content), $date);
				$stmt->execute();
				$stmt->close();
				header('Location: ../../../');
			}
			else {
				header('Location: ./wellcome_editor.php');
			}
		}
		mysqli_close($db);
	}
	
	FUNCTION matches_seter() {
		require('../../php/connector/connector.php');
		$content = $_POST['matches_displayer'];
		
		$query = "SELECT * FROM `matches`";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$obj = $result->fetch_object();
		if (!empty($obj)) {
			$check = utf8_encode($obj->content);
			if ($check != $content) {
				$query = "UPDATE `matches` SET `content` = ?";
				$stmt = $db->prepare($query);
				$stmt->bind_param('s', utf8_decode($content));
				$stmt->execute();
				header('Location: ../../../?matches');
			}
			else {
				header('Location: ./wellcome_editor.php');
			}
		}
		mysqli_close($db);
	}
	
	FUNCTION match_create() {
		require('../../php/connector/connector.php');
		
		$query = "INSERT INTO `matches`(`home_team`, `guest_team`, `points`, `map_one_name`, `map_one_points`, `map_two_name`, `map_two_points`) VALUES (?,?,?,?,?,?,?)";
		$stmt = $db->prepare($query);
		$stmt->bind_param('sssssss', $_POST['home_team'], $_POST['guest_team'], $_POST['points'], $_POST['map_one_name'], $_POST['map_one_points'], $_POST['map_two_name'], $_POST['map_two_points']);
		$stmt->execute();
		$stmt->close();
		header('Location: ../../../?matches');
		mysqli_close($db);
	}
?>