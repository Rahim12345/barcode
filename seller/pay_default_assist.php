<div class="mb-4" style="font-size: 10px;">
  <div class="py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="back" style="background-color: orange;padding-left: 15px;line-height: 40px;text-align: center;color: white;border-top-right-radius: 15px;border-top-left-radius: 15px;">
      <p style="color:white;">
      <?php  
      if(!empty($payER))
      {
        echo $payER;
      }
      ?>
      </p>
    </h6>
    <br>
    <h6 class="m-0 font-weight-bold text-primary" id="alert" ></h6>
    <button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Soyad,Ad,Ata adı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4Pay[0]["name"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productName" class="col-sm-2 col-form-label">Məhsulun adı<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;">
          <?php  
          $productDetails=$rows4Pay[0]["productDetails"];
          include 'openDetails.php';
          echo $satılan_malın_adı;
          ?>
        </span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productSeria" class="col-sm-2 col-form-label">Məhsulun qiyməti(AZN)<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4Pay[0]["productPrice"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productSeria" class="col-sm-2 col-form-label">Qalıq borc(AZN)<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4Pay[0]["remindMoney"]-$rows4Pay[0]["amountPaid"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productSeria" class="col-sm-2 col-form-label">Dəbbə borcu(AZN)<sup>*</sup></label>
      <div class="col-sm-10">
        <?php  
        $tot=$rows4Pay[0]['debbeDays']+$rows4Pay[0]['totalDebbeDays'];
        $debbeBorcu=(($tot*$rows4Pay[0]["debbe"]*$rows4Pay[0]["productPrice"])/100)-$rows4Pay[0]["amountPaidDebbe"];
        ?>
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $tot."  günlük dəbbə borcu $debbeBorcu AZN"; ?></span>
      </div>
    </div>
    <?php include 'pay_form_assist.php'; ?>
  </div>
</div>