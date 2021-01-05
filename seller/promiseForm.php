<form action="index.php?id=27" method="POST">
<div class="form-group row">
  <label for="cashPay" class="col-sm-2 col-form-label">Ödəniş(AZN)</label>
  <div class="col-sm-10">
    <input type="text" name="cashPay"  class="form-control" id="cashPay">
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