<?php  
if(isset($_GET["id"]) && isset($_GET["start"]) && isset($_GET["end"]))
{
  $id     =htmlspecialchars(trim($_GET["id"]));
  $start  =htmlspecialchars(trim($_GET["start"]));
  $end    =htmlspecialchars(trim($_GET["end"]));
  $today  =strtotime(date("d.m.Y"));
  if(is_numeric($id) && ceil($id)-$id==0 && $id>0 && is_numeric($start) && $start>1420056000 && is_numeric($end) && $end>1420056000 && $start<=$end && $start<=$today && $end<=$today)
  {
    ?>
    <div class="card-body">
    <table class="table table-stripped" id="dataTable" width="100%" style="font-size: 1.8vh;color:black;" cellspacing="0">
    <thead class="bg-success" style="color:white;">
      <tr>
        <th scope="col" colspan="5" style="text-align: center;">Axtarılan zaman kəsiyi üzrə kredit hesabatı</th>
      </tr>
      <tr>
        <th scope="col">Müqavilə №</th>
        <th scope="col">Müstəri adı</th>
        <th scope="col">Aldığı məhsullar</th>
        <th scope="col">Qalıq borc</th>
        <th scope="col">Satış tarixi</th>
      </tr>
    </thead>
    <tbody style="background-color: white;">
<?php  
$query4Credits=$conn->prepare("SELECT * FROM creditdetails WHERE id>?");
$query4Credits->execute([0]);
$rows4Credits=$query4Credits->fetchall(PDO::FETCH_ASSOC);
$count4Credits=count($rows4Credits);
if($count4Credits!=0)
{
  foreach($rows4Credits as $rows4Credit)
  {
    if($rows4Credit["productDetails"]!="")
    {
      $sellerTime=$rows4Credit["sellerTime"];
      $sellerTime=strtotime($sellerTime);
      if($start<=$sellerTime)
      {
        if($sellerTime<=$end)
        {
          $id=$rows4Credit["id"];
          $query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
          $query4Bmk->execute([$id,1]);
          $rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
          $count4Bmk=count($rows4Bmk);
          if($count4Bmk!=0)
          {
            foreach($rows4Bmk as $row4Bmk)
            {
              ?>
      <tr>
        <td>
          <?php  
          $bmk=$row4Bmk["id"];
          include 'bmkFunction.php';
          echo $bmk;
          ?>
        </td>
              <?php  
            }
          }
              ?>
        <td>
          <?php echo $rows4Credit["name"] ?>
        </td>
        <td>
          <?php 
          $productDetails=$rows4Credit["productDetails"];
          include 'openDetails.php';
          echo $satılan_malın_adı_qiymetile;
          ?>
        </td>
        <td>
          <?php  
          $ss=$rows4Credit["remindMoney"]-$rows4Credit["amountPaid"];
          echo $ss." man";
          ?>
        </td>
        <td>
          <?php  
          echo $rows4Credit["sellerTime"];
          ?>
        </td>
      </tr>
            <?php
        }
      }
    }
  }
}
?>
    </tbody>
    </table>      
    </div>
    <?php
  }
  else
  {
    include '404.html';
  }
}
else
{
  include '404.html';
}
?>