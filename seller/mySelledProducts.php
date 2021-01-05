<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Satdığım məhsullar</h1>

  <div class="row">

    <div class="col-lg-10">
	<?php  
	$myId=$_SESSION["id"];

	$query4mySelledProducts=$conn->prepare("SELECT * FROM selledproducts WHERE sellerID=? ORDER BY id DESC");
	$query4mySelledProducts->execute([$myId]);
	$rows4mySelledProducts=$query4mySelledProducts->fetchall(PDO::FETCH_ASSOC);
	$count4mySelledProducts=count($rows4mySelledProducts);
	if($count4mySelledProducts==0)
	{
		include 'mySelledProducts_default.php';
	}
	else
	{	
		?>
<div class="card shadow mb-4">
  <div class="card-body">
    <table class="table table-stripped" id="dataTable" width="100%" style="font-size: 1.8vh;color:black;" cellspacing="0">
      <thead>
        <tr style="background-color: #1c4b79;color:white;">
          <th scope="col">Müqavilə nömrəsi </th>
          <th scope="col">Müştəri adı </th>
          <th scope="col">Aldığı məhsullar </th>
          <th scope="col">Qaytardığı məhsullar</th>
          <th scope="col">Satış üsulu </th>
          <th scope="col">Tarix </th>
        </tr>
      </thead>
      <tfoot>
        <tr style="background-color: #1c4b79;color:white;">
          <th scope="col">Müqavilə nömrəsi </th>
          <th scope="col">Müştəri adı </th>
          <th scope="col">Aldığı məhsullar </th>
          <th scope="col">Qaytardığı məhsullar</th>
          <th scope="col">Satış üsulu </th>
          <th scope="col">Tarix </th>
        </tr>
      </tfoot>
      <tbody>
		<?php
		foreach($rows4mySelledProducts as $rows4mySelledProduct)
		{
			$bmk=$rows4mySelledProduct["bmkID"];
			$query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE id=?");
			$query4Bmk->execute([$bmk]);
			$rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
			$count4Bmk=count($rows4Bmk);
			if($count4Bmk!=0)
			{
				foreach($rows4Bmk as $row4Bmk)
				{
					$sellStyle  =$row4Bmk["sellStyle"];
    				$bmkNo      =$row4Bmk["bmkNo"];
    				include 'bmkFunction.php';
    				if($sellStyle==1)
				    {
				      $query4CreditSelling=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
				      $query4CreditSelling->execute([$bmkNo]);
				      $rows4CreditSelling=$query4CreditSelling->fetchall(PDO::FETCH_ASSOC);
				      $count4CreditSelling=count($rows4CreditSelling);
				      if($count4CreditSelling!=0)
				      {
				        foreach($rows4CreditSelling as $row4CreditSelling)
				        {
				          ?>
				          <tr>
				            <td><?php echo $bmk; ?></td>
				            <td><?php echo $row4CreditSelling["name"]; ?></td>
				            <td>
				              <?php
				              if($row4CreditSelling["productDetails"]!="")
				              {
				                $productDetails=$row4CreditSelling["productDetails"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>
				              <?php
				              if($row4CreditSelling["rejectedProducts"]!="")
				              {
				                $productDetails=$row4CreditSelling["rejectedProducts"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>Kreditlə</td>
				            <td><?php echo $row4CreditSelling["sellerTime"]; ?></td>
				          </tr>
				          <?php
				        }
				      }
				    }
				    elseif($sellStyle==2)
				    {
				      $query4CashSelling=$conn->prepare("SELECT * FROM cash WHERE id=?");
				      $query4CashSelling->execute([$bmkNo]);
				      $rows4CashSelling=$query4CashSelling->fetchall(PDO::FETCH_ASSOC);
				      $count4CashSelling=count($rows4CashSelling);
				      if($count4CashSelling!=0)
				      {
				        foreach($rows4CashSelling as $row4CashSelling)
				        {
				          ?>
				          <tr>
				            <td><?php echo $bmk; ?></td>
				            <td><?php echo $row4CashSelling["name"]; ?></td>
				            <td>
				              <?php
				              if($row4CashSelling["productDetails"]!="")
				              {
				                $productDetails=$row4CashSelling["productDetails"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>
				              <?php
				              if($row4CashSelling["rejectedProducts"]!="")
				              {
				                $productDetails=$row4CashSelling["rejectedProducts"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>Nağd</td>
				            <td><?php echo $row4CashSelling["date"]; ?></td>
				          </tr>
				          <?php
				        }
				      }
				    }
				    else
				    {
				      $query4TopdanSelling=$conn->prepare("SELECT * FROM topdan WHERE id=?");
				      $query4TopdanSelling->execute([$bmkNo]);
				      $rows4TopdanSelling=$query4TopdanSelling->fetchall(PDO::FETCH_ASSOC);
				      $count4TopdanSelling=count($rows4TopdanSelling);
				      if($count4TopdanSelling!=0)
				      {
				        foreach($rows4TopdanSelling as $row4TopdanSelling)
				        {
				          ?>
				          <tr>
				            <td><?php echo $bmk; ?></td>
				            <td><?php echo $row4TopdanSelling["name"]; ?></td>
				            <td>
				              <?php
				              if($row4TopdanSelling["productDetails"]!="")
				              {
				                $productDetails=$row4TopdanSelling["productDetails"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>
				              <?php
				              if($row4TopdanSelling["rejectedProducts"]!="")
				              {
				                $productDetails=$row4TopdanSelling["rejectedProducts"];
				                include 'opendetails.php';
				                echo $satılan_malın_adı_qiymetile;
				              }
				              else
				              {
				                echo $satılan_malın_adı_qiymetile=""; 
				              }
				                
				              ?>
				            </td>
				            <td>Topdan</td>
				            <td><?php echo $row4TopdanSelling["date"]; ?></td>
				          </tr>
				          <?php
				        }
				      }
				    }
				}
			}
		}
	?>
		</tbody>
    </table>
  </div>
</div>
	<?php
		// include 'mySelledProducts_default4Tables.php';
	}
	?>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->