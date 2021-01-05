<?php  
$query4units=$conn->prepare("SELECT * FROM units WHERE id>?");
$query4units->execute([0]);
$rows4units=$query4units->fetchall(PDO::FETCH_ASSOC);
$count4units=count($rows4units);
if($count4units==0)
{
  $errorCategory="İlk öncə vahidləri daxil etməlisiniz!<br/> <a href='index.php?id=35' class='btn btn-primary'>Vahid <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
  ?>
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorCategory))
      {
        echo $errorCategory;
      } 
      ?>
    </h6>
  </div>
  <?php
}
else
{
  ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Kateqoriya əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["category"]))
      {
        $errorCategory="";
        $category =htmlspecialchars(trim($_POST["categoryInput"]));
          if(isset($_POST["unit"]))
          {
            $unit     = $_POST["unit"];
          }
          else
          {
            $unit     ="";
          }
        if(empty($category) || empty($unit))
        {
          $errorCategory="Kateqoriya adı və ya vahid seçilməyib!";
          include 'content_category_default.php';
        }
        else
        {
          $query4Job=$conn->prepare("SELECT * FROM categories WHERE name=?");
          $query4Job->execute([$category]);
          $rows4Job=$query4Job->fetchall(PDO::FETCH_ASSOC);
          $count4Job=count($rows4Job);
          if($count4Job==1)
          {
            $errorCategory=strtoupper($category)." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($category)>50)
            {
              $errorCategory="Kateqoriya adı maksimum 50 simvol ola bilər";
            }
            else
            {
              if(strlen($unit)>10)
              {
                $errorCategory="Vahid 10 simvoldan çox ola bilməz";
              }
              else
              {
                $saveSJob=$conn->prepare("INSERT INTO categories(name,unit) VALUES (?,?)");
                $saveSJob->execute([strtoupper($category),$unit]);
                $errorCategory='"'.strtoupper($category).'"'." uğurla əlavə olundu";
              }
            }
          }
          include 'content_category_default.php';
        }
      }
      else
      {
        include 'content_category_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->
  <?php
}
?>