<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Partnor əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["partnor"]))
      {
        $errorPartnor="";
        $partnor=htmlspecialchars(trim($_POST["partnorInput"]));
        if(empty($partnor))
        {
          include 'content_partnor_default.php';
        }
        else
        {
          $query4Partnor=$conn->prepare("SELECT * FROM partnyor WHERE name=?");
          $query4Partnor->execute([$partnor]);
          $rows4Partnor=$query4Partnor->fetchall(PDO::FETCH_ASSOC);
          $count4Partnor=count($rows4Partnor);
          if($count4Partnor==1)
          {
            $errorPartnor=strtoupper($partnor)." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($partnor)>50)
            {
              $errorPartnor="Partnyor adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $savePartnor=$conn->prepare("INSERT INTO partnyor(name) VALUES (?)");
              $savePartnor->execute([strtoupper($partnor)]);
              $errorPartnor='"'.strtoupper($partnor).'"'." uğurla əlavə olundu";
            }
          }
          include 'content_partnor_default.php';
        }
      }
      else
      {
        include 'content_partnor_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->