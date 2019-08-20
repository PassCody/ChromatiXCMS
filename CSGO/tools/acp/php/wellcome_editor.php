<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Team ChromatiX - CS:GO</title>
		<link rel="shortcut icon" href="../../../imgs/Logo.png" />
		<style>
			<?php
				require("../../../css/background.php");
			?>
		</style>
		<link rel="stylesheet" type="text/css" href="../../../css/main.css">	
		<script src="https://cdn.tiny.cloud/1/jqezn191mpgg3jt8y55fmpuaolfs5i0ns1m7m2pjrrlo81u6/tinymce/5/tinymce.min.js"></script> 
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
	
	<body>
		<div class="web_page" id="web_page" name="web_page">
			<div onclick="location.href='./'" class="wellcome_bar" id="wellcome_bar" name="wellcome_bar">
			</div>
			<div class="web_content" id="web_content" name="web_content">
				<div class="slide_show" id="slide_show" name="slide_show">
					<div style="max-width:785px; height: 350px; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; margin-left: auto;margin-right: auto; border:solid black 2px;">
						<img class="mySlides fading_animate" src="../../../imgs/slider/0.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="../../../imgs/slider/1.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="../../../imgs/slider/2.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="../../../imgs/slider/3.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="../../../imgs/slider/4.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
						<img class="mySlides fading_animate" src="../../../imgs/slider/5.jpg" style="width:785px; height: 350px; border-top-left-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;"></img>
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
									<div class="article_heading" id="article_heading" name="article_heading">
										Willkommen
									</div>
									<div class="article_body" id="article_body" name="article_body">
										<?php
											if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
												if (!empty($_SESSION['user-username']) && $_SESSION['user-permissions']-1 > 5) {
													require('../../php/connector/connector.php');
													$query = "SELECT * FROM `news`";
													$stmt = $db->prepare($query);
													$stmt->execute();
													$result = $stmt->get_result();
													$obj = $result->fetch_object();
														echo("
															<form action='./updater.php' method='POST'>
																<textarea cols='50' rows='10' id='news_displayer' name='news_displayer' style='width: 99%;height: 290px;' maxlength='8000'>");
																if(!empty($obj)){
																	echo(substr(utf8_encode($obj->content), -0, -268));
																}echo("
																<table style='width: 100%;'>
	<tbody>
		<tr style='width: 100%;'>
			<td style='text-align: left; width: 50%;'>Euer <strong>%p_name%</strong></td>
			<td style='text-align: right; width: 50%;'>Gepostet am: <strong>%date%</strong></td>
		</tr>
	</tbody>
</table>
																</textarea>
																<table style=\"width: 100%;\">
																	<tr>
																		<td>
																			<button type='submit' id='updater' name='updater' value='news_display'>Absenden</button>
																		</td>
																		<td>
																			<button type='reset' style='float: inline-end;' >Zurücksetzen</button>
																		</td>
																	</tr>
																</table>
															</form>
														");
													}
													mysqli_close($db);
											}
										?>
									</div>
								</div>
							</td>
							<td style="width: 259px; margin-right: 10px; overflow:hidden; vertical-align:top;">
								<div class="article_heading" id="article_heading" name="article_heading">
									TeamSpeak Viewer
								</div>
								<div class="article_item" id="article_item" name="article_item" style="width:259px; height:331px;">
									<iframe src="../../php/teamspeakviewer/index.php" width="255px" height="328px"></iframe>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<center>
					<a href="../../../"><button>Zurück</button></a>
				</center>
			</div>
		</div>
	</body>
</html>