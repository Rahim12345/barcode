<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud kateqoriyalar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Category=$conn->prepare("SELECT * FROM categories WHERE id>? ORDER BY name");
	$query4Category->execute([0]);
	$rows4Category=$query4Category->fetchall(PDO::FETCH_ASSOC);
	$count4Category=count($rows4Category);
	if($count4Category==0)
	{
		include 'content_existCategory_default.php';
	}
	else
	{
		include 'content_existCategory_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->