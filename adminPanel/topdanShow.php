<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		$myId=$_SESSION["id"];

		$query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE id=?");
		$query4Bmk->execute([$mid]);
		$rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
		$count4Bmk=count($rows4Bmk);
		if($count4Bmk!=0)
		{
			foreach($rows4Bmk as $row4Bmk)
			{
				$query4SeriaMid=$conn->prepare("SELECT * FROM topdan WHERE id=?");
				$query4SeriaMid->execute([$row4Bmk["bmkNo"]]);
				$rows4SeriaMid=$query4SeriaMid->fetchall(PDO::FETCH_ASSOC);
				$count4SeriaMid=count($rows4SeriaMid);
				if($count4SeriaMid==1)
				{
					include 'topdanShow_default.php';
				}
				else
				{
					include '404.html';
				}
			}
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
}
else
{
	include '404.html';
}
?>