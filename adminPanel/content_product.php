<?php  
$query4manufacturerInAddProduct=$conn->prepare("SELECT * FROM manufacturer WHERE id>? ORDER BY name ASC");
$query4manufacturerInAddProduct->execute([0]);
$rows4manufacturerInAddProduct=$query4manufacturerInAddProduct->fetchall(PDO::FETCH_ASSOC);
$count4manufacturerInAddProduct=count($rows4manufacturerInAddProduct);
if($count4manufacturerInAddProduct==0)
{
	$errorProduct="İlk öncə İstehsalçıları əlavə etməlisiniz! <br/> <a href='index.php?id=10' class='btn btn-primary'>İstehsalçı <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
	include 'content_product_default.php';
}
else
{
	$query4ModelsInAddProduct=$conn->prepare("SELECT * FROM models WHERE id>? ORDER BY name ASC");
	$query4ModelsInAddProduct->execute([0]);
	$rows4ModelsInAddProduct=$query4ModelsInAddProduct->fetchall(PDO::FETCH_ASSOC);
	$count4ModelsInAddProduct=count($rows4ModelsInAddProduct);	
	if($count4ModelsInAddProduct==0)
	{
		$errorProduct="İlk öncə Modelləri əlavə etməlisiniz!<br/> <a href='index.php?id=12' class='btn btn-primary'>Model <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
		include 'content_product_default.php';
	}
	else
	{
		$query4PartnorInAddProduct=$conn->prepare("SELECT * FROM  partnyor WHERE id>? ORDER BY name ASC");
		$query4PartnorInAddProduct->execute([0]);
		$rows4PartnorInAddProduct=$query4PartnorInAddProduct->fetchall(PDO::FETCH_ASSOC);
		$count4PartnorInAddProduct=count($rows4PartnorInAddProduct);
		if($count4PartnorInAddProduct==0)
		{
			$errorProduct="İlk öncə Partnyorlar əlavə etməlisiniz!<br/> <a href='index.php?id=18' class='btn btn-primary'>Partnyor <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
			include 'content_product_default.php';
		}
		else
		{
			$query4CategoryInAddProduct=$conn->prepare("SELECT * FROM categories WHERE id>? ORDER BY name ASC");
			$query4CategoryInAddProduct->execute([0]);
			$rows4CategoryInAddProduct=$query4CategoryInAddProduct->fetchall(PDO::FETCH_ASSOC);
			$count4CategoryInAddProduct=count($rows4CategoryInAddProduct);
			if($count4CategoryInAddProduct==0)
			{
				$errorProduct="İlk öncə Kateqoriyaları əlavə etməlisiniz!<br/> <a href='index.php?id=15' class='btn btn-primary'>Kateqoriya <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
				include 'content_product_default.php';
			}
			else
			{
				include 'content_product_insert.php';
			}
		}
	}
}
?>