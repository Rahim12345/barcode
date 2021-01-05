<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud modellər</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Models=$conn->prepare("SELECT * FROM models WHERE id>? ORDER BY name");
	$query4Models->execute([0]);
	$rows4Models=$query4Models->fetchall(PDO::FETCH_ASSOC);
	$count4Models=count($rows4Models);
	if($count4Models==0)
	{
		include 'content_existModel_default.php';
	}
	else
	{
		include 'content_existModel_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->