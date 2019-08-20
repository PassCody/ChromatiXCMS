<?php
	if(isset($_POST['domain_name'])) {
		if(isset($_POST['project_name'])) {
			if(isset($_POST['db_ip'])) {
				if(isset($_POST['db_port'])) {
					if(isset($_POST['db_user'])) {
						if(isset($_POST['db_key'])) {
							if(isset($_POST['db_name'])) {
								if(isset($_POST['f_name'])) {
									if(isset($_POST['l_name'])) {
										if(isset($_POST['street'])) {
											if(isset($_POST['p_code'])) {
												if(isset($_POST['land'])) {
													if(isset($_POST['e_mail'])) {
							/* Writing the Config file */
if(!file_exists('./tools')) {
	mkdir("./tools",6777, TRUE);
}
$fp = fopen('./tools/config.php', 'w');
fwrite($fp, "<?php
/* General Stuff */
	\$d_name		= '".$_POST['domain_name']."';	/* Domain */
	\$p_name		= '".$_POST['project_name']."';				/* Project Name */
/* Database Connection */
	\$db_ip			= '".$_POST['db_ip']."';				/* DataBase IP */
	\$db_port		= '".$_POST['db_port']."';					/* DataBase Port */
	\$db_user 		= '".$_POST['db_user']."';					/* DataBase User */
	\$db_password	= '".$_POST['db_key']."';				/* DataBase Password */
	\$db_name		= '".$_POST['db_name']."';				/* DataBase Name */
	
/* Priavate Stuff For Law Stuff */
	\$f_name 		= '".$_POST['f_name']."';				/* First Name */
	\$l_name	    	= '".$_POST['l_name']."';					/* Last Name */
	\$street	    	= '".$_POST['street']."';	/* Street and House Number */
	\$p_code	    	= '".$_POST['p_code']."';		/* Post Code & State*/
	\$land	    	= '".$_POST['land']."';				/* Land */
	\$e_mail	    	= '".$_POST['e_mail']."';		/* Contact E-Mail */
?>");
$fp = fopen('./tools/index.html', 'w');
fwrite($fp, "<!DOCTYPE html>
<html>
	<head>
		<title>Error 404</title>
		<?xml version='1.0' encoding='UTF-8'?>
		<link rev='made' href='mailto:".$_POST['e_mail']."' />
		<style type='text/css'><!--/*-->
			<![CDATA[/*><!--*/ 
			body { color: #000000; background-color: #FFFFFF; }
			a:link { color: #0000CC; }
			p, address {margin-left: 3em;}
			span {font-size: smaller;}
			/*]]>*/-->
		</style>
	</head>
	<body>
		<center>
			<h1>ERROR 404 PAGE NOT FOUND</h1>
			Don't worry, this isn't the end.<br>
			Click to the Back Button<br>
			<button onclick='location.href=\"../\"'>Back to Start</button>
		</center>
	</body>
</html>
");
/* Create and write the Database  */
$db = new mysqli($_POST['db_ip'], $_POST['db_user'], $_POST['db_key'], '', $_POST['db_port']);
if(!$db) {
	exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
$db_name = $_POST['db_name'];
$query = "CREATE DATABASE IF NOT EXISTS $db_name";
$resault = mysqli_query($db, $query);
$query = "USE $db_name;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `members` (
	`entryid` BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR(32) NOT NULL,
	`password` VARCHAR(40) NOT NULL,
	`e_mail` VARCHAR(255) NOT NULL,
	`register_date` VARCHAR(19) NOT NULL,
	`last_login_date` VARCHAR(19) NOT NULL,
	`register_ip` VARCHAR(15) NOT NULL,
	`last_login_ip` VARCHAR(15) DEFAULT '0.0.0.0',
	`staff_id` BIGINT(20) NOT NULL,
	`permissions` BIGINT(20) NOT NULL,
	`steam_id` VARCHAR(255) NOT NULL,
	`banned` SMALLINT(6) NOT NULL,
	`session_id` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `permissions` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `permissions` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "INSERT INTO `permissions` (`entryid`, `permissions`, `name`) VALUES
(1, 0, 'User'),
(2, 1, 'Member'),
(3, 2, 'VIP'),
(4, 3, 'Moderator'),
(5, 4, 'Supporter'),
(6, 5, 'Team Leader'),
(7, 6, 'Admin'),
(8, 7, 'Owner');";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `news` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `matches` (
  `home_team` varchar(255) NOT NULL,
  `guest_team` varchar(255) NOT NULL,
  `points` varchar(5) NOT NULL,
  `map_one_name` varchar(255) NOT NULL,
  `map_one_points` varchar(5) NOT NULL,
  `map_two_name` varchar(255) NOT NULL,
  `map_two_points` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `team` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `downloads` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `contact` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `sponsors` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
$query = "CREATE TABLE IF NOT EXISTS `shoutbox` (
  `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `user` varchar(32) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$resault = mysqli_query($db, $query);
mysqli_close($db);
if (file_exists('./CSGO/tools/php/teamspeakviewer/setup.php.js')) {
	header('Location: ./CSGO/tools/php/teamspeakviewer/setup.php');
	exit;
}
else {
	header('Location: ./');
	exit;
}
													}
													else {
														header('Location: ./installer.php');
														exit;
													}
												}
												else {
													header('Location: ./installer.php');
													exit;
												}
											}
											else {
												header('Location: ./installer.php');
												exit;
											}
										}
										else {
											header('Location: ./installer.php');
											exit;
										}
									}
									else {
										header('Location: ./installer.php');
										exit;
									}
								}
								else {
									header('Location: ./installer.php');
									exit;
								}
							}
							else {
								header('Location: ./installer.php');
								exit;
							}
						}
						else {
							header('Location: ./installer.php');
							exit;
						}
					}
					else {
						header('Location: ./installer.php');
						exit;
					}
				}
				else {
					header('Location: ./installer.php');
					exit;
				}
			}
			else {
				header('Location: ./installer.php');
				exit;
			}
		}
		else {
			header('Location: ./installer.php');
			exit;
		}
	}
	else {
		header('Location: ./installer.php');
		exit;
	}
?>