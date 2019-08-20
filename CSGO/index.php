<!DOCTYPE html>
<?php
	session_start();
	//require("../tools/anti_proxy.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Team ChromatiX - CS:GO</title>
		<link rel="shortcut icon" href="./imgs/Logo.png" />
		<style rel="stylesheet" type="text/css">
			<?php
				require('./css/background.php');
			?>
		</style>
		<link rel="stylesheet" type="text/css" href="./css/main.css">
		
		<!-- LIBRARY SCRIPTS -->
		<script type="text/javascript" src="./tools/js/lib/jquery.min.js"></script>
		
		<!-- WORKER SCRIPTS -->
		<script type="text/javascript" src="./tools/js/clock/clock.js"></script>
		<script type="text/javascript" src="./tools/js/cookie-hint/cookie-hint.js"></script>
		
	</head>
	
	<body>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$.interactiveCookieHint({
					bottom: true, // position of cookie hint
					html: "<strong>About Cookies</strong> - Diese Seite verwendet Cookies, um Ihre Online-Erfahrung zu verbessern.<br>Wenn Sie diese Website weiterhin nutzen, ohne Ihre Cookie-Einstellungen zu ändern, gehen wir davon aus, dass Sie der Verwendung von Cookies zustimmen.<br>Um weitere Informationen zu erhalten oder Ihre Cookie-Einstellungen zu ändern, besuchen Sie unsere <a href='./?cookie_statement' style='color:white;'>Cookie-Richtlinie</a>, <a href='./?privacy_policy' style='color:white;'>Datenschutz-Richtlinie</a> und <a href='./?disclaimer' style='color:white;'>Haftungsausschlüsse</a>.",
					button: true, // false
					buttonHtmlII: "<strong style='color:white;'>CLOSE</strong>",
					buttonHtmlI: "<strong style='color:white;'>ACCEPT</strong>",
					backgroundColor: "black",
					color: "#ffffff",
				});
			});
		</script>
		<div class="web_page" id="web_page" name="web_page">
			<div class="top_bar" id="top_bar" name="top_bar">
				<div class="date_time" id="date_time" name="date_time" >
				</div>
				<div class="login_register" id="login_register" name="login_register">
					<?php
						if (!isset($_SESSION['besucht']) || $_SESSION['besucht'] == 0) {
							$_SESSION['besucht'] = 0;
							echo("
						<div onclick=\"location.href='./?login'\" class=\"login\" id=\"login\" name=\"login\">Login</div>
						<div onclick=\"location.href='./?register'\" class=\"register\" id=\"register\" name=\"register\">Register</div>
							");
						}
						else {
							if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
						echo("<table><tr><td>Willkommen <a style='color: white;'href='?user_".$_SESSION['user-username']."'>".$_SESSION['user-username']."</a></td>");
						echo('<td><div onclick="location.href=\'.?logout\'" class="logout" id="logout" name="logout">Logout</div></td></tr></table>');
							}
						}
					?>
				</div>
			</div>
			<div onclick="location.href='./'" class="wellcome_bar" id="wellcome_bar" name="wellcome_bar">
			</div>
			<div class="menue_bar" id="menue_bar" name="menue_bar">
				<div class="menue_list" id="menue_list" name="menue_list">
					<table style="margin-top: -4px;">
						<tr>
                        	<td onclick="location.href='./'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == 'CSGO'){echo('_active');} ?>" name="menue_item" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
								Home
							</td>
							<td onclick="location.href='./.?matches'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == '?matches'){echo('_active');} ?>" name="menue_item">
								Matches
							</td>
							<td onclick="location.href='./.?team'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == '?team'){echo('_active');} ?>" name="menue_item">
								Team
							</td>
							<td onclick="location.href='./.?downloads'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == '?downloads'){echo('_active');} ?>" name="menue_item">
								Downloads
							</td>
							<td onclick="location.href='./.?contact'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == '?contact'){echo('_active');} ?>" name="menue_item">
								Contact
							</td>
							<td onclick="location.href='./.?sponsors'" class="menue_item" id="menue_item<?php if (basename($_SERVER['REQUEST_URI']) == '?sponsors'){echo('_active');} ?>" name="menue_item" style="border-top-right-radius: 10px;border-bottom-right-radius: 10px;">
								Sponsors
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="web_content" id="web_content" name="web_content">
				<div class="slide_show" id="slide_show" name="slide_show">
					<div style="max-width:785px; height: 350px; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; margin-left: auto;margin-right: auto; border:solid black 2px;">
						<img class="mySlides fading_animate" src="./imgs/slider/0.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="./imgs/slider/1.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="./imgs/slider/2.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="./imgs/slider/3.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="./imgs/slider/4.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="./imgs/slider/5.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
					</div>
					<script>
						var myIndex = 0;
						carousel();
						function carousel() {
							var i;
							var x = document.getElementsByClassName("mySlides");
							for (i = 0; i < x.length; i++) {
								x[i].style.display = "none";  
							}
							myIndex++;
							if (myIndex > x.length) {
								myIndex = 1
							}    
							x[myIndex-1].style.display = "block";  
							setTimeout(carousel, 9000);
						}
					</script>
				</div>
				<table class="articles" id="articles" name="articles" style="color: orange;font-size: 20px; margin-top:10px;height: auto;margin-left: 10px;margin-right: 10px;">
					<tbody>
						<tr>
							<td style="width: 778px;margin-left: 10px; overflow: hidden; vertical-align: top;">
								<div class="article_item" id="article_item" style="height: auto;">
									<?php
										require("./tools/php/pageloader/side_checker.php");
									?>
								</div>
							</td>
							<td style="width: 259px; margin-right: 10px; overflow:hidden; vertical-align:top;">
									<div class="article_heading" id="article_heading" name="article_heading">
										TeamSpeak Viewer
									</div>
									<div class="article_item" id="article_item" name="article_item" style="width:254px; height:258px;">
										<iframe src="./tools/php/teamspeakviewer/index.php" width="254px" height="254px"></iframe>
									</div>
								<br>
									<div class="article_heading" id="article_heading" name="article_heading">
										Shout-Box
									</div>
									<div class="article_item" id="article_item" name="article_item" style="width:254px; height:258px;">
										<iframe src="./tools/php/shoutbox/index.php" width="254px" height="254px" style="color:orange;"></iframe>
										<?php
											if ($_SESSION['besucht'] == 1 && $_SESSION['user-ban-status'] - 1 == 0) {
												echo("<form action='./tools/php/shoutbox/shoutbox.php' method='POST'>
													<input type='text' name='shout' maxlength='500' style='width: 189px;position: absolute;margin-top: -5px;float: left;'>
													<button style='margin-top: -5px;float: right;margin-right: -5px;'>Senden</button>
												</fomr");
											}
											if ($_SESSION['besucht'] == 1 && $_SESSION['user-ban-status'] - 1 == 1) {
												echo("<h5 style='color: red;margin-top: -6px;'>You Are Banned. This Function Isn't Allowed For Banned Members.</h5>");
											}
										?>
									</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr style="float: initial;">
			<div class="footer" id="footer" name="footer">
				<div class="footer_left" id="footer_left" name="footer_left">
						This webpage is Copyrighted by © <a href="./">Team-ChromatiX</a> 2018 - <?php echo date("Y"); ?> All Rights Reserved.<br>
						Designed by: <a href="https://github.com/PassCody" target="popup-beispiel" onClick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')">PassCody</a><br>
						Initial Code by: <a href="https://github.com/PassCody" target="popup-beispiel" onClick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')">PassCody</a>
				</div>
				<div class="footer_right" id="footer_right" name="footer_right">
					<a href="https://steamcommunity.com/groups/Team-ChromatiX" target="popup-beispiel" onclick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')" style="float: inline-end;"><div class="footer_steam" id="footer_steam" name="footer_steam"></div></a>
					<a href="ts3server://ts.team-chromatix.com?port=9987" target="popup-beispiel" onclick="javascript:open('', 'popup-beispiel', 'height=600,width=800,resizable=no')" style="float: inline-end;"><div class="footer_teamspeak" id="footer_teamspeak" name="footer_teamspeak"></div></a>
				</div>
				<div class="footer_links" id="footer_links" name="footer_links">
					<table style="width:100%;">
						<tbody>
							<tr>
								<td style="width:25%;">
									<a href="./?privacy_policy">Privacy Policy</a>
								</td>
								<td style="width:25%;">
									<a href="./?disclaimer">Disclaimer</a>
								</td>
								<td style="width:25%;">
									<a href="./?cookie_statement">Cookie statement</a>
								</td>
								<td style="width:25%;">
									<a href="./?masthead">Masthead</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>