<?php
	unset($_SESSION['user-username']);
	unset($_SESSION['user-e_mail']);
	unset($_SESSION['user-register_date']);
	unset($_SESSION['user-last_login_date']);
	unset($_SESSION['user-register_ip']);
	unset($_SESSION['user-last_login_ip']);
	unset($_SESSION['user-steam_id']);
	unset($_SESSION['user-permissions']);
	unset($_SESSION['besucht']);
	session_destroy();
?>
<meta http-equiv="refresh" content="0; url=./">