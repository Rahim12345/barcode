<?php  
if(isset($_POST["partnorAccount"]))
{
  $start    =htmlspecialchars(trim($_POST["start"]));
  $finish   =htmlspecialchars(trim($_POST["finish"]));
  $partnor  =htmlspecialchars(trim($_POST["partnor"]));
  $a        =0;
  $b        =0;
  if(empty($start) || empty($finish) || empty($partnor))
  {
    $error="Hər üç xananı doldurun";
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
        $query4partnor=$conn->prepare("SELECT * FROM partnyor WHERE id=?");
        $query4partnor->execute([$partnor]);
        $rows4partnor=$query4partnor->fetchall(PDO::FETCH_ASSOC);
        $count4partnor=count($rows4partnor);
        if($count4partnor!=0)
        {
          $query4partnorMoney=$conn->prepare("SELECT * FROM partnormoney WHERE partnyorID=?");
          $query4partnorMoney->execute([$partnor]);
          $rows4partnorMoney=$query4partnorMoney->fetchall(PDO::FETCH_ASSOC);
          $count4partnorMoney=count($rows4partnorMoney);
          if($count4partnorMoney!=0)
          {
            foreach($rows4partnorMoney as $row4partnorMoney)
            {
              $memoryDate=strtotime($row4partnorMoney["date"]);
              if($startSec<=$memoryDate && $memoryDate<=$finishSec)
              {
                $a+=$row4partnorMoney["money"];
              }
            }
            // echo "Nəticə:".$a;
          }


          // echo $rows4partnor[0]["name"];
          // Topdan məhsul hesabatı
          $query4WareHouse=$conn->prepare("SELECT SUM(wholesale)  FROM products WHERE partnor=? AND seria!=?");
          $query4WareHouse->execute([$rows4partnor[0]["name"],""]);
          $rows4WareHouse=$query4WareHouse->fetchall(PDO::FETCH_ASSOC);

          $query4Seriasiz=$conn->prepare("SELECT SUM(wholesale*memoryDimension)  FROM products WHERE partnor=? AND seria=?");
          $query4Seriasiz->execute([$rows4partnor[0]["name"],""]);
          $rows4Seriasiz=$query4Seriasiz->fetchall(PDO::FETCH_ASSOC);

          $topdan=0; 
          $seriali  = $rows4WareHouse[0]['SUM(wholesale)'];
          $seriasiz = $rows4Seriasiz[0]['SUM(wholesale*memoryDimension)'];
          if($seriali=="")
          {
            $seriali=0;
          }

          if($seriasiz=="")
          {
            $seriasiz=0;
          }
          $topdan=$seriali+$seriasiz;

          // $query4partnorProducts=$conn->prepare("SELECT * FROM products WHERE partnor=?");
          // $query4partnorProducts->execute([$rows4partnor[0]["name"]]);
          // $rows4partnorProducts=$query4partnorProducts->fetchall(PDO::FETCH_ASSOC);
          // $count4partnorProducts=count($rows4partnorProducts);
          // if($count4partnorProducts!=0)
          // {
          //   foreach($rows4partnorProducts as $rows4partnorProduct)
          //   {
          //     $memoryDate2=strtotime($rows4partnorProduct["productDate"]);
          //     if($startSec<=$memoryDate2 && $memoryDate2<=$finishSec)
          //     {
          //       if($rows4partnorProduct["seria"]!="")
          //       {
          //         $b+=$rows4partnorProduct["wholesale"];
          //       }
          //       else
          //       {
          //         $b+=$rows4partnorProduct["memoryDimension"]*$rows4partnorProduct["wholesale"];
          //       }
          //     }              
          //   }
          // }

          ?>
    <div class="card-body">
     <table class="table table-light " style="width: 100%;font-size: 2vh;color: black;">
      <thead class="bg-success" style="color:white;">
        <tr>
          <th scope="col" colspan="2" style="text-align: center;"><?php echo $rows4partnor[0]["name"]." üzrə hesabat" ?></th>
        </tr>
      </thead>
      <tbody style="background-color: white;">
        <tr>
         <td>Alınan məhsulların dəyəri :</td>
         <td><?php echo $topdan.' AZN'; ?></td>
       </tr>
       <tr>
         <td>Ödəniş:</td>
         <td><?php echo $a." AZN" ?></td>
       </tr>
       <tr>
         <td>Borc :</td>
         <td><?php $x=$topdan-$a; echo $x." AZN" ?></td>
       </tr>
      </tbody>
    </table>      
    </div>
          <?php
        }
      }
    }
  }
  include 'accountPartnor_val.php';
}
else
{
  include 'accountPartnor_default.php';
}
?>