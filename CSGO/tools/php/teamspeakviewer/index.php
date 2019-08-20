<body style="color:orange;">
<style>
	a {
		color:orange;
		font-size: 19px;
	}
	
	a:hover {
		color:red;
		background-color:orange;
		font-size: 19px;
	}
</style>
<?php
require_once("./ts3ssv.php");
$ts3ssv = new ts3ssv("ts.team-chromatix.com", 10011);
$ts3ssv->useServerPort(9987);
$ts3ssv->timeout = 2;
$ts3ssv->hideEmptyChannels = false;
$ts3ssv->hideParentChannels = false;
$ts3ssv->showNicknameBox = false;
$ts3ssv->showPasswordBox = false;
echo $ts3ssv->render();
?>
<br>
<br>
<br>
Code By: <a href="https://github.com/LeoWinterDE" target="popup-beispiel" onclick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')">LeoWinterDE</a><br>
Edited By: <a href="https://github.com/PassCody" target="popup-beispiel" onclick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')">PassCody</a>
</body>
