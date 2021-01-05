<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		$query4CashPay=$conn->prepare("SELECT * FROM cash WHERE id=?");
		$query4CashPay->execute([$mid]);
		$rows4CashPay=$query4CashPay->fetchall(PDO::FETCH_ASSOC);
		$count4CashPay=count($rows4CashPay);
		if($count4CashPay==1)
		{
			include 'promisePayForm.php';	
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