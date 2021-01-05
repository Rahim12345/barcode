<?php  
if(isset($_GET["id"]) && isset($_GET["Cid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$Cid=htmlspecialchars(trim($_GET["Cid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $Cid>0 && is_numeric($Cid) && ceil($Cid)-$Cid==0 && $Cid>0)
	{
		$eid = $_SESSION["id"];
$query4SeriaCidSel=$conn->prepare("SELECT * FROM users WHERE id=?");
$query4SeriaCidSel->execute([$eid]);
$rows4SeriaCidSel=$query4SeriaCidSel->fetchall(PDO::FETCH_ASSOC);
$count4SeriaCidSel=count($rows4SeriaCidSel);
$givenID=$rows4SeriaCidSel[0]["id"];
if($count4SeriaCidSel==0)
{
	echo "Hesab sistemdə mövcud deyil";
}
else
{
	$gonSAA=$rows4SeriaCidSel[0]["status"].":".$rows4SeriaCidSel[0]["name"];
	$query4SeriaCid=$conn->prepare("SELECT * FROM deliveryproducts WHERE id=?");
	$query4SeriaCid->execute([$Cid]);
	$rows4SeriaCid=$query4SeriaCid->fetchall(PDO::FETCH_ASSOC);
	$count4SeriaCid=count($rows4SeriaCid);
	if($count4SeriaCid==1)
	{
	$query4SeriaCid=$conn->prepare("UPDATE `deliveryproducts` SET `status`=?,`givenID`=?,`givenName`=?,`date`=? WHERE id=?");
	$query4SeriaCid->execute([0,$givenID,$gonSAA,date("d.m.Y"),$Cid]);



	$bmk=$rows4SeriaCid[0]["bmk"];
    include 'bmkFunction.php';

    $description="Mən,".$rows4SeriaCidSel[0]["status"].":".$rows4SeriaCidSel[0]["name"]." tərəfindən ||".$bmk." müqaviləyə əsasən məhsulu(məhsulları) müqavilədə göstərilən ünvana göndərdim.";
    $saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`,`clock`,`description`) VALUES (?,?,?,?,?)");
    $saveNews->execute([$_SESSION["id"],12,date("d.m.Y"),date("H:i:s"),$description]);

	header("Location:index.php?id=6");
	ob_end_flush();
	}
	else
	{
		include '404.html';
	}
}
	}
	else
	{
		include '404.html';
	}
}
else
{
	include '404.html';
}
?>