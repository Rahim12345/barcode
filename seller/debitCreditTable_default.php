<?php 
$zamiN1=explode("**", $rows4SeriaMid[0]["zamin1"]); 
$zamiN2=explode("**", $rows4SeriaMid[0]["zamin2"]); 
for($i=0;$i<13;$i++)
{
  if($i>count($zamiN1)-1)
  {
    $zamiN1[$i]="";
  }
}
for($j=0;$j<13;$j++)
{
  if($j>count($zamiN2)-1)
  {
    $zamiN2[$j]="";
  }
}
$debitFin=$rows4SeriaMid[0]["fin"];

$productDetails=$rows4SeriaMid[0]["productDetails"];

$query4DebitFin=$conn->prepare("SELECT * FROM regular WHERE Pincode=?");
$query4DebitFin->execute([$debitFin]);
$rows4DebitFin=$query4DebitFin->fetchall(PDO::FETCH_ASSOC);

include 'openDetails.php';
include 'silSpan.php';
?>
<div class="mb-4" style="font-size: 10px;">
  <div class="py-3">
    <table class="table table-striped" style="width: 100%;color:black;page-break-before: always;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">№</th>
          <th scope="col">Aylar</th>
          <th scope="col">Ödəniləcək məbləğ(AZN)</th>
          <th scope="col">Qalıq məbləğ(AZN)</th>
        </tr>
      </thead>
      <tbody class="tbody-light">
        <?php  
        $Creditmonths=explode(",", $rows4SeriaMid[0]["creditTable"]);
        $n=0;
          foreach($Creditmonths as $Creditmonth)
          {
            ?>
            <tr>
              <td><?php echo $n+1; ?></td>
              <td><?php echo $Creditmonth; ?></td>
              <td>
                <?php
                if($rows4SeriaMid[0]["avaragePay"]!=0)
                {
                  $qaY=($rows4SeriaMid[0]["amountPaid"]/$rows4SeriaMid[0]["avaragePay"]);
                  $ayN=floor($rows4SeriaMid[0]["amountPaid"]/$rows4SeriaMid[0]["avaragePay"]);
                  $ayNN=ceil($rows4SeriaMid[0]["amountPaid"]/$rows4SeriaMid[0]["avaragePay"]);
                  $qaY=$qaY-$ayN;
                  $qaY=$qaY*$rows4SeriaMid[0]["avaragePay"];
                  $qaY=$rows4SeriaMid[0]["avaragePay"]-$qaY;
                  if($n<$ayN)
                  {
                    echo "ödənilib";
                  }
                  elseif($n==$ayNN-1)
                  {
                    echo ceil($qaY);
                  }
                  else
                  {
                    echo round($rows4SeriaMid[0]["avaragePay"],2);
                  } 
                }
                ?>
                </td>
              <td><?php echo round($rows4SeriaMid[0]["remindMoney"],2)-round($n*$rows4SeriaMid[0]["avaragePay"],2); ?></td>
            </tr>
            <?php
            $n++;
          }
        ?>
        <tr style="background-color: #5A5C69;color:black;font-weight:bold;border-bottom: 3px solid black;">
          <td colspan="3">Qalıq borc&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo $rows4SeriaMid[0]["remindMoney"]-$rows4SeriaMid[0]["amountPaid"]; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>