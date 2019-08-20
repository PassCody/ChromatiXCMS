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
										Matches
									</div>
									<div class="article_body" id="article_body" name="article_body">
										<table style="width: 100%;">
											<tr>
												<th style='border-bottom:1px groove orange;'>
													Heim Team:
												</th>
												<th style='border-bottom:1px groove orange;'>
													Punkte:
												</th>
												<th style='border-bottom:1px groove orange;'>
													Gast Team:
												</th>
												<th>
												</th>
											</tr>
											<tr>
												<form action='./updater.php' method='POST'>
													<td style='border-bottom:1px groove orange;'>
														<input type="text" name="home_team"><?php echo($_POST['home_team']);?></input>
													</td>
													<td style='border-bottom:1px groove orange;'>
														<table>
															<tr>
																<th>
																</th>
																<th>
																	<input type="text" name="points"><?php echo($_POST['points']);?></input>
																</th>
																<th>
																</th>
															</tr>
															<tr>
																<td>
																	<input type="text" name="map_one_name"><?php echo($_POST['map_one_name']);?></input>
																</td>
																<td>
																</td>
																<td>
																	<input type="text" name="map_one_points"><?php echo($_POST['map_one_points']);?></input>
																</td>
															</tr>
															<tr>
																<td>
																	<input type="text" name="map_two_name"><?php echo($_POST['map_two_name']);?></input>
																</td>
																<td>
																</td>
																<td>
																	<input type="text" name="map_two_points"><?php echo($_POST['map_two_points']);?></input>
																</td>
															</tr>
														</table>
													</td>
													<td style='border-bottom:1px groove orange;'>
														<input type="text" name="guest_team"><?php echo($_POST['guest_team']);?></input>
													</td>
													<td>
														<button type='submit'>Bearbeiten</button>
													</td>
												</form>
											</tr>
										</table>
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