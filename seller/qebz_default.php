<h6 class="m-0 font-weight-bold text-primary" id="back"></h6>
<br>
<h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
  <button class="btn btn-primary" onclick="prinTorder();">Çapa hazırla</button>
</h6>
<button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
<?php  
$magaza="";
$hotPoint="";
$payer="";
$storePayer="";
$sonEsas="";
$sonCerime="";
$muqavileN="";
$satisTarixi="";
$toplamBorc="";
$cerimeBorcu="";
$toplamOdenilib="";

$query4Magaza=$conn->prepare("SELECT * FROM users WHERE id=?");
$query4Magaza->execute([$_SESSION["id"]]);
$rows4Magaza=$query4Magaza->fetchall(PDO::FETCH_ASSOC);
$count4Magaza=count($rows4Magaza);

$query4Hotcall=$conn->prepare("SELECT * FROM hotcall WHERE id>?");
$query4Hotcall->execute([0]);
$rows4Hotcall=$query4Hotcall->fetchall(PDO::FETCH_ASSOC);
$count4Hotcall=count($rows4Hotcall);


$query4Payer=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4Payer->execute([$mid]);
$rows4Payer=$query4Payer->fetchall(PDO::FETCH_ASSOC);
$count4Payer=count($rows4Payer);


if($count4Magaza!=0)
{
	$magaza=$rows4Magaza[0]["store"];
	$storePayer=$rows4Magaza[0]["name"];
}

if($count4Hotcall!=0)
{
	$hotPoint=$rows4Hotcall[0]["telno"];
}

if($count4Payer!=0)
{
	$payer=$rows4Payer[0]["name"];
	$sonEsas=$rows4Payer[0]["sonEsas"];
	$sonCerime=$rows4Payer[0]["sonCerime"];
	$satisTarixi=$rows4Payer[0]["sellerTime"];
	$toplamBorc=$rows4Payer[0]["remindMoney"]-$rows4Payer[0]["amountPaid"];
	$cerimeBorcu=($rows4Payer[0]["productPrice"]*$rows4Payer[0]["debbe"]/100)*($rows4Payer[0]["debbeDays"]+$rows4Payer[0]["totalDebbeDays"])-$rows4Payer[0]["amountPaidDebbe"];
	$toplamOdenilib=$rows4Payer[0]["amountPaid"];
}
$qebzNomre=rand(100000,999999);
$query4Qebz=$conn->prepare("SELECT * FROM qebz WHERE id>?");
$query4Qebz->execute([0]);
$rows4Qebz=$query4Qebz->fetchall(PDO::FETCH_ASSOC);
$count4Qebz=count($rows4Qebz);

$fin=$rows4Payer[0]["fin"];
if($count4Qebz==0)
{
	$query4Qebz=$conn->prepare("INSERT INTO `qebz`(`nomre`,`muqavileN`,`fin`,`saticiAdi`,`odeyenAdi`,`odenisEsas`,`odenisCerime`,`ToplamBorc`,`cerime`,`toplamOdenilib`,`store`,`hotCall`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$query4Qebz->execute([$qebzNomre,$mid,$fin,$storePayer,$payer,$sonEsas,$sonCerime,$toplamBorc,$cerimeBorcu,$toplamOdenilib,$magaza,$hotPoint]);
}
else
{
	foreach($rows4Qebz as $row4Qebz)
	{
		if($row4Qebz["nomre"]==$qebzNomre)
		{
			$qebzNomre=rand(100000,999999);
			$sert=0;
		}
		else
		{
			$sert=1;
		}
	}
	if($sert==1)
	{
		$query4Qebz=$conn->prepare("INSERT INTO `qebz`(`nomre`,`muqavileN`,`fin`,`saticiAdi`,`odeyenAdi`,`odenisEsas`,`odenisCerime`,`ToplamBorc`,`cerime`,`toplamOdenilib`,`store`,`hotCall`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		$query4Qebz->execute([$qebzNomre,$mid,$fin,$storePayer,$payer,$sonEsas,$sonCerime,$toplamBorc,$cerimeBorcu,$toplamOdenilib,$magaza,$hotPoint]);
	}
}


$query4QebzID=$conn->prepare("SELECT * FROM qebz WHERE nomre=?");
$query4QebzID->execute([$qebzNomre]);
$rows4QebzID=$query4QebzID->fetchall(PDO::FETCH_ASSOC);
$qid=$rows4QebzID[0]["id"];
header("Location:index.php?id=22&qid=$qid");
ob_end_flush();

// include 'qebzilk.php';
?>