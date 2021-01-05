<?php  
include '../include/config.php';
$output='';
if(!empty($_POST["partnor"]) && !empty($_POST["proname"]) && !empty($_POST["modelname"]))
{

	$pNor 	=htmlspecialchars(trim($_POST["partnor"]));
	$pName 	=htmlspecialchars(trim($_POST["proname"]));
	$mName 	=htmlspecialchars(trim($_POST["modelname"]));

	$query4Fproducts=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=? AND selled=?");
	$query4Fproducts->execute([$pNor,$pName,$mName,0]);
	$rows4Fproducts=$query4Fproducts->fetchall(PDO::FETCH_ASSOC);
	$count4Fproducts=count($rows4Fproducts);
	if($count4Fproducts!=0)
	{
		$n=0;
		foreach($rows4Fproducts as $rows4Fproduct)
		{
			if($n==0)
			{
				$output.=$rows4Fproduct["credit"];
			}
			else
			{
				break;
			}
			$n++;
		}
	}
	else
	{
		// $output.=$pNor.'-'.$pName.'-'.$mName;
		$output.='';
	}
}
else
{
	$output='0';
}
print_r($output);
?>