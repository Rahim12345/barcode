<?php  
if(isset($_GET["id"]) && isset($_GET["Cid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$Cid=htmlspecialchars(trim($_GET["Cid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $Cid>0 && is_numeric($Cid) && ceil($Cid)-$Cid==0 && $Cid>0)
	{
$query4SeriaCid=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4SeriaCid->execute([$Cid]);
$rows4SeriaCid=$query4SeriaCid->fetchall(PDO::FETCH_ASSOC);
$count4SeriaCid=count($rows4SeriaCid);
if($count4SeriaCid==1)
{
	include 'orderTable_content.php';
}
else
{
	include '404.html';
}
	}
	else
	{
		include '404.html';
	}
}
else
{
	include '404.html';
}
?>