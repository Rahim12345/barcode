<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Məhsul əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card shadow mb-4">
        <div class="card-body">
		<?php  
		if(isset($_POST["productAdd"]))
		{
$partnor4Product		=htmlspecialchars(trim($_POST["partnor4Product"]));
$manufacturer4Product	=htmlspecialchars(trim($_POST["manufacturer4Product"]));
$model4Product			=htmlspecialchars(trim($_POST["model4Product"]));
$category4Product		=htmlspecialchars(trim($_POST["category4Product"]));
$factura				=htmlspecialchars(trim($_POST["factura"]));
$serias					=$_POST["serias"];
$date 					=htmlspecialchars(trim($_POST["date"]));
$wholesale 				=htmlspecialchars(trim($_POST["wholesale"]));
$selling 				=htmlspecialchars(trim($_POST["selling"]));
$credit					=htmlspecialchars(trim($_POST["credit"]));
			if(empty($partnor4Product) || empty($manufacturer4Product) || empty($model4Product) || empty($category4Product) || empty($factura)  || empty($date) || empty($wholesale) || empty($selling) || empty($credit))
			{
				$errorProduct="Lütfən boş xana buraxmayın";
				include 'product_form_default4_values.php';
			}
			else
			{
				if(strlen($partnor4Product)>50)
				{
					$errorProduct="Partnyor üçün maksimum 50 simvol daxil edin";
				}
				else
				{
					if(strlen($manufacturer4Product)>50)
					{
						$errorProduct="İstehsalçı üçün maksimum 50 simvol daxil edin";
					}
					else
					{
						if(strlen($model4Product)>50)
						{
							$errorProduct="Model üçün maksimum 50 simvol daxil edin";
						}
						else
						{
							if(strlen($category4Product)>50)
							{
								$errorProduct="Kateqoriya üçün maksimum 50 simvol daxil edin";
							}
							else
							{
								if(strlen($factura)>50)
								{
									$errorProduct="Faktura üçün maksimum 50 simvol daxil edin";
								}
								else
								{

								
									if(strlen($date)>10)
									{
										$errorProduct="Tarix üçün maksimum 10 simvol daxil edin";
									}
									else
									{
										if(strlen($wholesale)>5)
										{
											$errorProduct="Satış qiyməti üçün maksimum 9999 daxil edə bilərsiniz";
										}
										else
										{
											if(strlen($selling)>5)
											{
												$errorProduct="Satış qiyməti üçün maksimum 9999 daxil edə bilərsiniz";
											}
											else
											{
												if(strlen($credit)>5)
												{
													$errorProduct="Satış qiyməti üçün maksimum 9999 daxil edə bilərsiniz";
												}
												else
$errorProduct="";												{
$divC=count($serias);
$sertXX=0;
for($a=0;$a<$divC;$a++)
{
	if($divC>1 AND strlen($serias[$a])<4)
	{
		$sertXX=1;
	}
}


if($sertXX==1)
{
	$errorProduct="Eyni zamanda həm serialı həm vahidlə məhsul daxil edə bilməzsiz";
}
else
{
	for($i=0;$i<$divC;$i++)
	{
		if($divC==1 && strlen($serias[0])<=4)
		{
			if(!is_numeric($serias[0]) || ceil($serias[0])-$serias[0]!=0 || $serias[0]<=0)
			{
				$errorProduct="Say 1-4 simvoldan ibarət ədəd ola bilər<br/>";
			}
			else
			{
	$saveProduct=$conn->prepare("INSERT INTO products(warehouse,partnor,manufacturer,model,category,factura,dimension,memoryDimension,productDate,wholesale,selling,credit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$saveProduct->execute(["Virtual anbar",$partnor4Product,$manufacturer4Product,$model4Product,$category4Product,$factura,$serias[0],$serias[0],$date,$wholesale,$selling,$credit]);
	$errorProduct.=$model4Product." ".$category4Product."  məhsulu uğurla əlavə olundu.<br/>";
			}
		}
		else
		{
	if(strlen($serias[$i])>90)
		{
			$errorProduct.=$serias[$i]." Seria üçün maksimum 90 simvol daxil edin<br/>";
		}
		else
		{
			if(strlen($serias[$i])==0)
			{
	$saveProduct=$conn->prepare("INSERT INTO products(warehouse,partnor,manufacturer,model,category,factura,seria,productDate,wholesale,selling,credit) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	$saveProduct->execute(["Virtual anbar",$partnor4Product,$manufacturer4Product,$model4Product,$category4Product,$factura,$serias[$i],$date,$wholesale,$selling,$credit]);
	$errorProduct.=$model4Product."  məhsulu uğurla əlavə olundu.<br/>";
			}
			else
			{
	$query4Seria=$conn->prepare("SELECT * FROM products WHERE seria=?");
	$query4Seria->execute([$serias[$i]]);
	$rows4Seria=$query4Seria->fetchall(PDO::FETCH_ASSOC);
	$count4Seria=count($rows4Seria);
	if($count4Seria==1)
	{
	$errorProduct.=$serias[$i]." serialı məhsul sistemdə mövcuddur.<br/>";
	}
	else
	{
	$saveProduct=$conn->prepare("INSERT INTO products(warehouse,partnor,manufacturer,model,category,factura,seria,productDate,wholesale,selling,credit) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	$saveProduct->execute(["Virtual anbar",$partnor4Product,$manufacturer4Product,$model4Product,$category4Product,$factura,$serias[$i],$date,$wholesale,$selling,$credit]);
	$errorProduct.=$model4Product."  məhsulu uğurla əlavə olundu.<br/>";
	echo '<meta http-equiv="refresh" content="1;url=index.php?id=14">';
	}
			}
		}




		}
	}
}													
								
												}
											}
										}
									}

								}
							}
						}
					}
				}
			include 'product_form_default4_values.php';	
			}
		}
		else
		{
			include 'product_form_default.php';
		}
		?>         
        </div>
      </div>
    </div>
  </div>
</div>
</div>