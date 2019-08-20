<?php
	session_start();
		
	if(isset($_POST['promoter'])) {
		$user = "";
		$user = $_POST['promoter'];
		echo("Promote User '".$user."'<br>");
		promote($user);
	}
	else {
		if(isset($_POST['demoter'])) {
			$user = "";
			$user = $_POST['demoter'];
			echo("Demote ".$user."<br>");
			demote($user);
		}
		else {
			if(isset($_POST['banning'])) {
				$user = "";
				$user = $_POST['banning'];
				echo("Banning ".$user."<br>");
				banning($user);
			}
			else {
				if(isset($_POST['unbaning'])) {
					$user = "";
					$user = $_POST['unbaning'];
					echo("Unbaning ".$user."<br>");
					unbaning($user);
				}
				else {
					echo("No Button was pushed bye bye!");
					header('Location: ../../../');
					exit;
				}
			}
		}
	}
	
	
	FUNCTION promote($user) {
		require('../connector/connector.php');
		$query = "SELECT * FROM `members` WHERE `username` = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		$permissions = $obj['permissions'];
		echo("<br> $permissions");
		if ($permissions < 5) {
			echo("Promoten could start now...<br>");
			$query = "UPDATE `members` SET `permissions` = ? WHERE `username` = ?;";
			$stmt = $db->prepare($query);
			$permissions = $permissions + 1;
			$stmt->bind_param('ss', $permissions, $user);
			$stmt->execute();
			$stmt->close();
			
				$admin_session = session_id();
				$session_id_to_destroy = $_SESSION['visit_user-session_id'];
				session_write_close();
				session_id($session_id_to_destroy);
				session_start();
				$_SESSION[user-permissions] = $permissions + 1;
				session_write_close();
				session_id($admin_session);
				session_start();
			
			echo("Promoten successed...");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
		else {
			echo("Promoten couldn't start now...");
			echo("Promoten failed...<br>");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
	}
	
	FUNCTION demote($user) {
		require('../connector/connector.php');
		$query = "SELECT * FROM `members` WHERE `username` = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		$permissions = $obj['permissions'];
		echo("<br> $permissions");
		if ($permissions != 0 && $permissions < 6) {
			echo("Demoten could start now...<br>");
			$query = "UPDATE `members` SET `permissions` = ? WHERE `username` = ?;";
			$stmt = $db->prepare($query);
			$permissions = $permissions - 1;
			$stmt->bind_param('ss', $permissions, $user);
			$stmt->execute();
			$stmt->close();
			
				$admin_session = session_id();
				$session_id_to_destroy = $_SESSION['visit_user-session_id'];
				session_write_close();
				session_id($session_id_to_destroy);
				session_start();
				$_SESSION[user-permissions] = $permissions + 1;
				session_write_close();
				session_id($admin_session);
				session_start();
			
			echo("Demoten successed...");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
		else {
			echo("Demoten couldn't start now...<br>");
			echo("Demoten failed...<br>");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
	}
	
	FUNCTION banning($user) {
		require('../connector/connector.php');
		$query = "SELECT * FROM `members` WHERE `username` = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		$banned = $obj['banned'] + 1;
		echo("<br> $banned");
		if ($banned - 1 == 0) {
			echo("Banning could start now...<br>");
			$query = "UPDATE `members` SET `banned` = ? WHERE `username` = ?;";
			$stmt = $db->prepare($query);
			$banned = 1;
			$stmt->bind_param('ss', $banned, $user);
			$stmt->execute();
			$stmt->close();
			echo("Banning successed...");
			echo("Bye Bye!<br>");
			
				$admin_session = session_id();
				$session_id_to_destroy = $_SESSION['visit_user-session_id'];
				session_write_close();
				session_id($session_id_to_destroy);
				session_start();
				$_SESSION[user-ban-status] = 2;
				session_write_close();
				session_id($admin_session);
				session_start();
			
			back_to_home($db);
		}
		else {
			echo("Demoten couldn't start now...<br>");
			echo("Demoten failed...<br>");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
	}
	
	FUNCTION unbaning($user) {
		require('../connector/connector.php');
		$query = "SELECT * FROM `members` WHERE `username` = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		$banned = $obj['banned'] + 1;
		echo("<br> $banned");
		if ($banned - 1 == 1) {
			echo("Banning could start now...<br>");
			$query = "UPDATE `members` SET `banned` = ? WHERE `username` = ?;";
			$stmt = $db->prepare($query);
			$banned = 0;
			$stmt->bind_param('ss', $banned, $user);
			$stmt->execute();
			$stmt->close();
			echo("Banning successed...");
			echo("Bye Bye!<br>");
			
				$admin_session = session_id();
				$session_id_to_destroy = $_SESSION['visit_user-session_id'];
				session_write_close();
				session_id($session_id_to_destroy);
				session_start();
				$_SESSION[user-ban-status] = 1;
				session_write_close();
				session_id($admin_session);
				session_start();
			
			back_to_home($db);
		}
		else {
			echo("Demoten couldn't start now...<br>");
			echo("Demoten failed...<br>");
			echo("Bye Bye!<br>");
			back_to_home($db);
		}
	}
	
	FUNCTION back_to_home() {
		mysqli_close($db);
		header('Location: ../../../');
		exit;
	}
	
?>