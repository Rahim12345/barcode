<?php
if($creditPay=="" || $debbePay=="")
{
	$payER="Hər iki xananı doldurun.";
}
else
{
	if(!is_numeric($creditPay) || !is_numeric($debbePay)) 
	{
		$payER="Ödəniş xanalarına mütləq ədədlər daxil olunmalıdır.";
	}
	else
	{
		if($creditPay<0 || $debbePay<0)
		{
			$payER="Pulu kimi mənfi ədədlər daxil edə bilməzsiniz";
		}
	}
}

$query4Pay=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4Pay->execute([$hiddenMid]);
$rows4Pay=$query4Pay->fetchall(PDO::FETCH_ASSOC);
$count4Pay=count($rows4Pay);
include 'pay_default_assist.php';
?>