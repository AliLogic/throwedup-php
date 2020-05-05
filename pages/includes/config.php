<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$users = 0;
$chars = 0;
$apps = 0;

try
{
	$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	#echo "Connected successfully";

	$query = $con->prepare("SELECT count(*) FROM users");
	$query->execute();
	$users = $query->fetchColumn();

	$query = $con->prepare("SELECT count(*) FROM characters");
	$query->execute();
	$chars = $query->fetchColumn();

	$query = $con->prepare("SELECT count(*) FROM applications WHERE status = 0");
	$query->execute();
	$apps = $query->fetchColumn();
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

session_start();
function checkForLogin()
{
	if(!isset($_SESSION['playername']))
	{
		//header("Location:login.php");
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    
		exit;
	}
}
?>