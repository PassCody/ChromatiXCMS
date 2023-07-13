<?php
	// ON WORK THIS COULD BE CAUSE ERRORS ATM.
	require_once('./tools/php/connector/connector.php');
	$value = "";
	$value = basename($_SERVER['REQUEST_URI']);
	switch ($value) {
		case "CSGO": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?matches": // Case START
			require_once('./tools/php/pageloader/pages/matches.php');
		break; // Case END
		case "?team": // Case START
			require_once('./tools/php/pageloader/pages/team.php');
		break; // Case END
		case "?downloads": // Case START
			require_once('./tools/php/pageloader/pages/downloads.php');
		break; // Case END
		case "?contact": // Case START
			require_once('./tools/php/pageloader/pages/contact.php');
		break; // Case END
		case "?sponsors": // Case START
			require_once('./tools/php/pageloader/pages/sponsors.php');
		break; // Case END
		case "?login": // Case START
			require_once('./tools/php/pageloader/pages/login.php');
		break; // Case END
		case "?register": // Case START
			require_once('./tools/php/pageloader/pages/register.php');
		break; // Case END
		case "?register_success": // Case START
			echo("<script>alert('Erfolgreich Registriert.');</script>");
			require_once('./?login');
		break; // Case END
		case "?register_denaid": // Case START
			echo("<script>alert('Es gab einen Fehler bei der Registration. Bitte versuchen Sie es erneut.');</script>");
			require_once('./tools/php/pageloader/pages/register.php');
		break; // Case END
		case "?login_success": // Case START
			echo("<script>alert('Erfolgreich Eingelogt.');</script>");
			require_once('./');
		break; // Case END
		case "?login_denaid": // Case START
			echo("<script>alert('Es gab einen Fehler bei der Anmeldung. Bitte versuchen Sie es erneut.');</script>");
			require_once('./tools/php/pageloader/pages/login.php');
		break; // Case END
		case "?privacy_policy": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?disclaimer": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?privacy_policy": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?cookie_statement": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?masthead": // Case START
			require_once('./tools/php/pageloader/pages/stard.php');
		break; // Case END
		case "?user_".$_SESSION['user-username']: // Case START
			if (isset($_SESSION['user-username'])) {
				require_once('./tools/php/pageloader/pages/user_panel.php');
			}
		break; // Case END
		case "?logout": // Case START
			if (isset($_SESSION['user-username'])) {
				require_once('./tools/php/pageloader/pages/logout.php');
			}
		break; // Case END
	}

		$search  = '?';
		$replace = '';
		$subject = basename($_SERVER['REQUEST_URI']);
		$new_value = str_replace($search, $replace, $subject);
		$query = "SELECT * FROM `members` WHERE `username` = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param('s', $new_value);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$obj = $result->fetch_array();
		if ($obj['username'] != null && $obj['username'] == $new_value) {
			$_SESSION['visit_user-username'] = $obj['username'];
			$_SESSION['visit_user-e_mail'] = $obj['e_mail'];
			$_SESSION['visit_user-register_date'] = $obj['register_date'];
			$_SESSION['visit_user-last_login_date'] = $obj['last_login_date'];
			$_SESSION['visit_user-steam_id'] = $obj['steam_id'];
			$_SESSION['visit_user-permissions'] = $obj['permissions'] + 1;
			$_SESSION['visit_user-ban_status'] = $obj['banned'] + 1;
			if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
				if($_SESSION['user-permissions'] - 1 == 6 || $_SESSION['user-permissions'] - 1 == 7) {
					$_SESSION['visit_user-session_id'] = $obj['session_id'];
				}
			}
			require_once('./tools/php/pageloader/pages/usercheck.php');
		}
		else {
			if(strpos($value, "99Damage_Saison") !== false || strpos($value, "PCW_") !== false) {
				require_once('./tools/php/pageloader/pages/matches.php');
			}
			else {
				//header("Location: ./");
			}
		}
	mysqli_close($db);
?>
