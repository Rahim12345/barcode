<?php
if(isset($_GET["id"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    $count4Seria=0;
    if(isset($_POST["seriaBtn"]))
    {
      $seriaNomre=htmlspecialchars(trim($_POST["seriaNomre"]));
      if(!empty($seriaNomre))
      {
        $query4Seria=$conn->prepare("SELECT * FROM products WHERE seria=? AND selled=?");
        $query4Seria->execute([$seriaNomre,0]);
        $rows4Seria=$query4Seria->fetchall(PDO::FETCH_ASSOC);
        $count4Seria=count($rows4Seria);
        if($count4Seria==0)
        {
          $result=$seriaNomre." serialı məhsul sistemdə yoxdur.";
          include 'seriaShare_default.php';
        }
        else
        {
          include 'seriaShare_default.php';
        }
      }
      else
      {
        include 'seriaShare_default.php';
      }
    }
    else
    {
      include 'seriaShare_default.php';
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