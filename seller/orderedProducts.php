<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Təhvil verilməmiş məhsullar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$query4orderedProducts=$conn->prepare("SELECT * FROM  deliveryproducts WHERE status=? ORDER BY id DESC");
	$query4orderedProducts->execute(["2"]);
	$rows4orderedProducts=$query4orderedProducts->fetchall(PDO::FETCH_ASSOC);
	$count4orderedProducts=count($rows4orderedProducts);
	if($count4orderedProducts==0)
	{
		include 'orderedProducts_default.php';
	}
	else
	{
		include 'orderedProducts_default_table.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->