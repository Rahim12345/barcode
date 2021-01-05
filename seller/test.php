<?php 
include '../include/config.php';
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		// $query4Reserve=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		// $query4Reserve->execute([$mid]);
		// $rows4Reserve=$query4Reserve->fetchall(PDO::FETCH_ASSOC);
		// print_r($rows4Reserve);
		$query4Pay=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		$query4Pay->execute([$mid]);
		$rows4Pay=$query4Pay->fetchall(PDO::FETCH_ASSOC);
		$count4Pay=count($rows4Pay);
		include 'pay_default.php';
	}
	else
	{
		include '404.html';
	}
}
else
{
	include '404.html';
}
?>