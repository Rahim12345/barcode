<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$query4CategoryRemove=$conn->prepare("SELECT * FROM categories WHERE id=?");
	$query4CategoryRemove->execute([$id]);
	$rows4CategoryRemove=$query4CategoryRemove->fetchall(PDO::FETCH_ASSOC);
	$count4CategoryRemove=count($rows4CategoryRemove);
	if($count4CategoryRemove!=0)
	{
		$remove=$conn->prepare("DELETE FROM `categories` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=16">';
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