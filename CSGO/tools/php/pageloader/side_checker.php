<?php
	require('./tools/php/connector/connector.php');
	$value = "";
	$value = basename($_SERVER['REQUEST_URI']);
	if($value == "CSGO") {
		require('./tools/php/pageloader/pages/stard.php');
	}
	else {
		if($value == "?matches") {
			require('./tools/php/pageloader/pages/matches.php');
		}
		else {
			if($value == "?team") {
				require('./tools/php/pageloader/pages/team.php');
			}
			else {
				if($value == "?downloads") {
					require('./tools/php/pageloader/pages/downloads.php');
				}
				else {
					if($value == "?contact") {
						require('./tools/php/pageloader/pages/contact.php');
					}
					else {
						if($value == "?sponsors") {
							require('./tools/php/pageloader/pages/sponsors.php');
						}
						else {
							if($value == "?login") {
								require('./tools/php/pageloader/pages/login.php');
							}
							else {
								if($value == "?register") {
									require('./tools/php/pageloader/pages/register.php');
								}
								else {
									if($value == "?register_success") {
										echo("Erfolgreich Registriert");
									}
									else {
										if($value == "?register_denaid") {
											echo("<script>alert('Es gab einen Fehler bei der Registration. Bitte versuchen Sie es erneut.');</script>");
											require('./tools/php/pageloader/pages/register.php');
										}
										else {
											if($value == "?login_success") {
												echo("Erfolgreich Eingelogt");
											}
											else {
												if($value == "?login_denaid") {
													echo("<script>alert('Es gab einen Fehler bei der Anmeldung. Bitte versuchen Sie es erneut.');</script>");
													require('./tools/php/pageloader/pages/login.php');
												}
												else {
													if($value == "?privacy_policy") {
														require('./tools/php/pageloader/pages/privacy_policy.php');
													}
													else {
														if($value == "?disclaimer") {
															require('./tools/php/pageloader/pages/disclaimers.php');
														}
														else {
															if($value == "?cookie_statement") {
																require('./tools/php/pageloader/pages/cookie_statement.php');
															}
															else {
																if($value == "?masthead") {
																	require('./tools/php/pageloader/pages/masthead.php');
																}
																else {
																	if(isset($_SESSION['user-username']) && $value == "?user_".$_SESSION['user-username']) {
																		require('./tools/php/pageloader/pages/user_panel.php');
																	}
																	else {
																		if(isset($_SESSION['user-username']) && $value == "?logout") {
																			require('./tools/php/pageloader/pages/logout.php');
																		}
																		else {
																			$search  = '?';
																			$replace = '';
																			$subject = basename($_SERVER['REQUEST_URI']);
																			$new_value = str_replace($search, $replace, $subject);
																			$query = "SELECT * FROM `members` WHERE `username` = ?";
																			$stmt = $db->prepare($query);
																			$stmt->bind_param('s', $new_value);
																			$stmt->execute();
																			$result = $stmt->get_result();
																			$stmt->close();
																			$obj = $result->fetch_array();
																			if ($obj['username'] != null && $obj['username'] == $new_value) {
																				$_SESSION['visit_user-username'] = $obj['username'];
																				$_SESSION['visit_user-e_mail'] = $obj['e_mail'];
																				$_SESSION['visit_user-register_date'] = $obj['register_date'];
																				$_SESSION['visit_user-last_login_date'] = $obj['last_login_date'];
																				$_SESSION['visit_user-steam_id'] = $obj['steam_id'];
																				$_SESSION['visit_user-permissions'] = $obj['permissions'] + 1;
																				$_SESSION['visit_user-ban_status'] = $obj['banned'] + 1;
																				if (isset($_SESSION['besucht']) && $_SESSION['besucht'] == 1) {
																					if($_SESSION['user-permissions'] - 1 == 6 || $_SESSION['user-permissions'] - 1 == 7) {
																						$_SESSION['visit_user-session_id'] = $obj['session_id'];
																					}
																				}
																				require('./tools/php/pageloader/pages/usercheck.php');
																			}
																			else {
																				if(strpos($value, "99Damage_Saison") !== false || strpos($value, "PCW_") !== false) {
																					require('./tools/php/pageloader/pages/matches.php');
																				}
																				else {
																					//header("Location: ./");
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	mysqli_close($db);
?>
