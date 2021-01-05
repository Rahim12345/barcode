<?php  
if(isset($_GET["id"]) && isset($_GET["mid"]))
{ 
	$id 	=htmlspecialchars(trim($_GET["id"]));
	$mid 	=htmlspecialchars(trim($_GET["mid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $id>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
	{
		echo '<meta http-equiv="refresh" content="0;url=index.php?id=4&mid='.$mid.'">';
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