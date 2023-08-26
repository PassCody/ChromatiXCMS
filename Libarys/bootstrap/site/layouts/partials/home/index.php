<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">
	<head>
		<title>Error 404</title>
		<style type="text/css">
			<?php
				$value = $_SERVER["REQUEST_URI"];
				$newValue = explode("/", $value);
				$path = "";
				for ($i = 0; $i < (count($newValue)-2); $i++) {
					$path .= "../";
				}
				$path .= "./src/imgs/error/";
				$image = "Dev-Systems_Error404.png";
				echo("
				#error_button {
					background-color: #ff0000;
					color: white;
					padding: 16px;
					font-size: 16px;
					border: none;
					-webkit-border-radius: 10px;
					-moz-border-radius: 10px;
					border-radius: 10px;
					width: 200px;
					text-align: center;
					margin-top: 2px;
				}
				#error_button:hover {
					background-color: #ff5757;
					color: white;
					padding: 16px;
					font-size: 16px;
					border: none;
					-webkit-border-radius: 10px;
					-moz-border-radius: 10px;
					border-radius: 10px;
					width: 200px;
					text-align: center;
					margin-top: 2px;
				}
				#error_text{
					text-align: center;
				}
				img {
					pointer-events: none;
				}
				#error_img {
					width: 80%;
				}
				");
				?>
		
		</style>
	</head>
	
	<?php
		class Initialisation {
			private $direct;
			function getFileLocation() {
				$value = "";
				$value = $_SERVER["REQUEST_URI"];
				return($value);
			}
			function getCurrentDirectory() {
				$dir = "";
				$getFileLocation = $this->getFileLocation();
				$countetSlashes = substr_count($getFileLocation,"/")-1;
				if ($getFileLocation !== "") {
					for ($i = 0; $i < $countetSlashes; $i++) {
						$dir = $dir."../";
					}
				}
				$dir = $dir."./Libarys/bootstrap";
				return $dir;
			}
			function setDirect($dir) {
				$this->direct = $dir;
			}
			function getDirect() {
				return $this->direct;
			}
			function loadBS() {
				$this->setDirect($this->getCurrentDirectory());
				include_once($this->getDirect()."/index.php");
				$loadBS = new LoadBootStrap();
				$loadBS->loadBootStrap();
			}
		}
			
			/* LIBARY LOADER */
			$init = new Initialisation();
			
			/* RUN LIBARY LOADER */
			$init->loadBS();
		?>

	<body>
		<div class="container-fluid" id="error_text">
			<div class="row">
				<div class="col">
					<img id="error_img" src="data:image/png;base64,<?php
						echo(base64_encode(file_get_contents($path.$image)));
					?>
					" alt="Red dot">
					</img>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h1>Page Not Found</h1>
					<p>We're sorry, the page you were looking for isn't found here.</p>
					<p>The link you followed may either be broken or no longer exists.</p>
					<p>Please try again, or take a look at our.</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php
						$value = $_SERVER["REQUEST_URI"];
						$newValue = explode("/", $value);
						$path = "";
						for ($i = 0; $i < (count($newValue)-1); $i++) {
							$path .= "../";
						}
						echo('<a href="'.$path.'">
						<button class="btn btn-primary" id="error_button">Homepage</button>
					</a>');
					?>
					
				</div>
			</div>
		</div>
	</body>
</html>