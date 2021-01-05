<?php  
include '../include/config.php';
if(isset($_GET["id"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$address=htmlspecialchars(trim($_GET["address"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
	{
		$updateAddress=$conn->prepare("UPDATE `products` SET `warehouse`=? WHERE id=?");
		$updateAddress->execute([$address,$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=17">';
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