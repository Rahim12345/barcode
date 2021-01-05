<?php
$crederr='';  
if(isset($_POST["toSell"]))
{
	$delivery="";
	$musteriSAA				=htmlspecialchars(trim($_POST["musteriSAA"]));
	$musteriTel				=htmlspecialchars(trim($_POST["musteriTel"]));
	$musteriADRR			=htmlspecialchars(trim($_POST["musteriADRR"]));
	$timer					=htmlspecialchars(trim($_POST["timer"]));
	$delivery				=htmlspecialchars(trim($_POST["delivery"]));
	if(isset($_POST["partnors"]))
	{
		$partnorlar				=$_POST["partnors"];
		$mallar					=$_POST["productNames"];
		$modeller				=$_POST["models"];
		$serialar				=$_POST["serias"];
		$qiymetler				=$_POST["prices"];
	}
	else
	{
		$partnorlar				=[];
		$mallar					=[];
		$modeller				=[];
		$serialar				=[];
		$qiymetler				=[];
	}
$malinQiymeti=0;
foreach($qiymetler as $qiymet)
{
	if(is_numeric($qiymet) || $qiymet>0)
	{
		$malinQiymeti+=$qiymet;
	}
	else
	{
		break;
	}
}
	if(!empty($timer) && empty($musteriSAA))
	{
		$crederr="Ödəniləcək gün daxil edildiyinə görə AD,SOYAD,ATA adını da daxil etməlisiniz.";
	}
	else
	{
		if(empty($delivery))
		{
			$crederr="Təhvil verilmə barədə  məlumat daxil edin";
		}
		else
		{
			if(strlen($musteriSAA)>50 || strlen($musteriADRR)>50 || strlen($musteriTel)>50 || strlen($timer)>2)
			{
				$crederr='"S.A.A" ,"Ünvan","Telefon nömrəsi" və ya "Ödəniləcək gün" üçün həddən artıq simvol daxil etməyə çalışmayın!';
			}
			else
			{
				$timerLen=strlen($timer);
				if($timerLen==1)
				{
					if(!is_numeric($timer) || ceil($timer)-$timer!=0 || $timer<0 || $timer[0]==".")
					{
						$crederr="Ödəniləcək gün üçün doğru bir zaman daxil edin.";
					}
					else
					{

					}
				}
				else
				{
					if(!is_numeric($timer) || ceil($timer)-$timer!=0 || $timer<0 || $timer[0]=="." || $timer[1]==".")
					{
						$crederr="Ödəniləcək gün üçün doğru bir zaman daxil edin.";
					}
					else
					{

					}
				}
			}
		}
	}
	if($crederr=="")
	{
		$crederr='';
		$seriali=[];
		$seriasiz=[];
		$seriasizArray=[];
		$pN=count($partnorlar);
		if($pN!=0)
		{ 
			// Sifarişləri partnyor,istehsalçı,model üzrə məhsulları çeşidlədim
			include "filterOrderedProducts.php";

			if($malinQiymeti<=0)
			{
				$crederr="Məhsul qiymətini dəyişməyə çalışmayın.";
			}
			else
			{
				if($delivery==2 && ($musteriSAA=="" || $musteriTel=="" || $musteriADRR==""))
				{
					$crederr="Məhsulun kimə,hara veriləcəyini və nömrəni daxil edin";
				}
				else
				{
					if($crederr!="")
					{
						// echo "Nağd satış aparıla bilmədi!";
					}
					else
					{
						// Nağd satış bazaya yazdırılır...
						include "topdanSaved.php";
					}
				}
			}
		}
		else
		{
			$crederr="Məhsul seçin!";
		}
	}
	include 'topdan_default4value.php';
}
else
{
	include 'topdan_default.php';
}
?>