<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud partnyorlar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Partnor=$conn->prepare("SELECT * FROM  partnyor WHERE id>? ORDER BY name");
	$query4Partnor->execute([0]);
	$rows4Partnor=$query4Partnor->fetchall(PDO::FETCH_ASSOC);
	$count4Partnor=count($rows4Partnor);
	if($count4Partnor==0)
	{
		include 'content_existPartnor_default.php';
	}
	else
	{
		include 'content_existPartnor_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->