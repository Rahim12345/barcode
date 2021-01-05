<?php  
// echo $RecejedPro;
if($RecejedPro=="||")
{
$crederr="İadə etmək üçün ilk öncə məhsul(və ya məhsulları) seçib qaytara klikləyin";
}
else
{
	$NProPart=explode("||", $RecejedPro);
	$NProPart1=$NProPart[0];
	if(strlen($NProPart1)!=0)
	{
		$NProPart1=explode(",", $NProPart1);
		foreach($NProPart1 as $nProPart1)
		{
			$nProPart1=explode("**", $nProPart1);
			$nProPart1SeriaHisse=$nProPart1[0];
			$queryPro=$conn->prepare("SELECT * FROM products WHERE seria=?");
	        $queryPro->execute([$nProPart1SeriaHisse]);
	        $rowPro=$queryPro->fetchall(PDO::FETCH_ASSOC);
	        if($rowPro[0]["rejectId"]!="")
	        {
	          $rejecedIDP=$rowPro[0]["rejectId"].",".$rejecedID;
	        }
	        else
	        {
	          $rejecedIDP=$rejecedID;
	        }
	        $UpdateReject=$conn->prepare("UPDATE `products` SET `rejectId`=?,`selled`=? WHERE seria=?");
	        $UpdateReject->execute([$rejecedIDP,0,$nProPart1SeriaHisse]);
		}
	}


	$NProPart2=$NProPart[1];
	if(strlen($NProPart2)!=0)
	{
		$NProPart2=explode(",", $NProPart2);
		foreach($NProPart2 as $nProPart2)
		{
			$nProPart2=explode("**", $nProPart2);
			// print_r($Nseriasiz);
			$query4Sersiz=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=?");
			$query4Sersiz->execute([$nProPart2[0],$nProPart2[1],$nProPart2[2]]);
			$rows4Sersiz=$query4Sersiz->fetchall(PDO::FETCH_ASSOC);
			if(count($rows4Sersiz)!=0)
			{
			  $SersizID=$rows4Sersiz[0]["id"];
			  $RRID=$rows4Sersiz[0]["rejectId"];
			  if($RRID!="")
			  {
			    $RRID=$RRID.",".$rejecedID;
			  }
			  else
			  {
			    $RRID=$rejecedID;
			  }
			  $dim=$rows4Sersiz[0]["dimension"];
			  $dim=$dim+$nProPart2[3];
			}
			// echo $RRID;
			// echo "<br/>";
			// echo $dim;
			// echo "<br/>";
			// echo $rows4Sersiz[0]["id"];
			// echo "<br/>";
			$UpdateReject=$conn->prepare("UPDATE `products` SET `rejectId`=?,`selled`=?,dimension=? WHERE id=?");
			$UpdateReject->execute([$RRID,0,$dim,$rows4Sersiz[0]["id"]]);
		}
	}

$queryRejectedPro=$conn->prepare("SELECT * FROM cash WHERE id=?");
$queryRejectedPro->execute([$mid]);
$rowsRejectedPro=$queryRejectedPro->fetchall(PDO::FETCH_ASSOC);
$musteriSAA=$rowsRejectedPro[0]["name"];
$oldReject=$rowsRejectedPro[0]["rejectedProducts"];
if(strlen($oldReject)!="")
{
	$oldReject=explode("||", $oldReject);
    $oldReject1=$oldReject[0];
    $oldReject2=$oldReject[1];
    $newRejected="";
    if($oldReject1=="" && $oldReject2=="")
    {
    	$newRejected=$RseriaFix."||".$RseriaSizFix;
    }
    elseif($oldReject1!="" && $oldReject2=="")
    {
    	if($RseriaFix=="")
    	{
    		$newRejected=$oldReject1."||".$RseriaSizFix;
    	}
    	else
    	{
    		$newRejected=$oldReject1.",".$RseriaFix."||".$RseriaSizFix;
    	}
    }
    elseif($oldReject1=="" && $oldReject2!="")
    {
    	if($RseriaSizFix=="")
    	{
    		$newRejected=$RseriaFix."||".$RseriaSizFix;
    	}
    	else
    	{
    		$newRejected=$RseriaFix."||".$oldReject2.",".$RseriaSizFix;
    	}
    }
    else
    {
    	if($RseriaFix=="" && $RseriaSizFix=="")
    	{
    		$newRejected=$oldReject1."||".$oldReject2;
    	}
    	elseif($RseriaFix!="" && $RseriaSizFix=="")
    	{
    		$newRejected=$oldReject1.",".$RseriaFix."||".$oldReject2;
    	}
    	elseif($RseriaFix=="" && $RseriaSizFix!="")
    	{
    		$newRejected=$oldReject1."||".$oldReject2.",".$RseriaSizFix;
    	}
    	else
    	{
    		$newRejected=$oldReject1.",".$RseriaFix."||".$oldReject2.",".$RseriaSizFix;
    	}
    }
}
else
{
	$newRejected=$RecejedPro;
}

$malinQiymeti=0;
if(isset($_POST["partnors"]))
{
  foreach($qiymetler as $qiymet)
  {
    if(is_numeric($qiymet) && $qiymet>0)
    {
      $malinQiymeti+=$qiymet;
    }
  }
}
$UpdateReject=$conn->prepare("UPDATE `cash` SET `productDetails`=?,`rejectedProducts`=?,`price`=?,`rejectId`=?,`rejectName`=? WHERE id=?");
$UpdateReject->execute([$pro,$newRejected,$malinQiymeti,$uid,$rejectExecName,$mid]);

$queryNew=$conn->prepare("SELECT * FROM `bmk` WHERE bmkNo=? AND sellStyle=?");
$queryNew->execute([$mid,2]);
$rowNew=$queryNew->fetchall(PDO::FETCH_ASSOC);
$bmkID=$rowNew[0]["id"];

$UpdateReject=$conn->prepare("UPDATE `selledproducts` SET `price`=? WHERE bmkID=?");
$UpdateReject->execute([$malinQiymeti,$bmkID]);

$bmk=$bmkID;
include 'bmkFunction.php';
$productDetails=$RecejedPro;
include 'openDetails.php';
$descriptionNews="BARCODE MMC adından alıcı $musteriSAA arasında bağlanılmış ||$bmk nömrəli müqavilənidəki $satılan_malın_adı_qiymetile məhsulu qaytarır və digər məhsulları yeni hesablamalarla ödəməyə razırdır.";
$saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`,`clock`,`description`) VALUES (?,?,?,?,?)");
$saveNews->execute([$_SESSION["id"],8,date("d.m.Y"),date("H:i:s"),$descriptionNews]);
?>
    <script type="text/javascript">
      alert("Məhsul uğurla qaytarıldı");
    </script>
<?php
echo '<meta http-equiv="refresh" content="0;url=index.php?id=37&mid='.$mid.'">';
}
?>