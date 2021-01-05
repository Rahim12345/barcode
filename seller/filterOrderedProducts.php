<?php  
$AssistSeriali=[];
for($i=0;$i<$pN;$i++)
{
	if(strlen($serialar[$i])>4)
	{
		$query4Seria=$conn->prepare("SELECT * FROM products WHERE seria=? AND selled=?");
		$query4Seria->execute([$serialar[$i],0]);
		$rows4Seria=$query4Seria->fetchall(PDO::FETCH_ASSOC);
		$count4Seria=count($rows4Seria);
		if($count4Seria==0)
		{
			$crederr.="$serialar[$i] məhsul tapılmadı<br/>";

		}
		else
		{
			if(in_array($serialar[$i], $AssistSeriali))
			{
				$crederr.="$serialar[$i] serialı məhsulu təkrar sifariş edirsiniz lütfən eyni məhsulu yalnız bir dəfə sifariş verin";
			}
			else
			{
				$AssistSeriali[]=$serialar[$i];
				$seriali[]=$serialar[$i]."**".$qiymetler[$i];
			}
		}
	}
	else
	{
		$query4Dimension=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=? AND  selled=?");
		$query4Dimension->execute([trim($partnorlar[$i]),trim($mallar[$i]),trim($modeller[$i]),0]);
		$rows4Dimension=$query4Dimension->fetchall(PDO::FETCH_ASSOC);
		$count4Dimension=count($rows4Dimension);
		if($count4Dimension==0)
		{
			$crederr.="$partnorlar[$i] $mallar[$i] $modeller[$i] məhsulu tapılmadı<br/>";
		}
		else
		{
			$dbDimension=0;
			foreach($rows4Dimension as $row4Dimension)
			{
				$dbDimension+=$row4Dimension["dimension"];
			}
			$orderDimension=0;
			foreach($serialar as $seria)
			{
				if(strlen($seria)<4)
				{
					if(!is_numeric($seria) || $seria<=0 || ceil($seria)-$seria!=0)
					{
						$crederr="Ölçü üçün doğru bir ədəd daxil edin";
					}
					else
					{
						$orderDimension+=$seria;
						$diff=$orderDimension-$dbDimension;
					}
				}
			}
			$seriasiz[]=strtoupper(trim($partnorlar[$i]))."**".strtoupper(trim($mallar[$i]))."**".strtoupper(trim($modeller[$i]))."||".trim($serialar[$i])."**".trim($qiymetler[$i]);
			$x=strtoupper(trim($partnorlar[$i]))."**".strtoupper(trim($mallar[$i]))."**".strtoupper(trim($modeller[$i]));
			if(!in_array($x, $seriasizArray))
			{
				$seriasizArray[]=$x;
			}
			else
			{
				continue;
			}
		}
	}

}
$totalD=0;
$totalP=0;
$XArray=[];
foreach($seriasizArray as $seriasizAr)
{
	foreach($seriasiz as $seria)
	{
		$seriaExplode=explode("||", $seria);
		if(!in_array($seriasizAr, $XArray))
		{
			if(in_array($seriasizAr, $seriaExplode))
			{
				$Value=explode("**", $seriaExplode[1]);
				if(is_numeric($Value[1]) && $Value[1]>0 && is_numeric($Value[0]) && $Value[0]>0)
				{
					$totalD+=$Value[0];
					$totalP+=$Value[1];
				}
			}
			else
			{
				continue;
			}
		}
		else
		{
			continue;
		}
	}
	$XArray[]=$seriasizAr."**".$totalD."**".$totalP;//Partnyor,İstehsalçı,modelüzrə sifariş massivi
	$totalD=0;
	$totalP=0;
}
$XArrayDB=[];
$totalD_db=0;
foreach($seriasizArray as $seriasizArr)
{
	$Details=explode("**", $seriasizArr);
	$query4Details=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=? AND selled=?");
	$query4Details->execute([$Details[0],$Details[1],$Details[2],0]);
	$rows4Details=$query4Details->fetchall(PDO::FETCH_ASSOC);
	$count4Details=count($rows4Details);
	if($count4Details!=0)
	{
		foreach($rows4Details as $rows4Detail)
		{
			$totalD_db+=$rows4Detail["dimension"];
			if(!in_array($seriasizAr, $XArrayDB))
			{
				
			}
			else
			{
				continue;
			}
		}
			$XArrayDB[]=$seriasizArr."**".$totalD_db;
	}
	$totalD_db=0;
}

$XArrayX=[];
$countXArrayDB=count($XArrayDB);
if($countXArrayDB!=0)
{
	for($i=0;$i<$countXArrayDB;$i++)
	{
		$a=explode("**", $XArrayDB[$i]);
		$b=explode("**", $XArray[$i]);
		if($a[3]<$b[3])
		{
			$x=$b[3]-$a[3];
			$crederr="$a[0] $a[1] $a[2] məhsulundan ".$x." (vahid) çatmır.<br/>Digər partnyorlardan gələn eyni məhsullardan sifariş verin";
		}
		else
		{
			$XArrayX[]=$XArray[$i];
		}
	}
}
?>