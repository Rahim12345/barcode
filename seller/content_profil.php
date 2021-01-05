<?php
$name=$rows4Seller[0]["name"];
$password=$rows4Seller[0]["password"];
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
			echo '<meta http-equiv="refresh" content="1;url=index.php?id=2">';
		}
		include 'content_profil_default.php';
	}
}
else
{
	include 'content_profil_default.php';
}
?>