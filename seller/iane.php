<?php
if(isset($_GET["id"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    if(isset($_POST["iane"]))
    {
      $ianeN=htmlspecialchars(trim($_POST["ianeN"]));
      $query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE id=?");
      $query4Bmk->execute([$ianeN]);
      $rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
      $count4Bmk=count($rows4Bmk);
      if($count4Bmk==0)
      {
        $ianeErr="Belə bir müqavilə tapılmadı";
      }
      else
      {
$bmkNo      = $rows4Bmk[0]["bmkNo"];
$sellStyle  = $rows4Bmk[0]["sellStyle"];
if($sellStyle==1)
{
header("Location:index.php?id=36&mid=$bmkNo");
ob_end_flush();
}
elseif($sellStyle==2)
{
header("Location:index.php?id=37&mid=$bmkNo");
ob_end_flush();
}
else
{
header("Location:index.php?id=38&mid=$bmkNo");
ob_end_flush();
}
      }
      include 'iane_default.php';
    }
    else
    {
      include 'iane_default.php';
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