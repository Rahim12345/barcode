<?php  
// ini_set("memory_limit","4096M");
$toDay=date("d.m.Y");
$d24=24*60*60;
$d30=30*24*60*60;
$d24Psum=0;
$d30Psum=0;
$query4TodayPro=$conn->prepare("SELECT * FROM selledproducts WHERE id>?");
$query4TodayPro->execute([0]);
$rows4TodayPro=$query4TodayPro->fetchall(PDO::FETCH_ASSOC);
$count4TodayPro=count($rows4TodayPro);
if($count4TodayPro==0)
{
  $d24Psum=0;
  $d30Psum=0;
}
else
{
  foreach($rows4TodayPro as $row4TodayPro)
  {
    $difTime=strtotime($toDay)-strtotime($row4TodayPro["date"]);
    if($difTime<=$d24)
    {
      $d24Psum+=$row4TodayPro["price"];
    }
    if($difTime<=$d30)
    {
      $d30Psum+=$row4TodayPro["price"];

    }
  }
}

$remindMoney=0;
$amountPaid=0;
$credit=0;
$query4Credit=$conn->prepare("SELECT * FROM creditdetails WHERE id>?");
$query4Credit->execute([0]);
$rows4Credit=$query4Credit->fetchall(PDO::FETCH_ASSOC);
$count4Credit=count($rows4Credit);
if($count4Credit!=0)
{
  foreach($rows4Credit as $row4Credit)
  {
    if($row4Credit["amountPaid"]<$row4Credit["remindMoney"])
    {
      $remindMoney += $row4Credit["remindMoney"];
      $amountPaid  += $row4Credit["amountPaid"];
    }
  }
  $credit =$remindMoney-$amountPaid;
}

$nagdGozlenti=0;
$query4Nagd=$conn->prepare("SELECT * FROM cash WHERE rasot=?");
$query4Nagd->execute([1]);
$rows4Nagd=$query4Nagd->fetchall(PDO::FETCH_ASSOC);
$count4Nagd=count($rows4Nagd);
if($count4Nagd!=0)
{
  foreach($rows4Nagd as $row4Nagd)
  {
    $nagdGozlenti+=$row4Nagd["price"];
  }
  $credit =$remindMoney-$amountPaid;
}


// Topdan məhsul hesabatı
$query4WareHouse=$conn->prepare("SELECT SUM(wholesale)  FROM products WHERE selled=? AND seria!=?");
$query4WareHouse->execute([0,""]);
$rows4WareHouse=$query4WareHouse->fetchall(PDO::FETCH_ASSOC);

$query4Seriasiz=$conn->prepare("SELECT SUM(wholesale*dimension)  FROM products WHERE selled=? AND seria=?");
$query4Seriasiz->execute([0,""]);
$rows4Seriasiz=$query4Seriasiz->fetchall(PDO::FETCH_ASSOC);

// Nağd məhsul hesabatı

$query4Ssatis=$conn->prepare("SELECT SUM(selling)  FROM products WHERE selled=? AND seria!=?");
$query4Ssatis->execute([0,""]);
$rows4Ssatis=$query4Ssatis->fetchall(PDO::FETCH_ASSOC);

$query4SSsatis=$conn->prepare("SELECT SUM(selling*dimension)  FROM products WHERE selled=? AND seria=?");
$query4SSsatis->execute([0,""]);
$rows4SSsatis=$query4SSsatis->fetchall(PDO::FETCH_ASSOC);

// Kredit məhsul hesabatı

$query4Scredit=$conn->prepare("SELECT SUM(credit)  FROM products WHERE selled=? AND seria!=?");
$query4Scredit->execute([0,""]);
$rows4Scredit=$query4Scredit->fetchall(PDO::FETCH_ASSOC);

$query4SScredit=$conn->prepare("SELECT SUM(credit*dimension)  FROM products WHERE selled=? AND seria=?");
$query4SScredit->execute([0,""]);
$rows4SScredit=$query4SScredit->fetchall(PDO::FETCH_ASSOC);
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (dayly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Satış (Bugün)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($d24Psum!="" || $d24Psum==0){ echo $d24Psum." AZN";} ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Satış (Aylıq)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($d30Psum!="" || $d30Psum==0){ echo $d30Psum." AZN";} ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gözlənilən kredit gəliri</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $credit." AZN"; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: .25rem solid #36b9cc;border-left-style: solid;border-left-color: #e74a3b;">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nağd satışdakı borclar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nagdGozlenti." AZN"; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: .25rem solid red;border-left-style: solid;border-left-color: green;">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Satılmamış mallar</div>
                    <div class="h6 mb-0  text-gray-800">
                      Topdan qiymətlərlə: <br>
                      <?php 
                        $topdan=0; 
                        $seriali  = $rows4WareHouse[0]['SUM(wholesale)'];
                        $seriasiz = $rows4Seriasiz[0]['SUM(wholesale*dimension)'];
                        if($seriali=="")
                        {
                          $seriali=0;
                        }

                        if($seriasiz=="")
                        {
                          $seriasiz=0;
                        }
                        $topdan=$seriali+$seriasiz;
                        echo $topdan.' AZN';
                      ?>
                    </div>
                    <hr>
                    <div class="h6 mb-0  text-gray-800">
                      Nağd qiymətlərlə: <br>
                      <?php 
                      $satis=0; 
                      $Sseriali  = $rows4Ssatis[0]['SUM(selling)'];
                      $Sseriasiz = $rows4SSsatis[0]['SUM(selling*dimension)'];
                      if($Sseriali=="")
                      {
                        $Sseriali=0;
                      }

                      if($Sseriasiz=="")
                      {
                        $Sseriasiz=0;
                      }
                      $satis=$Sseriali+$Sseriasiz;
                      echo $satis.' AZN';
                      ?>
                    </div>
                    <hr>
                    <div class="h6 mb-0  text-gray-800">
                      Kredit qiymətlərlə: <br>
                      <?php 
                      $kredit=0; 
                      $Skredit  = $rows4Scredit[0]['SUM(credit)'];
                      $Sskredit = $rows4SScredit[0]['SUM(credit*dimension)'];
                      if($Skredit=="")
                      {
                        $Skredit=0;
                      }

                      if($Sskredit=="")
                      {
                        $Sskredit=0;
                      }
                      $kredit=$Skredit+$Sskredit;
                      echo $kredit.' AZN';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->