<div class="mb-4" style="font-size: 12px;">
  <div class="py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="back" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
    </h6>
    <br>
    <h6 class="m-0 font-weight-bold text-primary" id="alert" ></h6>
    <button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Soyad,Ad,Ata adı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4CashPay[0]["name"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productName" class="col-sm-2 col-form-label">Məhsulun adı<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-radius: 0px;color: black;font-size:10px;">
          <?php  
          $productDetails=$rows4CashPay[0]["productDetails"];
          include 'openDetails.php';
          echo $satılan_malın_adı;
          ?>
        </span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productSeria" class="col-sm-2 col-form-label">Məhsulun qiyməti(AZN)<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4CashPay[0]["price"]; ?></span>
      </div>
    </div>
    <?php include 'promiseForm.php'; ?>
  </div>
</div>