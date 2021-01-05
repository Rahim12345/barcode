<?php
$query4Sat=$conn->prepare("SELECT * FROM users WHERE id=?");
$query4Sat->execute([$_SESSION["id"]]);
$rows4Sat=$query4Sat->fetchall(PDO::FETCH_ASSOC);
$count4Sat=count($rows4Sat);
if($count4Sat==0)
{
  echo "Hesabınız silinib";
}
else
{
$saa=$rows4Sat[0]["status"].":".$rows4Sat[0]["name"];
$toDay=date("d.m.Y H:i:s");
$d24=24*60*60;
$d30=30*24*60*60;
$d24Psum=0;
$d30Psum=0;

$query4TodayPro=$conn->prepare("SELECT * FROM selledproducts WHERE sellerName=?");
$query4TodayPro->execute([$saa]);
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
    if($difTime<$d24)
    {
      $d24Psum+=$row4TodayPro["price"];
    }
    if($difTime<$d30)
    {
      $d30Psum+=$row4TodayPro["price"];
    }
  }
}
?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $rows4Seller[0]["store"]; ?> </h1>
          </div>

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
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php
}
?>