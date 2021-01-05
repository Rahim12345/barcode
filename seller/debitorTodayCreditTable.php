<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
// $myId=$_SESSION["id"];
$query4SeriaMid=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4SeriaMid->execute([$mid]);
$rows4SeriaMid=$query4SeriaMid->fetchall(PDO::FETCH_ASSOC);
$count4SeriaMid=count($rows4SeriaMid);
if($count4SeriaMid==1)
{
	include 'debitTodayCreditTable_default.php';
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