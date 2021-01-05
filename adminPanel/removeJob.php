<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4Job=$conn->prepare("SELECT * FROM jobs WHERE id=?");
	$query4Job->execute([$id]);
	$rows4Job=$query4Job->fetchall(PDO::FETCH_ASSOC);
	$count4Job=count($rows4Job);
	if($count4Job!=0)
	{
		$remove=$conn->prepare("DELETE FROM `jobs` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=6">';
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