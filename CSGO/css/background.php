<?php
	echo("
	@charset 'utf-8';
	/* CSS Document */
	");

	error_reporting(E_ALL);

	$choicer = rand(1, 9);

	echo('
	body{
	background-color: #333;
	background-image: url("./imgs/backgrounds/bg'.$choicer.'.jpg");
	background-attachment: fixed;
	background-position: center;
	background-size: 100% 100%;
	background-repeat: no-repeat;
	}
	');
?>