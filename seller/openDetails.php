<?php  
$satılan_malın_adı="";
$satılan_malın_adı_qiymetile="";
$productDetails=explode("||", $productDetails);
if(strlen($productDetails[0])>0)
{
	$seriali=explode(",", $productDetails[0]);
	$a=0;
	foreach($seriali as $seria)
	{
		// echo $seria."<br/>";
		$seria=explode("**", $seria);
		$query4SER=$conn->prepare("SELECT * FROM products WHERE seria=?");
		$query4SER->execute([$seria[0]]);
		$rows4SER=$query4SER->fetchall(PDO::FETCH_ASSOC);
		if($a==0)
		{
			$satılan_malın_adı.="<u>".$rows4SER[0]["manufacturer"]." ".$rows4SER[0]["model"]." ".$rows4SER[0]["category"]."-".$rows4SER[0]["seria"]."</u>";

			$satılan_malın_adı_qiymetile.="<u>".$rows4SER[0]["manufacturer"]." ".$rows4SER[0]["model"]." ".$rows4SER[0]["category"]."-".$rows4SER[0]["seria"]."-".$seria[1]." AZN</u>";
		}
		else
		{
			$satılan_malın_adı.=" , <u>".$rows4SER[0]["manufacturer"]." ".$rows4SER[0]["model"]." ".$rows4SER[0]["category"]."-".$rows4SER[0]["seria"]."</u>";

			$satılan_malın_adı_qiymetile.=" , <u>".$rows4SER[0]["manufacturer"]." ".$rows4SER[0]["model"]." ".$rows4SER[0]["category"]."-".$rows4SER[0]["seria"]."-".$seria[1]." AZN</u>";
		}
		$a++;
	}
}



if(strlen($productDetails[1])>0)
{
	$seriasiz=explode(",", $productDetails[1]);
	$a=0;
	foreach($seriasiz as $serias)
	{
		// echo $seria."<br/>";
		$serias=explode("**", $serias);
		$query4SERS=$conn->prepare("SELECT * FROM products WHERE model=?");
		$query4SERS->execute([$serias[2]]);
		$rows4SERS=$query4SERS->fetchall(PDO::FETCH_ASSOC);

		$categ=$rows4SERS[0]["category"];
		$query4Categ=$conn->prepare("SELECT * FROM categories WHERE name=?");
		$query4Categ->execute([$categ]);
		$rows4Categ=$query4Categ->fetchall(PDO::FETCH_ASSOC);
		$unit=$rows4Categ[0]["unit"];

		if($satılan_malın_adı=="")
		{
			if($a==0)
			{
				$satılan_malın_adı.="<u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit </u>";

				$satılan_malın_adı_qiymetile.="<u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit "." ".$serias[4]." AZN</u>";
			}
			else
			{
				$satılan_malın_adı.=" , <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit </u>";

				$satılan_malın_adı_qiymetile.=" , <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit "." ".$serias[4]." AZN</u>";
			}
		}
		else
		{
			if($a==0)
			{
				$satılan_malın_adı.=", <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit </u>";
				$satılan_malın_adı_qiymetile.=" , <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit "." ".$serias[4]." AZN</u>";
			}
			else
			{
				$satılan_malın_adı.=" , <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit </u>";
				$satılan_malın_adı_qiymetile.=" , <u>".$serias[0]." ".$serias[1]." ".$serias[2]."-".$serias[3]." $unit "." ".$serias[4]." AZN</u>";
			}
		}
		$a++;
	}
}
?>