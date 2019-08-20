<?php
	session_start();
	if ($_POST['db_check_button'] == 'login'){
		login();
	}
	else {
		if ($_POST['db_check_button'] == 'register'){
			register();
		}
		else {
			if ($_POST['db_check_button'] == 'contact'){
				contact();
			}
			else {
				if ($_POST['db_check_button'] != 'register' || $_POST['db_check_button'] != 'login' || $_POST['db_check_button'] != 'contact'){
					header('Location: ../../../');
					exit;
				}
			}
			
		}
	}
	FUNCTION login() {
		require('./connector.php');
		$user = "";
		$key = "";
		
		$user = $_POST["account"];
		$key = sha1(sha1(strtoupper($_POST['account']).':'.strtoupper($_POST['passwort'])).':'.sha1(strtoupper($_POST['account']).':'.strtoupper($_POST['passwort'])));
		if (!empty($user) && !empty($key)) {
			$query = "SELECT * FROM `members` WHERE `username` = ?";
			$stmt = $db->prepare($query);
			$stmt->bind_param('s', $param);
			$param = $user;
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			$obj = $result->fetch_object();
			if ($obj->username != null && $obj->username == $user) {
				if ($obj->password != null && $obj->password == $key) {
					if(empty($obj)){
						exit('No Objects found');
					}
					else{
						date_default_timezone_set("Europe/Berlin");
						$timestamp = time();
						$datum = date("Y-m-d H:i:s",$timestamp);
						$ip = $_SERVER['REMOTE_ADDR'];
						$_SESSION['user-username'] = $obj->username;
						$_SESSION['user-e_mail'] = $obj->e_mail;
						$_SESSION['user-register_date'] = $obj->register_date;
						$_SESSION['user-last_login_date'] = $obj->last_login_date;
						$_SESSION['user-register_ip'] = $obj->register_ip;
						$_SESSION['user-last_login_ip'] = $obj->last_login_ip;
						$_SESSION['user-steam_id'] = $obj->steam_id;
						$_SESSION['user-permissions'] = $obj->permissions + 1;
						$_SESSION['user-ban-status'] = $obj->banned + 1;
						$_SESSION['user-session_id'] = session_id();
						$_SESSION['besucht'] = 1;
						$query = "UPDATE `members` SET `last_login_date` = ?, `last_login_ip` = ?, `session_id` = ? WHERE `username` = ?;";
						$stmt = $db->prepare($query);
						$stmt->bind_param('ssss', $datum, $ip, $_SESSION['user-session_id'], $obj->username);
						$stmt->execute();
						$stmt->close();
						header('Location: ../../../');
					}
				}
			}
		}
		mysqli_close($db);
	}
	
	FUNCTION register() {
		require('./connector.php');
		$user = "";
		$key = "";
		$mail = "";
		$steam_id = "";
		$user = $_POST['account'];
		$key = sha1(sha1(strtoupper($_POST['account']).':'.strtoupper($_POST['passwort'])).':'.sha1(strtoupper($_POST['account']).':'.strtoupper($_POST['passwort'])));
		$mail = $_POST['e-mail'];
		$steamid = $_POST['steam-id'];
		if (!empty($user) && !empty($key) && !empty($mail) && !empty($steamid)) {
			$meinString = $steamid;
			$posI = strpos($meinString, 'steam_');
			$posII = strpos($meinString, ':');
			if ($posI == 0 && $posII == 7) {
				$stmt = $db->prepare("SELECT username FROM members WHERE username = ?");
				$stmt->bind_param("s", $user);
				$stmt->execute();
				$obj = $stmt->get_result()->fetch_object();
				$stmt->close();
				if($obj = null || empty($obj)) {
					$stmt = $db->prepare("SELECT e_mail FROM members WHERE e_mail = ?");
					$stmt->bind_param("s", $mail);
					$stmt->execute();
					$obj = $stmt->get_result()->fetch_object();
					$stmt->close();
					if($obj = null || empty($obj)) {
						$stmt = $db->prepare("SELECT steam_id FROM members WHERE steam_id = ?");
						$stmt->bind_param("s", $meinString);
						$stmt->execute();
						$obj = $stmt->get_result()->fetch_object();
						$stmt->close();
						if($obj = null || empty($obj)) {
							$ip = $_SERVER['REMOTE_ADDR'];
							date_default_timezone_set("Europe/Berlin");
							$timestamp = time();
							$date = date("Y-m-d H:i:s",$timestamp);
							$stmt = $db->prepare("INSERT INTO `members`(`username`, `password`, `e_mail`, `register_date`, `last_login_date`, `register_ip`, `last_login_ip`, `staff_id`, `permissions`, `steam_id`, `banned`) VALUES (?,?,?,?,'0000-00-00',?,'0.0.0.0','0','0',?,'0')");
							$stmt->bind_param('ssssss', $paramI, $paramII, $paramIII, $paramIV, $paramV, $paramVI);
							$paramI		= $user;
							$paramII	= $key;
							$paramIII	= $mail;
							$paramIV	= $date;
							$paramV		= $ip;
							$paramVI	= $meinString;
							$stmt->execute();
							$stmt->close();
							header("Location: ../../../?login");
						}
						else {
							header("Location: ../../../?register");
						}
					}
					else {
						header("Location: ../../../?register");
					}
				}
				else {
					header("Location: ../../../?register");
				}
			}
		}
		mysqli_close($db);
		exit;
	}
	
	FUNCTION contact() {
		if ($_SESSION['besucht'] == 1) {
			require('./connector.php');
			require('../../../../tools/config.php');
			if (!empty($_POST['betreff']) && !empty($_POST['massage'])) {
				$nachricht = "SteamID: ".$_POST['steam_id']."\n"."E-Mail: ".$_POST['e_mail']."\n\nMassage:".$_POST['massage']."";
				// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
 				$header[] = 'MIME-Version: 1.0';
				$header[] = 'Content-type: text/html; charset=iso-8859-1';
				$header[] = 'To: '.$e_mail.'';
				$header[] = 'From: '.$_POST['e_mail'].'';
				$mailSent = @mail($e_mail, $_POST['betreff'], $nachricht, $header);
				
				$query = "INSERT INTO `contact`(`content`) VALUES (?)";
				$stmt = $db->prepare($query);
				$e_mailArray = array ('To: '.$e_mail.'', 'From: '.$_POST['e_mail'].'');
				foreach ($e_mailArray as &$stmt_key) {
					$stmt_param = $stmt_key."".$header."\n\n";
				}
				$stmt_param = $stmt_param."\n\n".$betreff."\n\n".$nachricht."";
				$stmt->bind_param('s', $stmt_param);
				$stmt->execute();
				$stmt->close();
				if($mailSent == TRUE) {
				   header("Location: ../../../");
				}
				else {
				  header("Location: ../../../?contact");
				}
			}
			else {
				echo("<script>alert('Sie haben nicht alle Felder Ausgefüllt.');</script>");
				header('Location: ../../../?contact');
			}
		}
		else {
			if (!empty($_POST['betreff']) && !empty($_POST['massage'])) {
				$nachricht = "E-Mail: ".$_POST['e_mail']."\n\nMassage:".$_POST['massage']."";
				// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
 				$header[] = 'MIME-Version: 1.0';
				$header[] = 'Content-type: text/html; charset=iso-8859-1';
				$header[] = 'To: '.$e_mail.'';
				$header[] = 'From: '.$_POST['e_mail'].'';
				$mailSent = @mail($e_mail, $_POST['betreff'], $nachricht, $header);
				
				$query = "INSERT INTO `contact`(`content`) VALUES (?)";
				$stmt = $db->prepare($query);
				$e_mailArray = array ('To: '.$e_mail.'', 'From: '.$_POST['e_mail'].'');
				foreach ($e_mailArray as &$stmt_key) {
					$stmt_param = $stmt_key."".$header."\n\n";
				}
				$stmt_param = $stmt_param."\n\n".$betreff."\n\n".$nachricht."";
				$stmt->bind_param('s', $stmt_param);
				$stmt->execute();
				$stmt->close();
				if($mailSent == TRUE) {
				   header("Location: ../../../");
				}
				else {
				  header("Location: ../../../?contact");
				}
			}
		}
		exit;
	}
?>
