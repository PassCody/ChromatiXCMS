<?php
	$value = "";
	$value = basename($_SERVER['REQUEST_URI']);
	if ($value == "db_checker.php"){
		require('../../../../tools/config.php');
		$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
		if($db->connect_error) {
		  exit('Error connecting to database'); //Should be a message a typical user could understand in production
		}
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	}
	else {
		$findMich   = 'editor.php';
		$pos = strpos($value, $findMich);
		if ($value == "updater.php" || $pos == TRUE) {
			require('../../../../tools/config.php');
			$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
			if($db->connect_error) {
			  exit('Error connecting to database'); //Should be a message a typical user could understand in production
			}
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		}
		else {
			if ($value == "shoutbox.php") {
				include('../../../../tools/config.php');
				$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
				if($db->connect_error) {
				  exit('Error connecting to database'); //Should be a message a typical user could understand in production
				}
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			}
			else {
				if (substr($_SERVER['REQUEST_URI'], 22) == 'demoter_promoter/index.php') {
					require('../../../../tools/config.php');
					$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
					if($db->connect_error) {
					  exit('Error connecting to database'); //Should be a message a typical user could understand in production
					}
					mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				}
				else {
					if (substr($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'], -18) == 'shoutbox/index.php') {
						require('../../../../tools/config.php');
						$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
						if($db->connect_error) {
						  exit('Error connecting to database'); //Should be a message a typical user could understand in production
						}
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
					}
					else {
						include('../tools/config.php');
						$db = new mysqli($db_ip, $db_user, $db_password, $db_name, $db_port);
						if($db->connect_error) {
						  exit('Error connecting to database'); //Should be a message a typical user could understand in production
						}
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
					}
				}
			}
		}
	}
?>
