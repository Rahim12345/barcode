<?php  
if(isset($_GET["id"]) && isset($_GET["Cid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["Cid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
$query4SeriaMid=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4SeriaMid->execute([$mid]);
$rows4SeriaMid=$query4SeriaMid->fetchall(PDO::FETCH_ASSOC);
$count4SeriaMid=count($rows4SeriaMid);
if($count4SeriaMid==1)
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