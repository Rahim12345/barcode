<?php  
if(isset($_GET["id"]))
{
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    $profiT=0;
    $query4Profit=$conn->prepare("SELECT * FROM kassa WHERE id>?");
    $query4Profit->execute([0]);
    $rows4Profit=$query4Profit->fetchall(PDO::FETCH_ASSOC);
    $count4Profit=count($rows4Profit);
    if($count4Profit!=0)
    {
      foreach($rows4Profit as $row4Profit)
      {
        $profiT+=$row4Profit["profit"];
      }
    }

    $moneY1=0;
    $moneY2=0;
    $moneY=0;
    $moneyIn=0;
    $query4ExitKassa=$conn->prepare("SELECT `money`,`entryExit` FROM kassaplus WHERE id>?");
    $query4ExitKassa->execute([0]);
    $rows4ExitKassa=$query4ExitKassa->fetchall(PDO::FETCH_ASSOC);
    $count4ExitKassa=count($rows4ExitKassa);
    if($count4ExitKassa!=0)
    {
      foreach($rows4ExitKassa as $row4ExitKassa)
      {
        if($row4ExitKassa["entryExit"]==1)
        {
          $moneY1+=$row4ExitKassa["money"];
        }
        else
        {
          $moneY2+=$row4ExitKassa["money"];
        }
      }
    }
    $moneY=$moneY1-$moneY2;
    $moneyIn=$profiT+$moneY;
    $Denqi="Kassada $moneyIn AZN pul var";
    if(isset($_POST["enter"]))
    {
      $money        =htmlspecialchars(trim($_POST["money"]));
      $description  =htmlspecialchars(trim($_POST["description"]));
      $partnor      =htmlspecialchars(trim($_POST["partnor"]));
      if($money=="" || $description=="" || $partnor=="")
      {
        $errKassa="Lütfən hər üç xananı doldurun";
      }
      else
      {
        if(!is_numeric($money) || $money<=0 || strlen($money)>6)
        {
          $errKassa="Doğru bir pul miqdarı daxil edin";
        }
        else
        {
          $query4Partnor=$conn->prepare("SELECT * FROM partnyor WHERE id=?");
          $query4Partnor->execute([$partnor]);
          $rows4Partnor=$query4Partnor->fetchall(PDO::FETCH_ASSOC);
          $count4Partnor=count($rows4Partnor);
          if($count4Partnor==0)
          {
            $errKassa="Ağzuun üstündən bir yumruq vuraram))";
          }
          else
          {
            if($moneyIn<$money)
            {
              $errKassa=" əməliyyat uğursuz oldu!";
            }
            else
            {
              $accounterID=$_SESSION["id"];

              $query4accounterName=$conn->prepare("SELECT * FROM users WHERE id=?");
              $query4accounterName->execute([$accounterID]);
              $rows4accounterName=$query4accounterName->fetchall(PDO::FETCH_ASSOC);
              $count4accounterName=count($rows4accounterName);
              if($count4accounterName!=0)
              {
                $accounterName=$rows4accounterName[0]["status"].":".$rows4accounterName[0]["name"];
                $saveMoney=$conn->prepare("INSERT INTO `kassaplus`(`money`, `accounterID`, `accounterName`, `description`, `date` , `entryExit`) VALUES (?,?,?,?,?,?)");
                $saveMoney->execute([$money,$accounterID,$accounterName,$description,date("d.m.Y"),0]);

                $saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`, `clock`, `description`) VALUES (?,?,?,?,?)");
                $saveNews->execute([$_SESSION["id"],11,date("d.m.Y"),date("H:i:s"),$description]);

                $savePartnor=$conn->prepare("INSERT INTO `partnormoney`(`sellerID`, `partnyorID`, `money`, `description`, `date`) VALUES (?,?,?,?,?)");
                $savePartnor->execute([$_SESSION["id"],$partnor,$money,$description,date("d.m.Y")]);
                ?>
                <script type="text/javascript">
                  alert("Partnyora pul göndərmək əməliyyatı uğurlu oldu");
                </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=39">';
              }
              else
              {
                $errKassa="Bir şeylər yanlış gedir...";
              }
            }
          }
        }
      }
      include 'PartnorMoney4value.php';
    }
    else
    {
      include 'PartnorMoney_default.php';
    }
  }
  else
  {
    include '404.html';
  }
}
else
{
  include 'header.php';
  include '404.html';
  include 'footer.php';
}
?>