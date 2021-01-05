<?php  
include '../include/config.php';
if(isset($_GET["id"]) && isset($_GET["pid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$pid=htmlspecialchars(trim($_GET["pid"]));
	$address=htmlspecialchars(trim($_GET["address"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
	{
$updateAddress=$conn->prepare("UPDATE `products` SET `warehouse`=? WHERE id=?");
$updateAddress->execute([$address,$pid]);
header("Location:index.php?id=32");
ob_end_flush();
		// echo '<meta http-equiv="refresh" content="0;url=index.php?id=32">';
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
	include '404.html';
}
?>