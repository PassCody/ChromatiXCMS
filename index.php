<!DOCTYPE html>
<html lang="de">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="robots" content="noindex,nofollow" />
		<title>
			ChromatiX-CMS
		</title>
		<link rel="shortcut icon" href="./src/imgs/favicon-icon.png">
		<link rel="stylesheet" type="text/css" href="./src/css/main.css" />
		
		<?php /* LIBARY LOADER */
			require_once("./init.php");
			$init = new Initialisation();
			
			/* RUN LIBARY LOADER */
			$init->loadBS();
			
			/* LOAD CSS FILES */
			$init->loadCSSFiles();
			
			/* LOAD JS FILES */
			$init->loadJSFiles();
		?></head>
	<body id="container-background">
		<?php
			include_once($init->getMainDir()."./src/tools/php/ClassLoader.php");
			$cl = new ClassLoader();
			$cl->printPath($init->getMainDir());
			if (file_exists('./src/tools/config/config.php')) {
				$cl->getObjects()["pl"]->main($cl);
			}
			else {
				$cl->getObjects()["cxcmsi"]->main($cl);
			}
			echo('
				<script type="text/javascript" src="./src/tools/js/Dark-Light-Mode.js"></script>
				<script type="text/javascript" src="./src/tools/js/install-translation.js"></script>
			');
		?>
	</body>
</html>
