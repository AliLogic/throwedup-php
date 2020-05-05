<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if(!isset($_GET['id']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../pages/index.php">';    
	exit;	
}

$charaID = $_GET['id'];
$query = $con->prepare("SELECT * from characters where charid = '$charaID'");
$query->execute();
$gData = $query->fetch();

if($gData['uid'] != $_SESSION['uid'])
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../pages/index.php">';    
	exit;	
}

?>
<div class="container-fluid">
	<h3 class="text-dark mb-4"><?php echo $gData['name']; ?></h3>

	<div class="card-body">
	<div class="row">
		<div class="col-lg-1">
			<img src="../bigskins/<?php echo $gData['skin']; ?>.png" style="height:300px;">
		</div>
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							Hand Money: $<?php echo number_format($gData['cash']); ?>
							<hr />
							Bank Money: $<?php echo number_format($gData['bank']); ?>
							<hr />
							Total Money: $<?php echo number_format($gData['cash'] + $gData['bank']); ?>
							<hr />
							<!-- Prison ID: <?php if($gData['number'] != 0) echo $gData['number']; 
							else echo "None"; ?> -->
							Level: <?php echo number_format($gData['level']); ?>
							<hr />
							Age: <?php echo number_format($gData['age']); ?>
							<hr />
							Health:
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="<?php echo $gData['health']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $gData['health']; ?>%">
									<?php echo $gData['health']; ?>%
								</div>
							</div>
							<hr />
							Armour:
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="<?php echo $gData['armour']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $gData['armour']; ?>%">
									<?php echo $gData['health']; ?>%
								</div>
							</div>
						</div>
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
