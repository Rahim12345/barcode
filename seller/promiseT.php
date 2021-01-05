<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Topdan satış üzrə borclular</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Promise=$conn->prepare("SELECT * FROM topdan WHERE timer!=? AND rasot=? AND price!=? ORDER BY id DESC");
	$query4Promise->execute([0,1,0]);
	$rows4Promise=$query4Promise->fetchall(PDO::FETCH_ASSOC);
	$count4Promise=count($rows4Promise);
	if($count4Promise==0)
	{
		include 'promiseT_default.php';
	}
	else
	{
		include 'promiseT_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->