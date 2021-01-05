<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4Units=$conn->prepare("SELECT * FROM units WHERE id=?");
	$query4Units->execute([$id]);
	$rows4Units=$query4Units->fetchall(PDO::FETCH_ASSOC);
	$count4Units=count($rows4Units);
	if($count4Units!=0)
	{
		$remove=$conn->prepare("DELETE FROM `units` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=36">';
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