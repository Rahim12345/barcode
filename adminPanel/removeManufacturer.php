<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$queryManufacturer4Remove=$conn->prepare("SELECT * FROM manufacturer WHERE id=?");
	$queryManufacturer4Remove->execute([$id]);
	$rowsManufacturer4Remove=$queryManufacturer4Remove->fetchall(PDO::FETCH_ASSOC);
	$countManufacturer4Remove=count($rowsManufacturer4Remove);
	if($countManufacturer4Remove!=0)
	{
		$remove=$conn->prepare("DELETE FROM `manufacturer` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=11">';
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