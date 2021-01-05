<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">İstehsalçı əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["manufacturer"]))
      {
        $errormanufacturer="";
        $manufacturer=htmlspecialchars(trim($_POST["manufacturerInput"]));
        if(empty($manufacturer))
        {
          include 'content_manufacturer_default.php';
        }
        else
        {
          $query4Manufacturer=$conn->prepare("SELECT * FROM manufacturer WHERE name=?");
          $query4Manufacturer->execute([$manufacturer]);
          $rows4Manufacturer=$query4Manufacturer->fetchall(PDO::FETCH_ASSOC);
          $count4Manufacturer=count($rows4Manufacturer);
          if($count4Manufacturer==1)
          {
            $errormanufacturer=strtoupper($manufacturer)." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($manufacturer)>50)
            {
              $errormanufacturer="İstehsalçı adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $saveSJob=$conn->prepare("INSERT INTO manufacturer(name) VALUES (?)");
              $saveSJob->execute([strtoupper($manufacturer)]);
              $errormanufacturer='"'.strtoupper($manufacturer).'"'." uğurla əlavə olundu";
            }
          }
          include 'content_manufacturer_default.php';
        }
      }
      else
      {
        include 'content_manufacturer_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->