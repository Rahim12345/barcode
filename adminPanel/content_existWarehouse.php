<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud anbarlar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Warehouse=$conn->prepare("SELECT * FROM warehouse WHERE id>? ORDER BY name");
	$query4Warehouse->execute([0]);
	$rows4Warehouse=$query4Warehouse->fetchall(PDO::FETCH_ASSOC);
	$count4Warehouse=count($rows4Warehouse);
	if($count4Warehouse==0)
	{
		include 'content_existWarehouse_default.php';
	}
	else
	{
		include 'content_existWarehouse_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->