<h6 class="m-0 font-weight-bold text-primary" id="back"></h6>
<br>
<h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
  <button class="btn btn-primary" onclick="prinTorder();">Çapa hazırla</button>
</h6>
<button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
<?php  
$muqavileN=$rows4Qebz[0]["muqavileN"];

$query4wq=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
$query4wq->execute([$muqavileN]);
$rows4wq=$query4wq->fetchall(PDO::FETCH_ASSOC);
$wqCount=count($rows4wq);
if($wqCount==0)
{
	$satisTarixi="";
}
else
{
	$satisTarixi=$rows4wq[0]["sellerTime"];
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
$toplamOdenilib=$rows4wq[0]["amountPaid"]+$rows4wq[0]["amountPaidDebbe"];
$store=$rows4Qebz[0]["store"];
$hotCall=$rows4Qebz[0]["hotCall"];
?>
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
		  				Müqavilə №:<?php echo $muqavileN; ?>,<?php echo $satisTarixi; ?>
		  				<br>
		  				Borc(AZN): <?php echo $toplamBorc+$cerimeBorcu; ?>
		  				<!-- Toplam borc(AZN): 
		  				<br>
		  				Cərimə(AZN): 
		  				<br> -->
		  				<br>
		  				Toplam Ödənilib(AZN): <?php echo $toplamOdenilib; ?>
		  			</p>
		  		</td>
		  	</tr>
		  </tbody>
		</table>      
    </div>
</div>