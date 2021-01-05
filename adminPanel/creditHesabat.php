<?php  
if(isset($_POST["partnorAccount"]))
{
  $start    =htmlspecialchars(trim($_POST["start"]));
  $finish   =htmlspecialchars(trim($_POST["finish"]));
  $a        =0;
  $b        =0;
  $m        =0;
  if(empty($start) || empty($finish))
  {
    $error="Hər iki xananı doldurun";
  }
  else
  {
    $startSec   =strtotime($start);
    $finishSec  =strtotime($finish);
    $today      =strtotime(date("d.m.Y"));
    if($startSec>$finishSec)
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
        $query4Credits=$conn->prepare("SELECT productDetails,sellerTime FROM creditdetails WHERE id>?");
        $query4Credits->execute([0]);
        $rows4Credits=$query4Credits->fetchall(PDO::FETCH_ASSOC);
        $count4Credits=count($rows4Credits);
        if($count4Credits!=0)
        {
          $m1=0;
          $m2=0;
          foreach($rows4Credits as $rows4Credit)
          {
            if($rows4Credit["productDetails"]!="")
            {
              $sellerTime=$rows4Credit["sellerTime"];
              $sellerTime=strtotime($sellerTime);
              if($startSec<=$sellerTime)
              {
                if($sellerTime<=$finishSec)
                {
                  $s=$rows4Credit["productDetails"];
                  $s=explode("||", $s);
                  if($s[0]!="")
                  {
                    $s1=explode("**", $s[0]);
                    // echo $s1[1]."<br/>";
                    $m1+=$s1[1];
                  }

                  if($s[1]!="")
                  {
                    $s2=explode("**", $s[1]);
                    // echo $s2[3]*$s2[4]."<br/>";
                    $m2+=$s2[4];
                  }
                }
              }
            }
          }
          $m=$m1+$m2;
        }


          ?>
    <div class="card-body">
     <table class="table table-light " style="width: 100%;font-size: 2vh;color: black;">
      <thead class="bg-success" style="color:white;">
        <tr>
          <th scope="col" colspan="2" style="text-align: center;">Axtarılan zaman kəsiyi üzrə kredit hesabatı</th>
        </tr>
        <tr>
          <th scope="col">Satılan məhsullar(AZN)</th>
          <th scope="col">Satılan məhsulların siyahısı</th>
        </tr>
      </thead>
      <tbody style="background-color: white;">
        <tr>
          <td><?php echo $m." man" ?></td>
          <td><a href="index.php?id=51&start=<?php echo $startSec ?>&end=<?php echo $finishSec ?>" target="_blank" class="btn btn-info">Siyahıya bax</a></td>
        </tr>
      </tbody>
    </table>      
    </div>
          <?php
      }
    }
  }
  include 'creditHesabat_val.php';
}
else
{
  include 'creditHesabat_default.php';
}
?>