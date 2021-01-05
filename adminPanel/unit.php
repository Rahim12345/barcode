<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Kateqoriya əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["vahidInput"]))
      {
        $errorUnit="";
        $vahid=htmlspecialchars(trim($_POST["vahidInput"]));
        if(empty($vahid))
        {
          include 'unit_default.php';
        }
        else
        {
          $query4Units=$conn->prepare("SELECT * FROM units WHERE name=?");
          $query4Units->execute([$vahid]);
          $rows4Units=$query4Units->fetchall(PDO::FETCH_ASSOC);
          $count4Units=count($rows4Units);
          if($count4Units==1)
          {
            $errorUnit=strtoupper($vahid)." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($vahid)>10)
            {
              $errorUnit="Vahid adı maksimum 10 simvol ola bilər";
            }
            else
            {
              $saveUnit=$conn->prepare("INSERT INTO units(name) VALUES (?)");
              $saveUnit->execute([strtoupper($vahid)]);
              $errorUnit='"'.strtoupper($vahid).'"'." uğurla əlavə olundu";
            }
          }
          include 'unit_default.php';
        }
      }
      else
      {
        include 'unit_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->