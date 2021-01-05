<?php
$query4SellerDebbe=$conn->prepare("SELECT * FROM debbe WHERE id>?");
$query4SellerDebbe->execute([0]);
$rows4SellerDebbe=$query4SellerDebbe->fetchall(PDO::FETCH_ASSOC);
$count4SellerDebbe=count($rows4SellerDebbe);
if($count4SellerDebbe==0)
{
	echo '<br/><br/><br/><br/><br/><font style="color:green;padding-left:20px;background-color:orange;padding:15px;color:white;font-weight:bold;border-radius:none;border-top-left-radius:20px;border-bottom-right-radius:20px;margin-left: 250px;">Dükan sahibinə "Dəbbənin" daxil edilmədiyi barədə məlumat verin.</font>';
}
else
{
$query4SellerLimitedCreditTime=$conn->prepare("SELECT * FROM limitedcredittime WHERE id>?");
$query4SellerLimitedCreditTime->execute([0]);
$rows4SellerLimitedCreditTime=$query4SellerLimitedCreditTime->fetchall(PDO::FETCH_ASSOC);
$count4SellerLimitedCreditTime=count($rows4SellerLimitedCreditTime);
	if($count4SellerLimitedCreditTime==0)
	{
		echo '<br/><br/><br/><br/><br/><font style="color:green;padding-left:20px;background-color:orange;padding:15px;color:white;font-weight:bold;border-radius:none;border-top-left-radius:20px;border-bottom-right-radius:20px;margin-left: 250px;">Dükan sahibinə "Limitləndirilmiş kredit günün" daxil edilmədiyi barədə məlumat verin.</font>';
	}
	else
	{
if(isset($_POST["toCredit"]))
{
$delivery="";
$musteriSAA				=htmlspecialchars(trim($_POST["musteriSAA"]));
$musteriDogumTarixi		=htmlspecialchars(trim($_POST["musteriDogumTarixi"]));
$musteriCins			=htmlspecialchars(trim($_POST["musteriCins"]));
$musteriDogumYeri		=htmlspecialchars(trim($_POST["musteriDogumYeri"]));
$musteriSeria			=htmlspecialchars(trim($_POST["musteriSeria"]));
$musteriPinCode			=htmlspecialchars(trim($_POST["musteriPinCode"]));
$musteriQeydUnvani		=htmlspecialchars(trim($_POST["musteriQeydUnvani"]));
$musteriVerilmeTaixi	=htmlspecialchars(trim($_POST["musteriVerilmeTaixi"]));
$musteriBitmeTarixi		=htmlspecialchars(trim($_POST["musteriBitmeTarixi"]));
$musteriVerenOrqan		=htmlspecialchars(trim($_POST["musteriVerenOrqan"]));
$musteriAlieVez			=htmlspecialchars(trim($_POST["musteriAlieVez"]));
$musteriMobil1			=htmlspecialchars(trim($_POST["musteriMobil1"]));
$musteriMobil2			=htmlspecialchars(trim($_POST["musteriMobil2"]));
$musteriMobil3			=htmlspecialchars(trim($_POST["musteriMobil3"]));
$musteriEv				=htmlspecialchars(trim($_POST["musteriEv"]));
$musteriTeskAdi			=htmlspecialchars(trim($_POST["musteriTeskAdi"]));
$musteriVezife			=htmlspecialchars(trim($_POST["musteriVezife"]));
$musteriIsYeriUnvani	=htmlspecialchars(trim($_POST["musteriIsYeriUnvani"]));
$musteriEmekHaqq		=htmlspecialchars(trim($_POST["musteriEmekHaqq"]));
$musteriElaveGelir		=htmlspecialchars(trim($_POST["musteriElaveGelir"]));


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


$ilkinOdenis			=htmlspecialchars(trim($_POST["ilkinOdenis"]));
$ilkinKreditTarixi		=htmlspecialchars(trim($_POST["ilkinKreditTarixi"]));
$kreditMuddeti			=htmlspecialchars(trim($_POST["kreditMuddeti"]));
$zemanet				=htmlspecialchars(trim($_POST["zemanet"]));
$z1SAA					=htmlspecialchars(trim($_POST["z1SAA"]));
$z1DogumTarixi			=htmlspecialchars(trim($_POST["z1DogumTarixi"]));
$z1Cins					=htmlspecialchars(trim($_POST["z1Cins"]));
$z1DogumYeri			=htmlspecialchars(trim($_POST["z1DogumYeri"]));
$z1Seriya				=htmlspecialchars(trim($_POST["z1Seriya"]));
$z1PinCode				=htmlspecialchars(trim($_POST["z1PinCode"]));
$z1QeydUnvan			=htmlspecialchars(trim($_POST["z1QeydUnvan"]));
$z1VerilmeTarixi		=htmlspecialchars(trim($_POST["z1VerilmeTarixi"]));
$z1BitmeTarixi			=htmlspecialchars(trim($_POST["z1BitmeTarixi"]));
$z1IsYeri				=htmlspecialchars(trim($_POST["z1IsYeri"]));
$z1EH					=htmlspecialchars(trim($_POST["z1EH"]));
$z1Mobil1				=htmlspecialchars(trim($_POST["z1Mobil1"]));
$z1Mobil2				=htmlspecialchars(trim($_POST["z1Mobil2"]));
$z2SAA					=htmlspecialchars(trim($_POST["z2SAA"]));
$z2DogumTarixi			=htmlspecialchars(trim($_POST["z2DogumTarixi"]));
$z2DogumYeri			=htmlspecialchars(trim($_POST["z2DogumYeri"]));
$z2Cins					=htmlspecialchars(trim($_POST["z2Cins"]));
$z2Seriya				=htmlspecialchars(trim($_POST["z2Seriya"]));
$z2PinCode				=htmlspecialchars(trim($_POST["z2PinCode"]));
$z2QeydUnvan			=htmlspecialchars(trim($_POST["z2QeydUnvan"]));
$z2VerilmeTarixi		=htmlspecialchars(trim($_POST["z2VerilmeTarixi"]));
$z2BitmeTarixi			=htmlspecialchars(trim($_POST["z2BitmeTarixi"]));
$z2IsYeri				=htmlspecialchars(trim($_POST["z2IsYeri"]));
$z2Eh					=htmlspecialchars(trim($_POST["z2Eh"]));
$z2Mobil1				=htmlspecialchars(trim($_POST["z2Mobil1"]));
$z2Mobil2				=htmlspecialchars(trim($_POST["z2Mobil2"]));
$delivery				=htmlspecialchars(trim($_POST["delivery"]));
if(
empty($musteriSAA) 	  || empty($musteriPinCode) || empty($musteriQeydUnvani) ||
empty($musteriMobil1) || $ilkinOdenis==""	    || empty($kreditMuddeti) 	 ||
empty($delivery)      || empty($ilkinKreditTarixi)
)
{
	$crederr="* xanaları mütləq doldurun";
	include 'sil_def_val.php';
}
else
{

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

if(
strlen($musteriSAA)>50 		  || strlen($musteriDogumTarixi)>10  || strlen($musteriCins)>10         || 
strlen($musteriDogumYeri)>50  || strlen($musteriSeria)>50 	     || strlen($musteriPinCode)>50      || 
strlen($musteriQeydUnvani)>50 || strlen($musteriVerilmeTaixi)>10 || strlen($musteriBitmeTarixi)>10  || 
strlen($musteriVerenOrqan)>50 || strlen($musteriAlieVez)>20      || strlen($musteriMobil1)>20       || 
strlen($musteriMobil2)>20     || strlen($musteriMobil3)>20       || strlen($musteriEv)>20           || 
strlen($musteriTeskAdi)>50    || strlen($musteriVezife)>50       || strlen($musteriIsYeriUnvani)>50 || 
strlen($musteriEmekHaqq)>6    || strlen($musteriElaveGelir)>6    || strlen($ilkinOdenis)>5  		|| 
strlen($kreditMuddeti)>2 	  || strlen($zemanet)>8 		     || strlen($z1SAA)>50 			    ||
strlen($z1DogumTarixi)>10     || strlen($z1Cins)>20 			 || strlen($z1DogumYeri)>50 	    ||
strlen($z1Seriya)>50		  || strlen($z1PinCode)>50 			 ||
strlen($z1QeydUnvan)>50 	  || strlen($z1VerilmeTarixi)>10	 || strlen($z1BitmeTarixi)>10		||
strlen($z1IsYeri)>50 		  || strlen($z1EH)>6				 || strlen($z1Mobil1)>20 			||
strlen($z1Mobil2)>20 		  || strlen($z2SAA)>50 				 || strlen($z2DogumTarixi)>10	    ||
strlen($z2Cins)>20			  || strlen($z2DogumYeri)>50		 || strlen($z2Seriya)>50			||
strlen($z2PinCode)>50		  || strlen($z2QeydUnvan)>50 		 || strlen($z2VerilmeTarixi)>10 	||
strlen($z2BitmeTarixi)>10 	  || strlen($z2IsYeri)>50			 || strlen($z2Eh)>6 				|| 
strlen($z2Mobil1)>20 		  || strlen($z2Mobil2)>20            || strlen($ilkinKreditTarixi)>10
)
{
	$crederr="Doğru informasiyalar daxil edin";
	include 'sil_def_val.php';
}
else
{
if($delivery!=1 && $delivery!=2)
{
	$crederr="Hackmi etmək istiyirsən?".$delivery;
	include 'sil_def_val.php';
}
else
{
	if(!is_numeric($malinQiymeti) || !is_numeric($ilkinOdenis) || $malinQiymeti<0 || $ilkinOdenis<0)
	{
		$crederr="Malın qiymətini və ya ilkin ödənişi yanlış daxil edirsiniz";
		include 'sil_def_val.php';
	}
	else
	{
		$zamin1=$z1SAA."**".$z1DogumTarixi."**".$z1Cins."**".$z1DogumYeri."**".$z1Seriya."**".$z1PinCode."**".$z1QeydUnvan."**".$z1VerilmeTarixi."**".$z1BitmeTarixi."**".$z1IsYeri."**".$z1EH."**".$z1Mobil1."**".$z1Mobil2;
		$zamin2=$z2SAA."**".$z2DogumTarixi."**".$z2DogumYeri."**".$z2Cins."**".$z2Seriya."**".$z2PinCode."**".$z2QeydUnvan."**".$z2VerilmeTarixi."**".$z2BitmeTarixi."**".$z2IsYeri."**".$z2Eh."**".$z2Mobil1."**".$z2Mobil2;

		include 'credit_first_modul.php';
	}
}
}
}
}  
else
{
	include 'sil_def.php';
}
	}
}
?>