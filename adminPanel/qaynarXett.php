<?php  
$query4hotCall=$conn->prepare("SELECT * FROM hotcall WHERE id>?");
$query4hotCall->execute([0]);
$rows4hotCall=$query4hotCall->fetchall(PDO::FETCH_ASSOC);
$count4hotCall=count($rows4hotCall);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Qaynar xətt daxil edin <br>
  <?php  
  if($count4hotCall==1)
  {
    print_r("Qaynar xətt ".$rows4hotCall[0]['telno']);
  }
  else
  {
    echo 'Hələ də "Qaynar xətt " daxil etməmisiniz.';
  }
  ?>
  </h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["hotadd"]))
      {
        $errorhotCall="";
        $hotPoint=htmlspecialchars(trim($_POST["hotPoint"]));
        if(empty($hotPoint))
        {
          include 'qaynarXett_default.php';
        }
        else
        {
            if(strlen($hotPoint)>25)
            {
              $errorhotCall="Hackmi etmək istiyirsən?";
              include 'qaynarXett_default.php';
            }
            else
            {
              if($count4hotCall==0)
              {
                $saveHotcall=$conn->prepare("INSERT INTO `hotcall`(`telno`) VALUES (?)");
                $saveHotcall->execute([$hotPoint]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=29">';
              }
              else
              {
                $updateHotcall=$conn->prepare("UPDATE `hotcall` SET `telno`=? WHERE `id`=?");
                $updateHotcall->execute([$hotPoint,1]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=29">';
              }
            }
        }
      }
      else
      {
        include 'qaynarXett_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->