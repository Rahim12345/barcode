<?php  
$query4Debbe=$conn->prepare("SELECT * FROM debbe WHERE id>?");
$query4Debbe->execute([0]);
$rows4Debbe=$query4Debbe->fetchall(PDO::FETCH_ASSOC);
$count4Debbe=count($rows4Debbe);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Dəbbə əlavə et <br>
  <?php  
  if($count4Debbe==1)
  {
    print_r("Mövcüd dəbbə ".$rows4Debbe[0]['debbe']."  %-dir");
  }
  else
  {
    echo "Hələ də dəbbə %-i əlavə edilməyib.";
  }
  ?>
  </h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["debbe"]))
      {
        $errorDebbe="";
        $debbe=htmlspecialchars(trim($_POST["debbeInput"]));
        if(empty($debbe) && $debbe!=0)
        {
          include 'content_debbe_default.php';
        }
        else
        {
          if(is_numeric($debbe) && $debbe>=0)
          {
            if(strlen($debbe)>1)
            {
              $errorDebbe="Hackmi etmək istiyirsən?";
              include 'content_debbe_default.php';
            }
            else
            {
              if($count4Debbe==0)
              {
                $saveDebbe=$conn->prepare("INSERT INTO `debbe`(`debbe`) VALUES (?)");
                $saveDebbe->execute([$debbe]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=22">';
              }
              else
              {
                $updateDebbe=$conn->prepare("UPDATE `debbe` SET `debbe`=? WHERE `id`=?");
                $updateDebbe->execute([$debbe,1]);
                echo '<meta http-equiv="refresh" content="0;url=index.php?id=22">';
              }
            }
          }
          else
          {
            $errorDebbe="Yalnız ədədlər daxil edə bilərsiniz";
            include 'content_debbe_default.php';
          }
        }
      }
      else
      {
        include 'content_debbe_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->