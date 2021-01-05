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
		$dim=[];
		$price=[];
		foreach($rows4Fproducts as $rows4Fproduct)
		{
			if($rows4Fproduct["dimension"]=="")
			{
				$output=$rows4Fproduct["credit"];
				break;
			}
			else
			{
				$dim[]=$rows4Fproduct["dimension"];
				$price[]=$rows4Fproduct["credit"];
			}
		}

		for($i=0;$i<count($dim);$i++)
		{
			if(count($dim)==1)
			{
				$output.=$price[0];
			}
			else
			{
				if($i!=count($dim)-1)
				{
					$output.=$dim[$i]."(vahid) - ".$price[$i]." AZN;";
				}
				else
				{
					$output.=$dim[$i]."(vahid) - ".$price[$i]." AZN";
				}
			}
		}
	}
	else
	{
		$output.='';
	}
}
else
{
	$output='0';
}
print_r($output);
?>