<?php  
include '../include/config.php';
$id=htmlspecialchars(trim($_GET["id"]));
if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
{
	$queryModels4Removing=$conn->prepare("SELECT * FROM models WHERE id=?");
	$queryModels4Removing->execute([$id]);
	$rowsModels4Removing=$queryModels4Removing->fetchall(PDO::FETCH_ASSOC);
	$countModels4Removing=count($rowsModels4Removing);
	if($countModels4Removing!=0)
	{
		$remove=$conn->prepare("DELETE FROM `models` WHERE id=?");
		$remove->execute([$id]);
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=13">';
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