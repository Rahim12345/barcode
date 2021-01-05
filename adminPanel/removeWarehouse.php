<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4warehouseRemove=$conn->prepare("SELECT * FROM warehouse WHERE id=?");
	$query4warehouseRemove->execute([$id]);
	$rows4warehouseRemove=$query4warehouseRemove->fetchall(PDO::FETCH_ASSOC);
	$count4warehouseRemove=count($rows4warehouseRemove);
	if($count4warehouseRemove!=0)
	{
		$remove=$conn->prepare("DELETE FROM `warehouse` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=2">';
	}
	else
	{
		include 'header.php';
		include '404.html';
		include 'footer.php';
	}
}
else
{
	include 'header.php';
	include '404.html';
	include 'footer.php';
}
?>