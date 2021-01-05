<?php  
$query4LimitedCreditTime=$conn->prepare("SELECT * FROM limitedcredittime WHERE id>?");
$query4LimitedCreditTime->execute([0]);
$rows4LimitedCreditTime=$query4LimitedCreditTime->fetchall(PDO::FETCH_ASSOC);
$count4LimitedCreditTime=count($rows4LimitedCreditTime);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Burada siz satıcıya cari tarixdən ən çox neçə gün sonra kreditləşmənin təyini üçün limit qoya bilərsiniz <br>
  <?php  
  if($count4LimitedCreditTime==1)
  {
    print_r("Mövcüd limitləndirilimiş kredit günü ".$rows4LimitedCreditTime[0]['time']."  dür");
  }
  else
  {
    echo 'Hələ də "limitləndirilimiş kredit gününü " daxil edməmisiniz.';
  }
  ?>
  </h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["LimitedCreditTime"]))
      {
        $errorLimitedCreditTime="";
        $LimitedCreditTime=htmlspecialchars(trim($_POST["LimitedCreditTimeInput"]));
        if(empty($LimitedCreditTime) && $LimitedCreditTime!=0)
        {
          include 'content_limitedCredit_default.php';
        }
        else
        {
          if(is_numeric($LimitedCreditTime) && $LimitedCreditTime>=0)
          {
            if(strlen($LimitedCreditTime)>2)
            {
              $errorLimitedCreditTime="Hackmi etmək istiyirsən?";
              include 'content_limitedCredit_default.php';
            }
            else
            {
              if($count4LimitedCreditTime==0)
              {
                $saveLimitedCreditTime=$conn->prepare("INSERT INTO `limitedcredittime`(`time`) VALUES (?)");
                $saveLimitedCreditTime->execute([$LimitedCreditTime]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=23">';
              }
              else
              {
                $updateLimitedCreditTime=$conn->prepare("UPDATE `limitedcredittime` SET `time`=? WHERE `id`=?");
                $updateLimitedCreditTime->execute([$LimitedCreditTime,1]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=23">';
              }
            }
          }
          else
          {
            $errorLimitedCreditTime="Yalnız ədədlər daxil edə bilərsiniz";
            include 'content_limitedCredit_default.php';
          }
        }
      }
      else
      {
        include 'content_limitedCredit_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->