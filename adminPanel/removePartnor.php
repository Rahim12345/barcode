<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4PartnorRemove=$conn->prepare("SELECT * FROM  partnyor WHERE id=?");
	$query4PartnorRemove->execute([$id]);
	$rows4PartnorRemove=$query4PartnorRemove->fetchall(PDO::FETCH_ASSOC);
	$count4PartnorRemove=count($rows4PartnorRemove);
	if($count4PartnorRemove!=0)
	{
		$remove=$conn->prepare("DELETE FROM `partnyor` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=19">';
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