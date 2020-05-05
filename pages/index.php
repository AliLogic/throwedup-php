<?php 
include 'includes/config.php'; 
include 'includes/header.php';

checkForLogin();
?>

<div class="container-fluid">
	<div class="d-sm-flex justify-content-between align-items-center mb-4">
		<h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-success btn-sm d-flex d-sm-inline-block d-xl-flex mx-auto justify-content-xl-end align-items-xl-center" role="button" href="#"><i class="fas fa-plus-circle fa-sm text-white-50"></i>&nbsp;New</a><a class="btn btn-primary btn-sm d-sm-inline-block"
			role="button" href="#" style="background-color: rgb(54,185,204);"><i class="fas fa-ellipsis-h fa-sm text-white-50"></i></a></div>
	<div class="row">
		<div class="col-md-6 col-xl-3 mb-4">
			<div class="card shadow border-left-primary py-2">
				<div class="card-body">
					<div class="row align-items-center no-gutters">
						<div class="col mr-2">
							<div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>accounts</span></div>
							<div class="text-dark font-weight-bold h5 mb-0"><span><?php echo number_format($users); ?></span></div>
						</div>
						<div class="col-auto"><i class="fas fa-user fa-2x text-gray-300" style="color: rgb(78,115,223);"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3 mb-4">
			<div class="card shadow border-left-success py-2">
				<div class="card-body">
					<div class="row align-items-center no-gutters">
						<div class="col mr-2">
							<div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>CHARACTERS</span></div>
							<div class="text-dark font-weight-bold h5 mb-0"><span><?php echo number_format($chars); ?></span></div>
						</div>
						<div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3 mb-4">
			<div class="card shadow border-left-info py-2">
				<div class="card-body">
					<div class="row align-items-center no-gutters">
						<div class="col mr-2">
							<div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>DONATORS</span></div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>50%</span></div>
								</div>
								<div class="col">
									<div class="progress progress-sm">
										<div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3 mb-4">
			<div class="card shadow border-left-warning py-2">
				<div class="card-body">
					<div class="row align-items-center no-gutters">
						<div class="col mr-2">
							<div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Pending APPS</span></div>
							<div class="text-dark font-weight-bold h5 mb-0"><span><?php echo number_format($apps); ?></span></div>
						</div>
						<div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'includes/footer.php'; 
?>