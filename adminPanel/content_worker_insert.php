<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">İşçi əlavə et</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card shadow mb-4">
        <div class="card-body">
		<?php  
		if(isset($_POST["workerAdd"]))
		{
			$store=htmlspecialchars(trim($_POST["store"]));
			$job=htmlspecialchars(trim($_POST["job"]));
			$name=htmlspecialchars(trim($_POST["name"]));
			$password=htmlspecialchars(trim($_POST["password"]));
			if(empty($store) || empty($job) || empty($name) || empty($password))
			{
				include 'worker_form_default4_values.php';
			}
			else
			{
				if(strlen($name)>50)
				{
					$error4worker="Ad üçün maksimum 50 simvol daxil edin";
				}
				else
				{
					if(strlen($password)>50 || strlen($password)<8)
					{
						$error4worker="8-40 simvoldan ibarət bir şifrə";
					}
					else
					{
$query4existUser=$conn->prepare("SELECT * FROM users WHERE name=?");
$query4existUser->execute([$name]);
$rows4existUser=$query4existUser->fetchall(PDO::FETCH_ASSOC);
$count4existUser=count($rows4existUser);
if($count4existUser==1)
{
	$error4worker=$name." istifadəçi artıq mövcuddur";
}
else
{
	$savenewUser=$conn->prepare("INSERT INTO users(name,password,store,status) VALUES (?,?,?,?)");
	$savenewUser->execute([$name,$password,$store,$job]);
	$error4worker=$name." daxil edildi";
}
					}
				}
			include 'worker_form_default4_values.php';	
			}
		}
		else
		{
			include 'worker_form_default.php';
		}
		?>         
        </div>
      </div>
    </div>
  </div>
</div>
</div>