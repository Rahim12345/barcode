<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorPartnor))
      {
        echo $errorPartnor;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="category" class="col-sm-2 col-form-label">Partnyor adı <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="partnorInput" class="form-control" id="category" placeholder="Partnyor adını daxil edin" maxlength="51">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="partnor" class="btn btn-primary">Partnyor&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>