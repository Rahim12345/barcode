<?php  
if(isset($_GET["id"]))
{
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    if(isset($_POST["enter"]))
    {
      $money        =htmlspecialchars(trim($_POST["money"]));
      $description  =htmlspecialchars(trim($_POST["description"]));
      if($money=="" || $description=="")
      {
        $errKassa="Lütfən hər iki xananı doldurun";
      }
      else
      {
        if(!is_numeric($money) || $money<=0 || strlen($money)>6)
        {
          $errKassa="Doğru bir pul miqdarı daxil edin";
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
            $saveMoney->execute([$money,$accounterID,$accounterName,$description,date("d.m.Y"),1]);

            $saveNews=$conn->prepare("INSERT INTO `news`(`sellerID`, `operationType`, `date`, `clock`, `description`) VALUES (?,?,?,?,?)");
            $saveNews->execute([$_SESSION["id"],10,date("d.m.Y"),date("H:i:s"),$description]);
            ?>
            <script type="text/javascript">
              alert("Pul kassaya daxil edildi");
            </script>
            <?php
            echo '<meta http-equiv="refresh" content="0;url=index.php?id=33">';
          }
          else
          {
            $errKassa="Bir şeylər yanlış gedir...";
          }
        }
      }
      include 'kassaEntry4value.php';
    }
    else
    {
      include 'kassaEntry_default.php';
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