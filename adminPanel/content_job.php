<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Vəzifə əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <?php  
      if(isset($_POST["job"]))
      {
        $errorJob="";
        $job=htmlspecialchars(trim($_POST["jobInput"]));
        if(empty($job))
        {
          include 'content_job_default.php';
        }
        else
        {
          $query4Job=$conn->prepare("SELECT * FROM jobs WHERE name=?");
          $query4Job->execute([$job]);
          $rows4Job=$query4Job->fetchall(PDO::FETCH_ASSOC);
          $count4Job=count($rows4Job);
          if($count4Job==1)
          {
            $errorJob=$job." artıq sistemdə mövcuddur";
          }
          else
          {
            if(strlen($job)>50)
            {
              $errorjob="Vəzifə adı maksimum 50 simvol ola bilər";
            }
            else
            {
              $saveSJob=$conn->prepare("INSERT INTO jobs(name) VALUES (?)");
              $saveSJob->execute([$job]);
              $errorJob='"'.$job.'"'." uğurla əlavə olundu";
            }
          }
          include 'content_job_default.php';
        }
      }
      else
      {
        include 'content_job_default.php';
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->