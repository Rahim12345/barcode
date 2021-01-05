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
        <th scope="col" colspan="8" style="text-align: center;">Axtarılan zaman kəsiyi üzrə əmək haqqı hesabatı</th>
      </tr>
      <tr>
        <th scope="col">№</th>
        <th scope="col">İşçinin adı</th>
        <th scope="col">İş yeri</th>
        <th scope="col">Vəzifəsi</th>
        <th scope="col">Əmək haqqı</th>
        <th scope="col">Bonus</th>
        <th scope="col">Bayram pulu</th>
        <th scope="col">Tarix</th>
      </tr>
    </thead>
    <tbody style="background-color: white;">
<?php  
$query4Salary=$conn->prepare("SELECT * FROM salarytable WHERE id>?");
$query4Salary->execute([0]);
$rows4Salary=$query4Salary->fetchall(PDO::FETCH_ASSOC);
$count4Salary=count($rows4Salary);
if($count4Salary!=0)
{
  $n=1;
  foreach($rows4Salary as $row4Salary)
  {
    $sellerTime=$row4Salary["date"];
    $sellerTime=strtotime($sellerTime);
    if($start<=$sellerTime)
    {
      if($sellerTime<=$end)
      {
        $query4Workers=$conn->prepare("SELECT * FROM users WHERE id=?");
        $query4Workers->execute([$row4Salary["workerID"]]);
        $rows4Workers=$query4Workers->fetchall(PDO::FETCH_ASSOC);
        $count4Workers=count($rows4Workers);
        if($count4Workers!=0)
        {
          ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td><?php echo $rows4Workers[0]["name"]; ?></td>
      <td><?php echo $rows4Workers[0]["store"]; ?></td>
      <td><?php echo $rows4Workers[0]["status"]; ?></td>
      <td><?php echo $row4Salary["salary"]; ?></td>
      <td><?php echo $row4Salary["bonus"]; ?></td>
      <td><?php echo $row4Salary["priz"]; ?></td>
      <td><?php echo $row4Salary["date"]; ?></td>
    </tr>
          <?php
        }
      }
    }
    $n++;
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