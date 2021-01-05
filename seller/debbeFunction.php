<?php  
$mid=$rowOverdueCredit["id"];
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
	}
}
?>