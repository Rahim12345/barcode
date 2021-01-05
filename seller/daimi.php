<?php
if(isset($_GET["id"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
$query4SellerDebbe=$conn->prepare("SELECT * FROM debbe WHERE id>?");
$query4SellerDebbe->execute([0]);
$rows4SellerDebbe=$query4SellerDebbe->fetchall(PDO::FETCH_ASSOC);
$count4SellerDebbe=count($rows4SellerDebbe);
if($count4SellerDebbe==0)
{
echo '<br/><br/><br/><br/><br/><font style="color:green;padding-left:20px;background-color:orange;padding:15px;color:white;font-weight:bold;border-radius:none;border-top-left-radius:20px;border-bottom-right-radius:20px;margin-left: 250px;">Dükan sahibinə "Dəbbənin" daxil edilmədiyi barədə məlumat verin.</font>';
}
else
{
if(isset($_POST["daimi"]) && !empty(htmlspecialchars(trim($_POST["daimiName"]))))
{
$daimiName=htmlspecialchars(trim($_POST["daimiName"]));
$query4daimi=$conn->prepare("SELECT * FROM regular WHERE Pincode=?");
$query4daimi->execute([$daimiName]);
$rows4daimi=$query4daimi->fetchall(PDO::FETCH_ASSOC);
$count4daimi=count($rows4daimi);
if($count4daimi==0)
{
  $daimiErr="Belə müstəri bazada tapılmadı";
  include 'daimi_default.php';
}
else
{
$idR=$rows4daimi[0]["id"];
header("Location:index.php?id=18&rid=$idR");
ob_end_flush();
}
}
else
{
include 'daimi_default.php';
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
  include 'header.php';
  include '404.html';
  include 'footer.php';
}
?>