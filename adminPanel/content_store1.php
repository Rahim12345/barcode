<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Mağaza əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["store"]))
      {
        $errorStore="";
        $store=htmlspecialchars(trim($_POST["storeInput"]));
        if(empty($store))
        {
          include 'content_store1_default.php';
        }
        else
        {
          $query4Store=$conn->prepare("SELECT * FROM store WHERE name=?");
          $query4Store->execute([$store]);
          $rows4Store=$query4Store->fetchall(PDO::FETCH_ASSOC);
          $count4Store=count($rows4Store);
          if($count4Store==1)
          {
            $errorStore=$store." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($store)>50)
            {
              $errorStore="Mağaza adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $saveStore=$conn->prepare("INSERT INTO store(name) VALUES (?)");
              $saveStore->execute([$store]);
              $errorStore='"'.$store.'"'." uğurla əlavə olundu";
            }
          }
          include 'content_store1_default.php';
        }
      }
      else
      {
        include 'content_store1_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->