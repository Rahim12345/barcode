<?php
if(isset($_GET["id"]) && isset($_GET["qid"]))
{
	$id=htmlspecialchars(trim($_GET["id"]));
	$qid=htmlspecialchars(trim($_GET["qid"]));
	if(is_numeric($id) && ceil($id)-$id==0 && $qid>0 && is_numeric($qid) && ceil($qid)-$qid==0 && $qid>0)
	{
		$query4Qebz=$conn->prepare("SELECT * FROM qebz WHERE id=?");
		$query4Qebz->execute([$qid]);
		$rows4Qebz=$query4Qebz->fetchall(PDO::FETCH_ASSOC);
		$count4Qebz=count($rows4Qebz);
		if($count4Qebz==0)
		{
			include '404.html';
		}
		else
		{

$query4wq=$conn->prepare("SELECT * FROM qebz WHERE id=?");
$query4wq->execute([$qid]);
$rows4wq=$query4wq->fetchall(PDO::FETCH_ASSOC);
$wqCount=count($rows4wq);
if($wqCount==0)
{
	echo "Qəbz tapılmadı";
}
else
{
	$query4wqQ=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
	$query4wqQ->execute([$rows4wq[0]["muqavileN"]]);
	$rows4wqQ=$query4wqQ->fetchall(PDO::FETCH_ASSOC);
	$wqQCount=count($rows4wqQ);
	if($wqQCount==0)
	{
		echo "Müqavilə tapılmadı.";
	}
	else
	{
		$satisTarixi=$rows4wqQ[0]["sellerTime"];
	}
}
$qebzNomre=$rows4Qebz[0]["nomre"];
$qebzTarixi=$rows4Qebz[0]["realDate"];
$payer=$rows4Qebz[0]["saticiAdi"];
$storePayer=$rows4Qebz[0]["odeyenAdi"];
$sonEsas=$rows4Qebz[0]["odenisEsas"];
$sonCerime=$rows4Qebz[0]["odenisCerime"];
$toplamBorc=$rows4Qebz[0]["ToplamBorc"];
$cerimeBorcu=$rows4Qebz[0]["cerime"];
// $toplamOdenilib=$rows4Qebz[0]["toplamOdenilib"];
$toplamOdenilib=$rows4wqQ[0]["amountPaid"]+$rows4wqQ[0]["amountPaidDebbe"];
$store=$rows4Qebz[0]["store"];
$hotCall=$rows4Qebz[0]["hotCall"];
?>
<h6 class="m-0 font-weight-bold text-primary" id="back"></h6>
<br>
<h6 class="m-0 font-weight-bold text-primary" id="alert" style="padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
  <button class="btn btn-primary" onclick="prinTorder();">Çapa hazırla</button>
</h6>
<button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
<div class="card" style="border:none;">
    <div class="card-body">
	   <table class="table table-light" style="width: 80%;border:none;">
		  <tbody style="background-color: white;color: black;">
		  	<tr>
		  		<td><img src="img/12391logo2.png" alt=""></td>
		  		<td>
		  			<u><b>QƏBZ</b></u><br> 
		  			Nömrə: <?php echo $qebzNomre; ?> <br>	Tarix:<?php echo $qebzTarixi; ?>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<span class="form-control" style="position: relative;float: left;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Mağaza: <?php echo $store; ?></span>
		  			<span class="form-control" style="position: relative;float: left;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Tel: <?php echo $hotCall; ?></span>
		  		</td>
		  		<td>
		  			<span class="form-control" style="position: relative;float: right;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Ödəyici:<?php echo $payer; ?></span>
		  			<span class="form-control" style="position: relative;float: right;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Ödəyən:<?php echo $storePayer; ?></span>
		  			<!-- <span class="form-control" style="position: relative;float: right;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Ödəniş(əsas):</span> -->
		  			<!-- <span class="form-control" style="position: relative;float: right;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Ödəniş(cərimə):</span> -->
		  			<span class="form-control" style="position: relative;float: right;width:400px;border:none;border-bottom:1px solid black;border-radius: 0;">Ödəniş:<?php echo $sonEsas+$sonCerime." AZN"; ?></span>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td></td>
		  		<td>
		  			Məlumat:
		  			<br>
		  			<p style="width: 80%;border:1px dotted black;">
		  				<?php  
		  				$bmk=$rows4wq[0]["muqavileN"];
		  				include 'bmkFunction.php';
		  				?>
		  				Müqavilə №:<?php echo $bmk; ?>,<?php echo $satisTarixi; ?>
		  				<br>
		  				Borc(AZN): <?php echo $toplamBorc+$cerimeBorcu; ?>
		  				<!-- Toplam borc(AZN): 
		  				<br>
		  				Cərimə(AZN):  -->
		  				<br>
		  				Toplam Ödənilib(AZN): <?php echo $toplamOdenilib; ?>
		  			</p>
		  		</td>
		  	</tr>
		  </tbody>
		</table>      
    </div>
</div>

<?php
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