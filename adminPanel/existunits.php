<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud vahidlər</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Units=$conn->prepare("SELECT * FROM units WHERE id>? ORDER BY name");
	$query4Units->execute([0]);
	$rows4Units=$query4Units->fetchall(PDO::FETCH_ASSOC);
	$count4Units=count($rows4Units);
	if($count4Units==0)
	{
		include 'content_existUnit_default.php';
	}
	else
	{
		include 'content_existUnit_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->