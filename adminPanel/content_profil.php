<?php
$name=$rows4Admin[0]["name"];
$password=$rows4Admin[0]["password"];
if(isset($_POST["profilUpdate"]))
{
	$name=htmlspecialchars(trim($_POST["nameUpdate"]));
	$password=htmlspecialchars(trim($_POST["passwordUpdate"]));
	if(empty($name) || empty($password))
	{
		$errorUpdateProfil="Lütfən boş xana buraxmayın";
		include 'content_profil_default.php';
	}
	else
	{
		if(strlen($name)>50)
		{
			$errorUpdateProfil="Ad üçün maksimum 50 simvol daxil edə bilərsiniz";
		}
		else
		{
			if(strlen($password)<8 || strlen($password)>51)
			{
				$errorUpdateProfil="8-50 simvoldan ibarət bir şifrə";
			}
			else
			{
				$query4Usersexist=$conn->prepare("SELECT * FROM users WHERE name=? AND status!=?");
				$query4Usersexist->execute([$name,"admin"]);
				$rows4Usersexist=$query4Usersexist->fetchall(PDO::FETCH_ASSOC);
				$count4Usersexist=count($rows4Usersexist);
				if($count4Usersexist==1)
				{
					$errorUpdateProfil=$name." adı artıq sistemdə mövcuddur";
				}
				else
				{
					$query4update=$conn->prepare("UPDATE `users` SET `name`=?,`password`=? WHERE `status`=?");
					$query4update->execute([$name,$password,"admin"]);
					$errorUpdateProfil="Uğurla yeniləndi";
					echo '<meta http-equiv="refresh" content="1;url=index.php?id=9">';
				}
			}
		}
		include 'content_profil_default.php';
	}
}
else
{
	include 'content_profil_default.php';
}
?>