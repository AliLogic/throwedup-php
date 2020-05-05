<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
?>

<div class="container-fluid">
	<h3 class="text-dark mb-4">My Characters</h3>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
									<?php
									$loggedinID = $_SESSION['uid'];
									$query = $con->prepare("SELECT * from characters where uid = '$loggedinID'");
									$query->execute();
									$count = 0;

									while($gData = $query->fetch())
									{	
										?>

										<div class="card d-flex flex-row">
										<img src="../skins/Skin_<?php echo $gData['skin']; ?>.png" alt="...">
										<div class="card-body">
										<h4 class="card-title"><?php echo $gData['name']; ?></h4>
										<p class="card-text">SOME INFORMATION</p>
										<a href="char.php?id=<?php echo $gData['charid']; ?>" class="btn btn-primary">View</a>
										</div>
										</div>
										
										<?php
										$count += 1;
									}

									if (!$count)
									{
										?>
										<br />
										<div class="row">
											<div class="col-md-6 col-xl-3 mb-4">
												<div class="card shadow border-left-primary py-2">
													<div class="card-body">
														<div class="row align-items-center no-gutters">
															<div class="col mr-2">
																<div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>ERROR</span></div>
																<div class="text-dark font-weight-bold h5 mb-0"><span>You do not have any characters registered!</span></div>
															</div>
															<div class="col-auto"><i class="fas fa-user fa-2x text-gray-300" style="color: rgb(78,115,223);"></i></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>


<?php
include 'includes/footer.php'; 
?>
