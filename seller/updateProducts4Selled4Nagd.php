<?php
// $seriali;
// $XArrayX ;
$bmk="";
$query4ID=$conn->prepare("SELECT * FROM bmk WHERE id>? ORDER BY id DESC");
$query4ID->execute([0]);
$rows4ID=$query4ID->fetchall(PDO::FETCH_ASSOC);
$count4ID=count($rows4ID);
if($count4ID!=0)
{
	$ID=$rows4ID[0]["id"];
}
else
{
	$ID="";
}
echo "<br/>";
// serialı məhsulları products da update elədim
foreach($seriali as $serial)
{
	$serial=explode("**", $serial);
	if($delivery==1)
	{
		$updateProduct=$conn->prepare("UPDATE `products` SET `selled`=?,selledPrice=?,bmk=? WHERE `seria`=?");
		$updateProduct->execute(["1",$serial[1],$ID,$serial[0]]);
	}
	else
	{
		$updateProduct=$conn->prepare("UPDATE `products` SET `selled`=?,selledPrice=?,bmk=? WHERE `seria`=?");
		$updateProduct->execute(["2",$serial[1],$ID,$serial[0]]);
	}
}




foreach($XArrayX as $XArrayx)
{
	$serial=explode("**", $XArrayx);
	$query4Seriasiz=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=? AND selled=?");
	$query4Seriasiz->execute([$serial[0],$serial[1],$serial[2],0]);
	$rows4Seriasiz=$query4Seriasiz->fetchall(PDO::FETCH_ASSOC);
	$count4Seriasiz=count($rows4Seriasiz);
	foreach($rows4Seriasiz as $rows4Seria)
	{
		if($rows4Seria["bmk"]=="")
		{
			$bmk=$ID;
		}
		else
		{
			$bmk=$rows4Seria["bmk"].",".$ID;
		}

		if($serial[3]>=$rows4Seria["dimension"])
		{
			$updateProduct=$conn->prepare("UPDATE `products` SET `dimension`=?, `selled`=?, `bmk`=? WHERE partnor=? AND manufacturer=? AND model=? AND dimension=? AND selled=?");
			$updateProduct->execute([0,1,$bmk,$serial[0],$serial[1],$serial[2],$rows4Seria["dimension"],0]);
			$serial[3]=$serial[3]-$rows4Seria["dimension"];		
		}
		else
		{
			$serial[3]=$rows4Seria["dimension"]-$serial[3];
			$updateProduct=$conn->prepare("UPDATE `products` SET `dimension`=?, `selled`=?, `bmk`=? WHERE partnor=? AND manufacturer=? AND model=? AND dimension=? AND selled=?");
			$updateProduct->execute([$serial[3],0,$bmk,$serial[0],$serial[1],$serial[2],$rows4Seria["dimension"],0]);
		}
	}
}
// $crederr="Məhsul uğurla satıldı";
?>
<script>
	alert("Məhsul uğurla satıldı");
</script>
<?php  
$musteriSAA				="";
$musteriADRR			="";
$timer					="";
$delivery				="";
$partnorlar				=[];
$mallar					=[];
$modeller				=[];
$serialar				=[];
$qiymetler				=[];
$delivery="";
echo '<meta http-equiv="refresh" content="0;url=index.php?id=24">';
?>