<?php
if(isset($_GET["id"]) && isset($_GET["mid"]))
{
  $id=htmlspecialchars(trim($_GET["id"]));
  $mid=htmlspecialchars(trim($_GET["mid"]));
  if(is_numeric($id) && ceil($id)-$id==0 && $mid>0 && is_numeric($mid) && ceil($mid)-$mid==0 && $mid>0)
  {
	$query4CreditDetails=$conn->prepare("SELECT * FROM cash WHERE id=?");
	$query4CreditDetails->execute([$mid]);
	$rows4CreditDetails=$query4CreditDetails->fetchall(PDO::FETCH_ASSOC);
	$count4CreditDetails=count($rows4CreditDetails);
	if($count4CreditDetails==0)
	{
		echo "Nağd sistemindən bu müqavilə artıq silinib.";
	}
	else
	{
		$day=$rows4CreditDetails[0]["date"];
		$diff = strtotime(date("d.m.Y"))-strtotime($day);
		$diffDay=$diff/(24*60*60);
		if($diffDay>14)
		{			
			?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"></h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card-body">        
        <p style="background-color: orange;line-height: 40px;color:white;border-radius: 15px;font-size: 3vh;padding-left: 25px;text-align: left;">
          <?php 
          echo "Məhsulun alışından $diffDay gün keçib.Qanunvericiliyə əsasən yalnız 14 gün ərzində məhsulun qaytarılmasına icazə verilir.";
          ?>
        </p>
        </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->
			<?php
		}
		else
		{
			$name=$rows4CreditDetails[0]["name"];
			$address=$rows4CreditDetails[0]["address"];
			$telno=$rows4CreditDetails[0]["telno"];
			$timer=$rows4CreditDetails[0]["timer"];
			$productDetails=$rows4CreditDetails[0]["productDetails"];
			$checkPro=explode("||", $productDetails);
			if(count($checkPro)==2)
			{
				include 'ianeNagdForm.php';
			}
			else
			{
				?>
				<p class="btn-danger" style="min-height: 50%;margin: 10px;border-radius: 10px;text-align: center;padding-top: 12%;font-size: 5vh;margin-bottom: 140px;">Bu müqavilə üzrə bütün məhsullar artıq qaytarılıb
				</p>
				<?php
			}
		}
	}    
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