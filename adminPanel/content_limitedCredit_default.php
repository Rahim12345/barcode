<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorLimitedCreditTime))
      {
        echo $errorLimitedCreditTime;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="LimitedCreditTime" class="col-sm-2 col-form-label">Limitləndirilmiş kredit günü <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="LimitedCreditTimeInput" class="form-control" id="LimitedCreditTime" placeholder="Limitləndirilmiş kredit günün daxil edin" maxlength="2">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="LimitedCreditTime" class="btn btn-primary">Daxil et</button>
      </div>
    </div>
  </form>          
  </div>
</div>