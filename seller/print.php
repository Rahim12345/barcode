<?php  

?>
<!DOCTYPE html>
<html>
<head>
	<title>Satıcı</title>
</head>
<body>
<div id="main">
	<div id="print" style="margin-left: 10%;margin-right: 10%;">
		<form action="" onsubmit="return false">
		<input type="text" placeholder="Ad,Soyad,Ata" style="border:none;border-bottom:1px solid black;width: 100%;line-height: 40px;padding-left: 10px;"><br><br>
		<input type="text" placeholder="Məhsulun adı" style="border:none;border-bottom:1px solid black;width: 100%;line-height: 40px;padding-left: 10px;"><br><br>
		Satıcı:<input type="text" placeholder="Ali Əliyev" style="border:none;border-bottom:1px solid black;width: 100%;line-height: 40px;padding-left: 10px;"><br><br>
		<button onclick="prinT()" id="button" style="position: relative;float: right;padding: 5px;">Çap et</button>
		</form>
	</div>
	<br><br>
	<p style="padding: 20px;text-align: center;" id="link">
		<a href="./" style="text-decoration: none;font-size: 3vh;">Ana səhifə</a>
	</p>
</div>
</body>
<script type="text/javascript">
	function prinT()
	{
		var x=document.getElementById("#print");
		var btn=document.getElementById("button").style.display="none";
		var link=document.getElementById("link").style.display="none";
		print(x);
		document.getElementById("button").style.display="block";
		document.getElementById("link").style.display="block";
	}
</script>
</html>