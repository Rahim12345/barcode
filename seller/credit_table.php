<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$mid=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
$myId=$_SESSION["id"];
$query4SeriaMid=$conn->prepare("SELECT * FROM creditdetails WHERE id=? AND sellerId=?");
$query4SeriaMid->execute([$mid,$myId]);
$rows4SeriaMid=$query4SeriaMid->fetchall(PDO::FETCH_ASSOC);
$count4SeriaMid=count($rows4SeriaMid);
if($count4SeriaMid==1)
{
	$query4BMk=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
	$query4BMk->execute([$mid,1]);
	$rows4BMk=$query4BMk->fetchall(PDO::FETCH_ASSOC);
	$count4BMk=count($rows4BMk);
	if($count4BMk!=0)
	{
		$bmkID=$rows4BMk[0]["id"];
		$x=strlen($bmkID);
		if($x==1)
		{
			$bmkID="00000".$bmkID;
		}
		elseif($x==2)
		{
			$bmkID="0000".$bmkID;
		}
		elseif($x==3)
		{
			$bmkID="000".$bmkID;
		}
		elseif($x==4)
		{
			$bmkID="00".$bmkID;
		}
		elseif($x==5)
		{
			$bmkID="0".$bmkID;
		}
	}
	else
	{
		$bmkID="";
	}
	include 'credit_table_content.php';
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