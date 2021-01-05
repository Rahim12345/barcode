<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Anbar əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["warehouse"]))
      {
        $errorWare="";
        $warehouse=htmlspecialchars(trim($_POST["warehouseInput"]));
        if(empty($warehouse))
        {
          include 'content_warehouse1_default.php';
        }
        else
        {
          $query4Warehouse=$conn->prepare("SELECT * FROM warehouse WHERE name=?");
          $query4Warehouse->execute([$warehouse]);
          $rows4Warehouse=$query4Warehouse->fetchall(PDO::FETCH_ASSOC);
          $count4Warehouse=count($rows4Warehouse);
          if($count4Warehouse==1)
          {
            $errorWare=$warehouse." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($warehouse)>50)
            {
              $errorWare="Anbar adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $saveWarehouse=$conn->prepare("INSERT INTO warehouse(name) VALUES (?)");
              $saveWarehouse->execute([$warehouse]);
              $errorWare='"'.$warehouse.'"'." uğurla əlavə olundu";
            }
          }
          include 'content_warehouse1_default.php';
        }
      }
      else
      {
        include 'content_warehouse1_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->