<?php  
include '../include/config.php';
$output='';
if(!empty($_POST["partnor"]) && !empty($_POST["proname"]) && !empty($_POST["modelname"]))
{
	$pNor 	=htmlspecialchars(trim($_POST["partnor"]));
	$pName 	=htmlspecialchars(trim($_POST["proname"]));
	$mName 	=htmlspecialchars(trim($_POST["modelname"]));
	$query4Seria=$conn->prepare("SELECT * FROM products WHERE partnor=? AND manufacturer=? AND model=? AND selled=?");
	$query4Seria->execute([$pNor,$pName,$mName,0]);
	$rows4Seria=$query4Seria->fetchall(PDO::FETCH_ASSOC);
	$count4Seria=count($rows4Seria);
	$output='';
	$seriasArray=[];
	$sumRemind=0;
		$output.=$pNor."-".$pName."-".$mName;
	if($count4Seria!=0)
	{
		foreach($rows4Seria as $row4Seria)
		{
			if($row4Seria["seria"]=="")
			{
				$sertS=0;
				$sumRemind+=$row4Seria["dimension"];
			}
			else
			{
				$sertS=1;
				$seriasArray[]=$row4Seria["seria"];
			}
		}
		if($sertS==0)
		{
			$output='<option value="">'.$mName.' üçün ölçü seçin</option>';
			for($i=1;$i<=$sumRemind;$i++)
			{
				$output.='<option value="'.$i.'">'.$i.'</option>';
			}
		}
		else
		{
			$output='<option value="">'.$mName.' üçün seria seçin</option>';
			foreach($seriasArray as $seria)
			{
				$output.='<option value="'.$seria.'">'.$seria.'</option>';
			}
		}
	}
	else
	{
		$output.='<option value="">'.$mName.' model məhsuldan tapılmadı</option>';
		// $output.=$pNor."-".$pName."-".$mName;
	}
}
else
{
	$output='<option value="">Xanaları boş saxlama</option>';
}
echo $output;
?>