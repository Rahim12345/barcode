<?php  
if(isset($_POST["toCredit"]))
{
  $ilkinOdenis =htmlspecialchars(trim($_POST["ilkinOdenis"]));
  if($ilkinOdenis!="" && is_numeric($ilkinOdenis) && $ilkinOdenis>0)
  {
    if(isset($_POST["partnors"]))
    {
      $partnorlar       =$_POST["partnors"];
      $mallar           =$_POST["productNames"];
      $modeller         =$_POST["models"];
      $serialar         =$_POST["serias"];
      $qiymetler        =$_POST["prices"];
    }
    else
    {
      $partnorlar       =[];
      $mallar           =[];
      $modeller         =[];
      $serialar         =[];
      $qiymetler        =[];
    }
    $partnorCount=count($partnorlar);

    $crederr='';
    $seriali=[];
    $seriasiz=[];
    $seriasizArray=[];
    $pN=count($partnorlar);
    include 'ianeFilter.php';

    $query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
    $query4Bmk->execute([$mid,1]);
    $rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
    $count4Bmk=count($rows4Bmk);
    if($count4Bmk!=0)
    {
      $uid=$_SESSION["id"];
      $queryUsers=$conn->prepare("SELECT * FROM users WHERE id=?");
      $queryUsers->execute([$uid]);
      $rowsUsers=$queryUsers->fetchall(PDO::FETCH_ASSOC);
      $countUsers=count($rowsUsers);
      if($countUsers!=0)
      {
        $rejectExecName=$rowsUsers[0]["status"].":".$rowsUsers[0]["name"];
        $insertReject=$conn->prepare("INSERT INTO `rejected`(`bmk`, `date`, `rejectExecName`, `rejectExecID`) VALUES (?,?,?,?)");
        $insertReject->execute([$rows4Bmk[0]["id"],date("d.m.Y"),$rejectExecName,$uid]);


        $query4RejID=$conn->prepare("SELECT * FROM rejected WHERE id>? ORDER BY id DESC");
        $query4RejID->execute([0]);
        $rows4RejID=$query4RejID->fetchall(PDO::FETCH_ASSOC);
        $rejecedID=$rows4RejID[0]["id"];
      }
    }




    if($partnorCount==0)
    {
      // $crederr="Müqaviləni ləğv edəcəm";
      include 'ianeCreditTam.php';
    }
    else
    {
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
      $ilkinOdenis=htmlspecialchars(trim($_POST["ilkinOdenis"]));
      if($malinQiymeti<$ilkinOdenis)
      {
        $crederr="Malın qiyməti ilkin ödənişdən kiçikdir!";
      }
      else
      {
        // $crederr="Hissə hissə ləğv edəcəm";
        $remindMoney=$malinQiymeti-$ilkinOdenis;
        $avaragePay=$remindMoney/$rows4CreditDetails[0]["countMonth"];
        include 'ianeCreditPart.php';
      }
    }
    include 'ianeFormVal.php';
  }
  else
  {
    ?>
<script type="text/javascript">
  alert("İlkin ödəniş üçün doğru bir bir ədəd daxil edin");
</script>
    <?php
echo '<meta http-equiv="refresh" content="0;url=index.php?id=36&mid='.$mid.'">';
  }
}
else
{
  include 'ianeForm_default.php';
}
?>