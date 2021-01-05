<?php  
$sellerId=$_SESSION["id"];
$seller=$rows4Seller[0]["status"].":".$rows4Seller[0]["name"];

$saveSeriali=implode(",", $seriali);
$saveSeriasiz=implode(",", $XArrayX);
$saveProduct=$saveSeriali."||".$saveSeriasiz;

if($timer>0)
{
$saveDetails=$conn->prepare("INSERT INTO `topdan`(`name`, `address`, `telno`, `timer`, `productDetails`, `price`, `date`, `given`, `sellerID`, `sellerName`,`rasot`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$saveDetails->execute([$musteriSAA,$musteriADRR,$musteriTel,$timer,$saveProduct,$malinQiymeti,date("d.m.Y"),$delivery,$sellerId,$seller,1]);
}
else
{
$saveDetails=$conn->prepare("INSERT INTO `topdan`(`name`, `address`, `telno`, `timer`, `productDetails`, `price`, `date`, `given`, `sellerID`, `sellerName`,`rasot`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$saveDetails->execute([$musteriSAA,$musteriADRR,$musteriTel,$timer,$saveProduct,$malinQiymeti,date("d.m.Y"),$delivery,$sellerId,$seller,0]);
}


$query4CahsID=$conn->prepare("SELECT * FROM topdan WHERE id>? ORDER BY id DESC");
$query4CahsID->execute([0]);
$rows4CahsID=$query4CahsID->fetchall(PDO::FETCH_ASSOC);
$CahsID=$rows4CahsID[0]["id"];

$saveBmk=$conn->prepare("INSERT INTO `bmk`(`bmkNo`, `sellStyle`) VALUES (?,?)");
$saveBmk->execute([$CahsID,3]);

$query4BmkID=$conn->prepare("SELECT * FROM bmk WHERE id>? ORDER BY id DESC");
$query4BmkID->execute([0]);
$rows4BmkID=$query4BmkID->fetchall(PDO::FETCH_ASSOC);
$BmkID=$rows4BmkID[0]["id"];

$saveTopdanBmk=$conn->prepare("UPDATE `topdan` SET `realbmk`=? WHERE id=?");
$saveTopdanBmk->execute([$BmkID,$CahsID]);

$saveSelledproducts=$conn->prepare("INSERT INTO `selledproducts`(`name`, `productDetails`, `price`,`bmkID`,`sellerID`,`sellerName`, `date`) VALUES (?,?,?,?,?,?,?)");
$saveSelledproducts->execute([$musteriSAA,$saveProduct,$malinQiymeti,$BmkID,$sellerId,$seller,date("d.m.Y")]);


$bmk=$BmkID;
include 'bmkFunction.php';
$description="BARCODE MMC adından alıcı $musteriSAA arasında ||$bmk nömrəli müqaviləni bağladım.";
$saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`, `clock`, `description`) VALUES (?,?,?,?,?)");
$saveNews->execute([$_SESSION["id"],5,date("d.m.Y"),date("H:i:s"),$description]);

// kassaya  ödənişi yazdırdım
if($malinQiymeti>0)
{
	$saveKassa=$conn->prepare("INSERT INTO `kassa`(`bmk`, `profit`, `date`) VALUES (?,?,?)");
	$saveKassa->execute([$BmkID,$malinQiymeti,date("d.m.Y")]);
}

if($delivery==2)
{
$savedeliveryproducts=$conn->prepare("INSERT INTO `deliveryproducts`(`name`, `telno`,`address`, `productDetails`, `bmk`,`status`) VALUES (?,?,?,?,?,?)");
$savedeliveryproducts->execute([$musteriSAA,$musteriTel,$musteriADRR,$saveProduct,$BmkID,$delivery]);
}

include 'updateProducts4Selled4Topdan.php';
?>