<?php  
include '../include/config.php';
if(!empty($_POST["searchP"]))
{
	$p=htmlspecialchars(trim($_POST["searchP"]));
	$query44Partnor=$conn->prepare("SELECT * FROM partnyor WHERE name LIKE ? LIMIT 5");
	$query44Partnor->execute(["%$p%"]);
	$rows44Partnor=$query44Partnor->fetchall(PDO::FETCH_ASSOC);
	$count44Partnor=count($rows44Partnor);
	$output='';
	if($count44Partnor!=0)
	{
		// $output.= '<h4 align="center">Axtarış nəticəsi ('.$count44FManu.')</h4><br/>';
		$n=0;
		foreach($rows44Partnor as $row44Partnor)
		{
			if($n==0)
			{
				$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44Partnor["name"].'" class="btn btn-success btn-xs view_data">'.$row44Partnor["name"].'</button>';
				// $output.="<p style='background-color:green;padding:5px;color:white;border-top-right-radius:10px;border-top-left-radius:10px;'>".$row44Partnor["name"]."</p>";
			}
			elseif($n==($count44Partnor-1))
			{
				$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44Partnor["name"].'" class="btn btn-success btn-xs view_data">'.$row44Partnor["name"].'</button>';
				// $output.="<p style='background-color:green;padding:5px;color:white;border-bottom-right-radius:10px;border-bottom-left-radius:10px;'>".$row44Partnor["name"]."</p>";
			}
			else
			{
				$output.='<button style="width:100%;margin-bottom:10px;" type="button" name="view" id="'.$row44Partnor["name"].'" class="btn btn-success btn-xs view_data">'.$row44Partnor["name"].'</button>';
				// $output.="<p style='background-color:green;padding:5px;color:white;'>".$row44Partnor["name"]."</p>";
			}

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