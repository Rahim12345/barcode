<?php
if(isset($_GET["id"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    if(isset($_POST["qebzSearch"]))
    {
      $qebzNomre=htmlspecialchars(trim($_POST["qebzNomre"]));
      if(!empty($qebzNomre))
      {
        $query4Qebz=$conn->prepare("SELECT * FROM qebz WHERE nomre=?");
        $query4Qebz->execute([$qebzNomre]);
        $rows4Qebz=$query4Qebz->fetchall(PDO::FETCH_ASSOC);
        $qebzCount=count($rows4Qebz);
        if($qebzCount==0)
        {
          $resultQebz="<u>".$qebzNomre."</u> nömrəli qəbz tapılmadı";
          include 'qebzExist_default.php';
        }
        else
        {
          include 'qebzShow.php';
        }
      }
      else
      {
        include 'qebzExist_default.php';
      }
    }
    else
    {
      include 'qebzExist_default.php';
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