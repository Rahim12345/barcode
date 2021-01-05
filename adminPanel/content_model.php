<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Model əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["model"]))
      {
        $errorModel="";
        $model=htmlspecialchars(trim($_POST["modelInput"]));
        if(empty($model))
        {
          include 'content_model_default.php';
        }
        else
        {
          $query4Model=$conn->prepare("SELECT * FROM models WHERE name=?");
          $query4Model->execute([$model]);
          $rows4Model=$query4Model->fetchall(PDO::FETCH_ASSOC);
          $count4Model=count($rows4Model);
          if($count4Model==1)
          {
            $errorModel=strtoupper($model)." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($model)>50)
            {
              $errorModel="Model adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $saveModel=$conn->prepare("INSERT INTO models(name) VALUES (?)");
              $saveModel->execute([$model]);
              $errorModel='"'.strtoupper($model).'"'." uğurla əlavə olundu";
            }
          }
          include 'content_model_default.php';
        }
      }
      else
      {
        include 'content_model_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->