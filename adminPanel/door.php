<?php  
if(isset($_GET["id"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	if(is_numeric($id) && ceil($id)-$id==0)
	{
		$query4Key=$conn->prepare("SELECT * FROM users WHERE id>? AND status!=?");
		$query4Key->execute([0,"admin"]);
		$rows4Key=$query4Key->fetchall(PDO::FETCH_ASSOC);
		$count4Key=count($rows4Key);
		if($count4Key!=0)
		{
			foreach($rows4Key as $row4Key)
			{
				if($row4Key["doorKey"]==0)
				{
					$Update4Key=$conn->prepare("UPDATE `users` SET `doorKey`=? WHERE id=?");
					$Update4Key->execute([1,$row4Key["id"]]);
				}
				else
				{
					$Update4Key=$conn->prepare("UPDATE `users` SET `doorKey`=? WHERE id=?");
					$Update4Key->execute([0,$row4Key["id"]]);
				}
			}
		}
		else
		{
			
		}
header("Location:index.php");
ob_end_flush();
	}
	else
	{
		include '404.html';
	}
}
else
{
	include '404.html';
}
?>