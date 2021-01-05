<?php
$payER='';
if($cashPay=="")
{
	$payER="Ödənişi daxil edin.";
}
else
{
	if(!is_numeric($cashPay)) 
	{
		$payER="Ödəniş mütləq ədəd  olunmalıdır.";
	}
	else
	{
		if($cashPay<0)
		{
			$payER="Pulu kimi mənfi ədədlər daxil edə bilməzsiniz";
		}
	}
}
?>
<h6 class="m-0 font-weight-bold text-primary" id="back" style="background-color: orange;padding-left: 15px;line-height: 40px;text-align: center;color: white;border-top-right-radius: 15px;border-top-left-radius: 15px;">
<p style="color:white;">
  <?php  
  if(!empty($payER))
  {
    echo $payER;
  }
  ?>
  </p>
</h6>
<?php
$mid=$hiddenMid;
$query4CashPay=$conn->prepare("SELECT * FROM topdan WHERE id=?");
$query4CashPay->execute([$mid]);
$rows4CashPay=$query4CashPay->fetchall(PDO::FETCH_ASSOC);
$count4CashPay=count($rows4CashPay);
if($count4CashPay==1)
{
	include 'promiseTPayForm.php';	
}
else
{
	include '404.html';
}
?>