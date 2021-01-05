<?php  
if(isset($_POST["Pay"]))
{
  $hiddenMid=htmlspecialchars(trim($_POST["hmid"]));
  $creditPay=htmlspecialchars(trim($_POST["creditPay"]));
  $debbePay=htmlspecialchars(trim($_POST["debbePay"]));
  if(!is_numeric($creditPay) || !is_numeric($debbePay) || !is_numeric($hiddenMid) || $creditPay<0 ||  $debbePay<0 || $hiddenMid<=0 || ceil($hiddenMid)-$hiddenMid!=0 || $creditPay=="" || $debbePay=="")
  {
// header("Location:index.php?id=16&mid=$hiddenMid");
// die();
    include 'payAssist.php';
  }
  else
  {
    $query4check=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
    $query4check->execute([$hiddenMid]);
    $rows4check=$query4check->fetchall(PDO::FETCH_ASSOC);
    $remindMoney=$rows4check[0]["remindMoney"];
    $count4check=count($rows4check);
    if($count4check==0)
    {
      include '404.html';
    }
    else
    {
      $tot=$rows4check[0]['debbeDays']+$rows4check[0]['totalDebbeDays'];
      $debbeBorcu=(($tot*$rows4check[0]["debbe"]*$rows4check[0]["productPrice"])/100)-$rows4check[0]["amountPaidDebbe"];

      $query4Seller=$conn->prepare("SELECT * FROM users WHERE id=?");
      $query4Seller->execute([$_SESSION["id"]]);
      $rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);
      
      if($debbeBorcu<$debbePay)
      {
        $paer="Cərimə üçün lazım olandan artıq pul daxil edirsiniz";
        include 'payInsertErr.php';
      }
      else
      {
        $totalCreditPaid=$rows4check[0]["amountPaid"]+$creditPay;
        $totalDebbePaid=$rows4check[0]["amountPaidDebbe"]+$debbePay;
        $totalPayDetail=$rows4check[0]["payDetails"];
        if($totalPayDetail=="")
        {
        $totalPayDetails=$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$creditPay." AZN(əsas) və $debbePay AZN(cərimə) ödəniş etdi";
        }
        else
        {
          $totalPayDetails=$totalPayDetail." ,".$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." ".date("d.m.Y")." tarixində saat "." ".date("H:i")." da ".$creditPay." AZN(əsas) və $debbePay AZN(cərimə)  ödəniş etdi";
        }

        if($remindMoney>=$totalCreditPaid)
        {
          if(strlen($creditPay)>5 || strlen($debbePay)>5)
          {
            $paer="Doğru bir pul daxil edin.";
            include 'payInsertErr.php';
          }
          else
          {
  $updatePaid=$conn->prepare("UPDATE `creditdetails` SET `amountPaid`=? ,`amountPaidDebbe`=?,`payDetails`=?,`sonEsas`=?,`sonCerime`=? WHERE id=?");
  $updatePaid->execute([$totalCreditPaid,$totalDebbePaid,$totalPayDetails,$creditPay,$debbePay,$hiddenMid]);


  $profit=$creditPay+$debbePay;
  $query4BMK=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
  $query4BMK->execute([$hiddenMid,1]);
  $rows4BMK=$query4BMK->fetchall(PDO::FETCH_ASSOC);
  $count4BMK=count($rows4BMK);
  if($count4BMK!=0 && $profit!=0)
  {
    $bmkID=$rows4BMK[0]["id"];
    $saveKassa=$conn->prepare("INSERT INTO `kassa`(`bmk`, `profit`, `date`) VALUES (?,?,?)");
    $saveKassa->execute([$bmkID,$profit,date("d.m.Y")]);
    $bmk=$bmkID;
    include 'bmkFunction.php';

    $description="Mən,".$rows4Seller[0]["status"].":".$rows4Seller[0]["name"]." tərəfindən ||".$bmk." müqaviləyə əsasən müştərinin aylıq kredit borcundan ".$creditPay." AZN(əsas) və ".$debbePay ." AZN(cərimə) ödədim.";
    $saveKassa=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`,`clock`,`description`) VALUES (?,?,?,?,?)");
    $saveKassa->execute([$_SESSION["id"],2,date("d.m.Y"),date("H:i:s"),$description]);
  }


  $query4Reserve=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
  $query4Reserve->execute([$hiddenMid]);
  $rows4Reserve=$query4Reserve->fetchall(PDO::FETCH_ASSOC);
  $count4Reserve=count($rows4Reserve);

  if($count4Reserve!=0)
  {
    if($remindMoney==$totalCreditPaid)
    {
  $z=$rows4Reserve[0]["debbeDays"]+$rows4Reserve[0]["totalDebbeDays"];
  $queryOverDay5=$conn->prepare("UPDATE `creditdetails` SET `debbeDays`=?,`totalDebbeDays`=? WHERE `id`=?");
  $queryOverDay5->execute([0,$z,$hiddenMid]);
    }
    else
    {
  $emsal2=$rows4Reserve[0]["amountPaid"]/$rows4Reserve[0]["avaragePay"];
  $emsal2=floor($emsal2);
  $month2s=explode(",",$rows4Reserve[0]["creditTable"]);
  $today=strtotime(date("d.m.Y"));//Burda bu  date("d.m.Y") yazacam
  $month2=$month2s[$emsal2];
  $month2=strtotime($month2);
  $overDay2=($today-$month2)/(24*60*60);
  if($overDay2<=0)
  {
    $z=$rows4Reserve[0]["debbeDays"]+$rows4Reserve[0]["totalDebbeDays"];
    $queryOverDay2=$conn->prepare("UPDATE `creditdetails` SET `debbeDays`=?,`totalDebbeDays`=? WHERE `id`=?");
    $queryOverDay2->execute([0,$z,$hiddenMid]);
  }
  else
  {
    $queryOverDay=$conn->prepare("UPDATE `creditdetails` SET `debbeDays`=? WHERE `id`=?");
    $queryOverDay->execute([$overDay2,$hiddenMid]);
  }
    }
  }
  header("Location:index.php?id=20&mid=$hiddenMid");
  die();
          }
        }
        else
        {
          $paer="Bu hesabın bağlanması üçün lazım olandan artıq pul daxil edirsiniz";
          include 'payInsertErr.php';
        }
      }
    }
  }
}
else
{
  include '404.html';
}
?>