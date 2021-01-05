<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mövcud işçilər</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4Users=$conn->prepare("SELECT * FROM users WHERE id>?");
	$query4Users->execute([0]);
	$rows4Users=$query4Users->fetchall(PDO::FETCH_ASSOC);
	$count4Users=count($rows4Users);
	if($count4Users==0)
	{
		include 'content_existUser_default.php';
	}
	else
	{
		include 'content_existUser_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->