<?php  
if(isset($_GET["id"]) && isset($_GET["pid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$pid=htmlspecialchars(trim($_GET["pid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $id>0 && is_numeric($pid) && ceil($pid)-$pid==0 && $pid>0)
	{
		include 'seriaShareid_execute.php';
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