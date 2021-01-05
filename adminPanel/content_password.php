<?php
if(isset($_GET["id"]) && isset($_GET["uid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$uid=htmlspecialchars(trim($_GET["uid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $id>0 && is_numeric($uid) && ceil($uid)-$uid==0 && $uid>0)
	{
		$query4Pass=$conn->prepare("SELECT * FROM users WHERE id=?");
		$query4Pass->execute([$uid]);
		$rows4Pass=$query4Pass->fetchall(PDO::FETCH_ASSOC);
		$count4Pass=count($rows4Pass);
		if($count4Pass==1)
		{
$name=$rows4Pass[0]["name"];
$password=$rows4Pass[0]["password"];
if(isset($_POST["profilUpdate"]))
{
	$password=htmlspecialchars(trim($_POST["passwordUpdate"]));
	if(empty($password))
	{
		$errorUpdateProfil="Lütfən şifrənizi daxil edin";
		include 'content_profil_default.php';
	}
	else
	{
		if(strlen($password)<8 || strlen($password)>51)
		{
			$errorUpdateProfil="8-50 simvoldan ibarət bir şifrə";
		}
		else
		{
			$query4update=$conn->prepare("UPDATE `users` SET `password`=? WHERE `name`=?");
			$query4update->execute([$password,$name]);
			$errorUpdateProfil="Uğurla yeniləndi";
			echo '<meta http-equiv="refresh" content="1;url=index.php?id=21&uid='.$uid.'">';
		}
		include 'content_password_default.php';
	}
}
else
{
	include 'content_password_default.php';
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