<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		$query4Qebz=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		$query4Qebz->execute([$mid]);
		$rows4Qebz=$query4Qebz->fetchall(PDO::FETCH_ASSOC);
		$count4Qebz=count($rows4Qebz);
		if($count4Qebz==0)
		{
			include '404.html';
		}
		else
		{
			include 'qebz_default.php';
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