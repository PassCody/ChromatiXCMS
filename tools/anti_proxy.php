<?php
	$proxy_headers = array(
	'CLIENT_IP',
	'FORWARDED',
	'FORWARDED_FOR',
	'FORWARDED_FOR_IP',
	'VIA',
	'X_FORWARDED',
	'X_FORWARDED_FOR',
	'HTTP_CLIENT_IP',
	'HTTP_FORWARDED',
	'HTTP_FORWARDED_FOR',
	'HTTP_FORWARDED_FOR_IP',
	'HTTP_PROXY_CONNECTION',
	'HTTP_VIA',
	'HTTP_X_FORWARDED',
	'HTTP_X_FORWARDED_FOR');
	
	foreach($proxy_headers as $x){
		if (@isset($_SERVER[$x])){
			echo("<script type=\'text/javascript\'>alert(\'Proxy Visits aren\'t allowed on this Website. Come back without your Proxy.\');</script>");
			Proxy_Detection();
		}
	}
	
	$ports = array(80,81,553,554,1080,3128,4480,6588,8000,8080);
	foreach($ports as $port) {
		if (@fsockopen($_SERVER['REMOTE_ADDR'], $port, $errno, $errstr, 30)) {
			echo("<script type=\'text/javascript\'>alert(\'Proxy Visits aren\'t allowed on this Website. Come back without your Proxy.\');</script>");
			Proxy_Detection();
		}
	}
	
	FUNCTION Proxy_Detection() {
		die(header("Location: https:www.google.com/"));
	}
?>