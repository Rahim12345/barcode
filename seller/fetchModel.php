<?php  
include '../include/config.php';
if(!empty($_POST["search"]) && !empty($_POST["pn"]) && !empty($_POST["mn"]))
{
	$r=htmlspecialchars(trim($_POST["search"]));
	$Partnor=htmlspecialchars(trim($_POST["pn"]));
	$manu=htmlspecialchars(trim($_POST["mn"]));
	$query44Fproducts=$conn->prepare("SELECT * FROM products WHERE model LIKE ? AND partnor=? AND manufacturer=? LIMIT 5");
	$query44Fproducts->execute(["%$r%",$Partnor,$manu]);
	$rows44Fproducts=$query44Fproducts->fetchall(PDO::FETCH_ASSOC);
	$count44Fproducts=count($rows44Fproducts);
	$output='';
	if($count44Fproducts!=0)
	{
		$n=0;
		$array=[];
		// $output.= '<h4 align="center">Axtarış nəticəsi ('.$count44Fproducts.')</h4><br/>';
		foreach($rows44Fproducts as $rows44Fproduct)
		{
			if(in_array($rows44Fproduct["model"], $array))
			{
				continue;
			}
			else
			{
				$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$rows44Fproduct["model"].'" class="btn btn-success btn-xs view_data_3">'.$rows44Fproduct["model"].'</button>';
			}
			$array[]=$rows44Fproduct["model"];
			$n++;
		}
	}
	else
	{
		$output.="Tapılmadı";
	}
	echo $output;
}
else
{

}
?>