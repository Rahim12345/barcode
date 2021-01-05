<?php  
include '../include/config.php';
if(!empty($_POST["searchY"]) && !empty($_POST["searchPa"]))
{
	$m=htmlspecialchars(trim($_POST["searchY"]));
	$Pa=htmlspecialchars(trim($_POST["searchPa"]));
	$query44FManu=$conn->prepare("SELECT * FROM products WHERE manufacturer LIKE ? AND partnor=? LIMIT 5");
	$query44FManu->execute(["%$m%",$Pa]);
	$rows44FManu=$query44FManu->fetchall(PDO::FETCH_ASSOC);
	$count44FManu=count($rows44FManu);
	$output='';
	if($count44FManu!=0)
	{
		$array=[];
		$n=0;
		foreach($rows44FManu as $row44FManu)
		{
			if(in_array($row44FManu["manufacturer"], $array))
			{
				continue;
			}
			else
			{
					$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44FManu["manufacturer"].'" class="btn btn-success btn-xs view_data_2">'.$row44FManu["manufacturer"].'</button>';
				// if($n==0)
				// {
				// 	// $output.="<p style='background-color:green;padding:5px;color:white;border-top-right-radius:10px;border-top-left-radius:10px;'>".$row44FManu["manufacturer"]."</p>";
				// }
				// elseif($n==($count44FManu-1))
				// {
				// 	$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44FManu["manufacturer"].'" class="btn btn-success btn-xs view_data_2">'.$row44FManu["manufacturer"].'</button><br/>';
				// 	// $output.="<p style='background-color:green;padding:5px;color:white;border-bottom-right-radius:10px;border-bottom-left-radius:10px;'>".$row44FManu["manufacturer"]."</p>";
				// }
				// else
				// {
				// 	$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44FManu["manufacturer"].'" class="btn btn-success btn-xs view_data_2">'.$row44FManu["manufacturer"].'</button><br/>';
				// 	// $output.="<p style='background-color:green;padding:5px;color:white;'>".$row44FManu["manufacturer"]."</p>";
				// }
			}
			$array[]=$row44FManu["manufacturer"];
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