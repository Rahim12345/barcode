<?php
// $crederr.="Müqaviləni tamamilə ləğv edəcəm<br/>";
// $crederr.=$RecejedPro."<br/>";
// $crederr.=$rejectExecName."<br/>";
$NPro=explode("||", $RecejedPro);
$Nseriali=$NPro[0];
// $crederr.=$Nseriali;
if(strlen($Nseriali)!=0)
{
  $Nseriali=explode(",", $Nseriali);
  foreach($Nseriali as $Nseria)
  {
    $Nseria=explode("**", $Nseria);
    $Nseria=$Nseria[0];
    // echo $Nseria."<br/>";
    $queryPro=$conn->prepare("SELECT * FROM products WHERE seria=?");
    $queryPro->execute([$Nseria]);
    $rowPro=$queryPro->fetchall(PDO::FETCH_ASSOC);
    if($rowPro[0]["rejectId"]!="")
    {
      $rejecedIDA=$rowPro[0]["rejectId"].",".$rejecedID;
    }
    else
    {
      $rejecedIDA=$rejecedID;
    }
    $UpdateReject=$conn->prepare("UPDATE `products` SET `rejectId`=?,`selled`=? WHERE seria=?");
    $UpdateReject->execute([$rejecedIDA,0,$Nseria]);
  }
}


$Nseriasiz=$NPro[1];
if(strlen($Nseriasiz)!=0)
{
  $Nseriasiz=explode(",", $Nseriasiz);
  foreach($Nseriasiz as $Nserias)
  {
    $Nseriasiz=explode("**", $Nserias);
    // print_r($Nseriasiz);
    $query4Sersiz=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=?");
    $query4Sersiz->execute([$Nseriasiz[0],$Nseriasiz[1],$Nseriasiz[2]]);
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
      $dim=$dim+$Nseriasiz[3];
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
if(strlen($oldReject)!=0)
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

$UpdateReject=$conn->prepare("UPDATE `cash` SET `productDetails`=?,`rejectedProducts`=?,`price`=?,`rejectId`=?,`rejectName`=? WHERE id=?");
$UpdateReject->execute([$pro,$newRejected,0,$uid,$rejectExecName,$mid]);

$queryNew=$conn->prepare("SELECT * FROM `bmk` WHERE bmkNo=? AND sellStyle=?");
$queryNew->execute([$mid,2]);
$rowNew=$queryNew->fetchall(PDO::FETCH_ASSOC);
$bmkID=$rowNew[0]["id"];

$UpdateReject=$conn->prepare("UPDATE `selledproducts` SET `price`=? WHERE bmkID=?");
$UpdateReject->execute([0,$bmkID]);


$bmk=$bmkID;
include 'bmkFunction.php';
$descriptionNews="BARCODE MMC adından alıcı $musteriSAA arasında bağlanılmış ||$bmk nömrəli müqaviləni ləğv edirəm.";
$saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`,`clock`,`description`) VALUES (?,?,?,?,?)");
$saveNews->execute([$_SESSION["id"],8,date("d.m.Y"),date("H:i:s"),$descriptionNews]);
  ?>
    <script type="text/javascript">
      alert("Məhsul uğurla qaytarıldı");
    </script>
  <?php
  echo '<meta http-equiv="refresh" content="0;url=index.php?id=37&mid='.$mid.'">';
?>