<?php  
if(isset($_POST["partnorAccount"]))
{
  $start    =htmlspecialchars(trim($_POST["start"]));
  $finish   =htmlspecialchars(trim($_POST["finish"]));
  $a        =0;
  $b        =0;
  $c        =0;
  if(empty($start) || empty($finish))
  {
    $error="Hər iki xananı doldurun";
  }
  else
  {
    $startSec   =strtotime($start);
    $finishSec  =strtotime($finish);
    $today      =strtotime(date("d.m.Y"));
    if($startSec>=$finishSec)
    {
      $error="Doğru zaman aralığı daxil edin";
    }
    else
    {
      if($finishSec>$today)
      {
        $error="Gələcək haqqında hesabat verə bilmərik";
      }
      else
      {
        $query4Salary=$conn->prepare("SELECT * FROM salarytable WHERE id>?");
        $query4Salary->execute([0]);
        $rows4Salary=$query4Salary->fetchall(PDO::FETCH_ASSOC);
        $count4Salary=count($rows4Salary);
        if($count4Salary!=0)
        {
          foreach($rows4Salary as $row4Salary)
          {
            $memoryDate=strtotime($row4Salary["date"]);
            if($startSec<=$memoryDate && $memoryDate<=$finishSec)
            {
              $a+=$row4Salary["salary"];
              $b+=$row4Salary["bonus"];
              $c+=$row4Salary["priz"];
            }
          }
          // echo "Nəticə:".$a;
          ?>
          <div class="card-body">
           <table class="table table-light " style="width: 100%;font-size: 2vh;color: black;">
            <thead class="bg-success" style="color:white;">
              <tr>
                <th scope="col" colspan="2" style="text-align: center;">Axtarılan zaman aralığında əmək haqqı hesabatı</th>
              </tr>
            </thead>
            <tbody style="background-color: white;">
              <tr>
               <td>Əmək haqqı :</td>
               <td><?php echo $a." AZN" ?></td>
             </tr>
             <tr>
               <td>Bonus:</td>
               <td><?php echo $b." AZN" ?></td>
             </tr>
             <tr>
               <td>Bayram pulu :</td>
               <td><?php echo $c." AZN" ?></td>
             </tr>
             <tr>
               <td>Siyahıya :</td>
               <td><a href="index.php?id=53&start=<?php echo $startSec ?>&end=<?php echo $finishSec ?>" target="_blank" class="btn btn-info">Bax</a></td>
             </tr>
            </tbody>
          </table>      
          </div>
                <?php
        }
      }
    }
  }
  include 'salary_val.php';
}
else
{
  include 'salary_default.php';
}
?>