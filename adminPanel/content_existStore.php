<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud mağazalar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Store=$conn->prepare("SELECT * FROM store WHERE id>? ORDER BY name");
	$query4Store->execute([0]);
	$rows4Store=$query4Store->fetchall(PDO::FETCH_ASSOC);
	$count4Store=count($rows4Store);
	if($count4Store==0)
	{
		include 'content_existStore_default.php';
	}
	else
	{
		include 'content_existStore_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->