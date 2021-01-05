<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorWare))
      {
        echo $errorWare;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="warehouse" class="col-sm-2 col-form-label">Anbar adı <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="warehouseInput" class="form-control" id="warehouse" placeholder="Anbar 1" maxlength="51">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="warehouse" class="btn btn-primary">Anbar&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>