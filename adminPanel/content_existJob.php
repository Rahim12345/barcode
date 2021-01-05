<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud vəzifələr</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Jobs=$conn->prepare("SELECT * FROM jobs WHERE id>? ORDER BY name");
	$query4Jobs->execute([0]);
	$rows4Jobs=$query4Jobs->fetchall(PDO::FETCH_ASSOC);
	$count4Jobs=count($rows4Jobs);
	if($count4Jobs==0)
	{
		include 'content_existJob_default.php';
	}
	else
	{
		include 'content_existJob_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->