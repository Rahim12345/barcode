<form action="index.php?id=13" method="POST">
<div class="form-group row">
  <label for="creditPay" class="col-sm-2 col-form-label">Kredit ödə(AZN)<sup>*</sup></label>
  <div class="col-sm-10">
    <input type="text" name="creditPay"  class="form-control" id="creditPay">
  </div>
</div>
<div class="form-group row">
  <label for="debbePay" class="col-sm-2 col-form-label">Dəbbə ödə(AZN)<sup>*</sup></label>
  <div class="col-sm-10">
    <input type="text" name="debbePay"  class="form-control" id="debbePay">
  </div>
</div>
<div class="form-group row">
  <label for="Pay" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
    <input type="submit" name="Pay" class="btn btn-primary" id="Pay" value="Ödə">
  </div>
</div>
<input type="hidden" name="hmid" value="<?php echo $mid; ?>">
</form>