<?php include 'include/config.php'; ?>
<!DOCTYPE html>
<html  class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>BARCODE</title>
	<meta name="description" content="BARCODE,barcode.az,Saatlı,Saatlı rayonu">
	<meta name="keywords" content="BARCODE,barcode.az,Saatlı,Saatlı rayonu">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Made with love by Rahim Süleymanov -->
	<!--Bootsrap 4 CDN-->
	<link rel="shortcut icon" type="image/x-icon" href="logo.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
</head>
<body style="background-color: #20142D;">
<div class="container" style="position: relative;top:100px;">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header" style="background-color: orange;color:white;">
				<h3>Daxil ol</h3>
			</div>
				<?php 
				if(isset($_POST["login"]))
				{
					$name=stripslashes(htmlspecialchars(trim($_POST["name"])));
					$password=stripslashes(htmlspecialchars(trim($_POST["password"])));
					if(empty($name) || empty($password))
					{
						include 'index_default.php';
					}
					else
					{
						$query4Users=$conn->prepare("SELECT * FROM users WHERE name=?");
						$query4Users->execute([$name]);
						$rows4Users=$query4Users->fetchall(PDO::FETCH_ASSOC);
						$count4Users=count($rows4Users);
						if($count4Users==0)
						{
							$error="Ad yanlışdır";
							include 'index_default.php';
						}
						else
						{
							foreach($rows4Users as $rows4User)
							{
								if($rows4User["password"]!=$password)
								{
									$error="şifrə yanlışdır";
								}
								else
								{
									ob_start();
									session_start();
									if($rows4User["doorKey"]==1)
									{
										$error="Mağaza bağlıdır!";
									}
									else
									{
										$_SESSION["id"]=$rows4User["id"];
										$_SESSION["doorKey"]=0;
										if($rows4User["status"]=="admin")
										{
											header("location:adminPanel/");
										}
										else
										{
											header("location:seller/");
										}
									}	
								}
							}
							include 'index_default.php';
						}
					}
				}
				else
				{
					include 'index_default.php';
				}
				?>
<div class="card-footer" style="background-color: orange;color:white;">
<div class="d-flex justify-content-center links" >
	BARCODE
</div>
</div>
</div>
</div>
</div>
</body>
</html>