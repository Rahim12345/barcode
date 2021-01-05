<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud istehsalçılar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4manufacturer=$conn->prepare("SELECT * FROM manufacturer WHERE id>? ORDER BY name");
	$query4manufacturer->execute([0]);
	$rows4manufacturer=$query4manufacturer->fetchall(PDO::FETCH_ASSOC);
	$count4manufacturer=count($rows4manufacturer);
	if($count4manufacturer==0)
	{
		include 'content_exist_manufacturer_default.php';
	}
	else
	{
		include 'content_exist_manufacturer_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->