<?php  
$avaragePay=($malinQiymeti-$ilkinOdenis)/$kreditMuddeti;
$remindMoney=$malinQiymeti-$ilkinOdenis;
$sellerId=$_SESSION["id"];
$seller=$rows4Seller[0]["status"].":".$rows4Seller[0]["name"];
// `creditdetails` cedveline save etdim
$saveSeriali=implode(",", $seriali);
$saveSeriasiz=implode(",", $XArrayX);
$saveProduct=$saveSeriali."||".$saveSeriasiz;
$saveDetails=$conn->prepare("INSERT INTO `creditdetails`(`name`, `address`,`productDetails`, `productPrice`, `firstPrice`, `countMonth`, `sellerTime`, `creditTable`, `avaragePay`, `remindMoney`, `debbe`,`given`, `sellerId`, `seller`,`fin`,`zemanet`,`zamin1`,`zamin2`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$saveDetails->execute([$musteriSAA,$musteriQeydUnvani,$saveProduct,$malinQiymeti,$ilkinOdenis,$kreditMuddeti,date("d.m.Y"),$creditTable,$avaragePay,$remindMoney,$rows4SellerDebbe[0]["debbe"],$delivery,$sellerId,$seller,$musteriPinCode,$zemanet,$zamin1,$zamin2]);

// daimi müştəriləri save etdim
$query4SeriaAviableClient=$conn->prepare("SELECT * FROM regular WHERE Pincode=?");
$query4SeriaAviableClient->execute([$musteriPinCode]);
$rows4SeriaAviableClient=$query4SeriaAviableClient->fetchall(PDO::FETCH_ASSOC);
$count4SeriaAviableClient=count($rows4SeriaAviableClient);
if($count4SeriaAviableClient==0)
{
// `regular` cedveline save etdim
$saveClients=$conn->prepare("INSERT INTO `regular`( `SAA`, `dogumTarixi`, `cins`, `dogumYeri`, `seria`, `Pincode`, `qeydiyyatUnvan`, `verilmeTarixi`, `bitmeTarixi`, `verenOrqan`, `aileVeziyyeti`, `mobil1`, `mobil2`, `mobil3`, `ev`, `teskilatAdi`, `vezife`, `isYeriUnvani`, `emekHaqqi`, `elaveGelir`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$saveClients->execute([$musteriSAA,$musteriDogumTarixi,$musteriCins,$musteriDogumYeri,$musteriSeria,$musteriPinCode,$musteriQeydUnvani,$musteriVerilmeTaixi,$musteriBitmeTarixi,$musteriVerenOrqan,$musteriAlieVez,$musteriMobil1,$musteriMobil2,$musteriMobil3,$musteriEv,$musteriTeskAdi,$musteriVezife,$musteriIsYeriUnvani,$musteriEmekHaqq,$musteriElaveGelir]);
}
else
{
$updateClients=$conn->prepare("UPDATE `regular` SET  `SAA`=?, `dogumTarixi`=?, `cins`=?, `dogumYeri`=?, `seria`=?, `qeydiyyatUnvan`=?, `verilmeTarixi`=?, `bitmeTarixi`=?, `verenOrqan`=?, `aileVeziyyeti`=?, `mobil1`=?, `mobil2`=?, `mobil3`=?, `ev`=?, `teskilatAdi`=?, `vezife`=?, `isYeriUnvani`=?, `emekHaqqi`=?, `elaveGelir`=? WHERE `Pincode`=?");
$updateClients->execute([$musteriSAA,$musteriDogumTarixi,$musteriCins,$musteriDogumYeri,$musteriSeria,$musteriQeydUnvani,$musteriVerilmeTaixi,$musteriBitmeTarixi,$musteriVerenOrqan,$musteriAlieVez,$musteriMobil1,$musteriMobil2,$musteriMobil3,$musteriEv,$musteriTeskAdi,$musteriVezife,$musteriIsYeriUnvani,$musteriEmekHaqq,$musteriElaveGelir,$musteriPinCode]);
}

$query4CreditID=$conn->prepare("SELECT * FROM creditdetails WHERE id>? ORDER BY id DESC");
$query4CreditID->execute([0]);
$rows4CreditID=$query4CreditID->fetchall(PDO::FETCH_ASSOC);
$CreditID=$rows4CreditID[0]["id"];

// BMK ları save etdim
$saveBmk=$conn->prepare("INSERT INTO `bmk`(`bmkNo`, `sellStyle`) VALUES (?,?)");
$saveBmk->execute([$CreditID,1]);



$query4BmkID=$conn->prepare("SELECT * FROM bmk WHERE id>? ORDER BY id DESC");
$query4BmkID->execute([0]);
$rows4BmkID=$query4BmkID->fetchall(PDO::FETCH_ASSOC);
$BmkID=$rows4BmkID[0]["id"];

// BMK ları save etdim
$saveCrediBmk=$conn->prepare("UPDATE `creditdetails` SET `realbmk`=? WHERE id=?");
$saveCrediBmk->execute([$BmkID,$CreditID]);

// satılmış məhsullara əlavə etdim
$saveSelledproducts=$conn->prepare("INSERT INTO `selledproducts`(`name`, `productDetails`, `price`,`bmkID`,`sellerID`,`sellerName`, `date`) VALUES (?,?,?,?,?,?,?)");
$saveSelledproducts->execute([$musteriSAA,$saveProduct,$malinQiymeti,$BmkID,$sellerId,$seller,date("d.m.Y")]);

// kassaya ilkin ödənişi yazdırdım
if($ilkinOdenis>0)
{
	$saveKassa=$conn->prepare("INSERT INTO `kassa`(`bmk`, `profit`, `date`) VALUES (?,?,?)");
	$saveKassa->execute([$BmkID,$ilkinOdenis,date("d.m.Y")]);
}

$bmk=$BmkID;
include 'bmkFunction.php';
$descriptionNews="BARCODE MMC adından alıcı $musteriSAA arasında ||$bmk nömrəli müqaviləni bağladım.";
$saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`,`clock`,`description`) VALUES (?,?,?,?,?)");
$saveNews->execute([$sellerId,1,date("d.m.Y"),date("H:i:s"),$descriptionNews]);

if($delivery==2)
{
$savedeliveryproducts=$conn->prepare("INSERT INTO `deliveryproducts`(`name`, `telno`,`address`, `productDetails`, `bmk`,`status`) VALUES (?,?,?,?,?,?)");
$savedeliveryproducts->execute([$musteriSAA,$musteriMobil1,$musteriQeydUnvani,$saveProduct,$BmkID,$delivery]);
}

include 'updateProducts4Selled.php';


?>