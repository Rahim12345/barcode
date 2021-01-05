<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorUpdateProfil))
      {
        echo $errorUpdateProfil;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Ad <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="nameUpdate" class="form-control" id="name" value="<?php echo $name; ?>" maxlength="51">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Şifrə <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="passwordUpdate" class="form-control" id="password" value="<?php echo $password ?>" maxlength="51">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="profilUpdate" class="btn btn-primary">Yenilə</button>
      </div>
    </div>
  </form>          
  </div>
</div>