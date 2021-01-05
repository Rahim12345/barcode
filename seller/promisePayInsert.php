<?php  
if(isset($_POST["Pay"]))
{
  $hiddenMid=htmlspecialchars(trim($_POST["hmid"]));
  $cashPay=htmlspecialchars(trim($_POST["cashPay"]));
  if(!is_numeric($cashPay) || !is_numeric($hiddenMid) || $cashPay<0 || $hiddenMid<=0 || ceil($hiddenMid)-$hiddenMid!=0 || $cashPay=="")
  {
    include 'promisePayInserAssist.php';
  }
  else
  {

$mid=$hiddenMid;
$query4CashPay=$conn->prepare("SELECT * FROM cash WHERE id=?");
$query4CashPay->execute([$mid]);
$rows4CashPay=$query4CashPay->fetchall(PDO::FETCH_ASSOC);
$count4CashPay=count($rows4CashPay);
if($count4CashPay==0)
{
  // include '404.html';
}
else
{
  $totalPayDetail=$rows4CashPay[0]["qaliqiOdeyen"];
  $color='';
  $query4Seller=$conn->prepare("SELECT * FROM users WHERE id=?");
  $query4Seller->execute([$_SESSION["id"]]);
  $rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);


  if($rows4CashPay[0]["price"]<$cashPay)
  {
    $payER="Sistem borcdan artıq pulu qəbul etmir!";
    $color='orange';
  }
  elseif($rows4CashPay[0]["price"]>$cashPay)
  {
    $qaliq=$rows4CashPay[0]["price"]-$cashPay;
    if($totalPayDetail=="")
    {
    $totalPayDetails=$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$cashPay." AZN ödəniş etdi";
    }
    else
    {
      $totalPayDetails=$totalPayDetail." ,".$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$cashPay." AZN ödəniş etdi";
    }



    $updatePaid=$conn->prepare("UPDATE `cash` SET `price`=?,`qaliqiOdeyen`=? WHERE id=?");
    $updatePaid->execute([$qaliq,$totalPayDetails,$mid]);
    $color='green';
    $payER="$cashPay AZN uğurla ödənildi";
  }
  else
  {

    if($totalPayDetail=="")
    {
    $totalPayDetails=$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$cashPay." AZN ödəniş etdi";
    }
    else
    {
      $totalPayDetails=$totalPayDetail." ,".$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$cashPay." AZN ödəniş etdi.Borc bağlandı.";
    }
    $updatePaid=$conn->prepare("UPDATE `cash` SET `price`=?,`qaliqiOdeyen`=?,rasot=? WHERE id=?");
    $updatePaid->execute([0,$totalPayDetails,0,$mid]);
    $color='green';
    $payER="Borcunuz tam bağlandı";
  }

$query4BMK=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
$query4BMK->execute([$mid,2]);
$rows4BMK=$query4BMK->fetchall(PDO::FETCH_ASSOC);
$count4BMK=count($rows4BMK);

if($count4BMK!=0 && $cashPay!=0)
{
  $bmkID=$rows4BMK[0]["id"];
  $saveKassa=$conn->prepare("INSERT INTO `kassa`(`bmk`, `profit`, `date`) VALUES (?,?,?)");
  $saveKassa->execute([$bmkID,$cashPay,date("d.m.Y")]);
}

$bmk=$rows4BMK[0]["id"];
include 'bmkFunction.php';
$satici=$rows4Seller[0]['status'].":".$rows4Seller[0]['name'];
$description="Mən,$satici tərəfindən ||$bmk müqaviləyə əsasən şifahi razılaşmaya yolu ilə satılmış məhsul üçün $cashPay AZN ödəniş etdim.";
$saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`, `clock`, `description`) VALUES (?,?,?,?,?)");
$saveNews->execute([$_SESSION["id"],4,date("d.m.Y"),date("H:i:s"),$description]);


  // $payER="saved";
  ?>
  <h6 class="m-0 font-weight-bold text-primary" id="back" style="background-color: <?php echo $color; ?>;padding-left: 15px;line-height: 40px;text-align: center;color: white;border-top-right-radius: 15px;border-top-left-radius: 15px;">
  <p style="color:white;">
    <?php  
    if(!empty($payER))
    {
      echo $payER;
    }
    ?>
    </p>
  </h6>
  <?php
}
    include 'promisePayInserAssist.php';
  }
}
else
{
  include '404.html';
}
?>