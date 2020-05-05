<?php 
include 'includes/config.php'; 
include 'includes/header.php';

checkForLogin();
?>

<div class="container-fluid">
	<h3 class="text-dark mb-4">Applications</h3>
	<div class="card shadow">
		<div class="card-header py-3">
			<p class="text-primary m-0 font-weight-bold">Pending Applications</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 text-nowrap">
					<div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
				</div>
				<div class="col-md-6">
					<div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
				</div>
			</div>
			<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
				<table class="table dataTable my-0" id="dataTable">
					<thead>
						<tr>
							<th class="text-left">#</th>
							<th class="text-left">Name</th>
							<th class="text-left">Submitted on</th>
							<th class="text-left">Options</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$query = $con -> prepare("SELECT u.uid, u.nick AS nick, a.* FROM applications AS a INNER JOIN users  AS u ON a.uid = u.uid WHERE a.status = 0 LIMIT 10 OFFSET 0;");
					$query -> execute();
					$app_list = $query -> fetchAll(PDO::FETCH_ASSOC);
					$count = 0;

					foreach($app_list as $row)
					{
						$count += 1;
					?>
						<tr>
							<td><?php echo $count?></td>
							<td><img class="rounded-circle mr-2" width="30" height="30" src="../assets/img/avatars/avatar1.jpeg"><?php echo $row['nick'];?></td>
							<td><?php echo $row['date'];?></td>
							<td><button href="app.php?id=<?php echo $row['aid']; ?>" class="btn btn-info text-center" type="button">View</button></td>
						</tr>
					<?php
					}
					?>

					</tbody>
					<tfoot>
						<tr>
							<td><strong>#</strong></td>
							<td><strong>Name</strong></td>
							<td><strong>Submitted on</strong></td>
							<td><strong>Options</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="row">
				<div class="col-md-6 align-self-center">
					<p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to <?php $count ?> of <?php echo number_format($apps); ?></p>
				</div>
				<div class="col-md-6">
					<nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
						<ul class="pagination">
							<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'includes/footer.php'; 
?>