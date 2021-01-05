<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4store=$conn->prepare("SELECT * FROM store WHERE id=?");
	$query4store->execute([$id]);
	$rows4store=$query4store->fetchall(PDO::FETCH_ASSOC);
	$count4store=count($rows4store);
	if($count4store!=0)
	{
		$remove=$conn->prepare("DELETE FROM `store` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=4">';
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