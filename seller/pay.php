<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		$query4Pay=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		$query4Pay->execute([$mid]);
		$rows4Pay=$query4Pay->fetchall(PDO::FETCH_ASSOC);
		$count4Pay=count($rows4Pay);
		$x=$rows4Pay[0]["remindMoney"];
		$y=$rows4Pay[0]["amountPaid"];
		if($count4Pay==1)
		{
			if($x!=$y)
			{
			$emsal=$rows4Pay[0]["amountPaid"]/$rows4Pay[0]["avaragePay"];
			$emsal=floor($emsal);
			$months=explode(",",$rows4Pay[0]["creditTable"]);
			$today=strtotime(date("d.m.Y"));//Burda bu "16.05.2020" date("d.m.Y") yazacam
			$month=$months[$emsal];
			$month=strtotime($months[$emsal]);
			$overDay=($today-$month)/(24*60*60);
			if($overDay<=0)
			{
				$overDay=0;
			}
$queryOverDay=$conn->prepare("UPDATE `creditdetails` SET `debbeDays`=? WHERE `id`=?");
$queryOverDay->execute([$overDay,$mid]);
header("location:index.php?id=16&mid=$mid");
die();
			}
			else
			{
				include 'payed.php';
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
}
else
{
	include '404.html';
}
?>