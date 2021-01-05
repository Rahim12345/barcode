<?php
$qai="0";  
if(isset($_GET["id"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
  {
    if(isset($_POST["qaimeSearch"]))
    {
      $qaimeName=htmlspecialchars(trim($_POST["qaimeName"]));
      if(!empty($qaimeName))
      {
        $query4Qaime=$conn->prepare("SELECT * FROM products WHERE factura=?");
        $query4Qaime->execute([$qaimeName]);
        $rows4Qaime=$query4Qaime->fetchall(PDO::FETCH_ASSOC);
        $count4Qaime=count($rows4Qaime);
        if($count4Qaime==0)
        {
          $result=$qaimeName." adlı qaimə sistemdə yoxdur.";
          include 'qayime_default.php';
        }
        else
        {
          $qai="1";  
          $modelsArray=[];
          foreach($rows4Qaime as $row4Qaime)
          {
            if(!in_array($row4Qaime["model"], $modelsArray))
            {
              $modelsArray[]=$row4Qaime["model"];
            }
            else
            {
              continue;
            }
          }
          $result=$qaimeName." üzrə məhsullar";
          include 'qayime_default.php';
        }
      }
      else
      {
        include 'qayime_default.php';
      }
    }
    else
    {
      include 'qayime_default.php';
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