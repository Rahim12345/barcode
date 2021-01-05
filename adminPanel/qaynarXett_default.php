<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorhotCall))
      {
        echo $errorhotCall;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="hotCall" class="col-sm-2 col-form-label">Qaynar xətt <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="hotPoint" class="form-control" id="hotCall" placeholder="Qaynar xətt daxil edin" maxlength="25">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="hotadd" class="btn btn-primary">Daxil et</button>
      </div>
    </div>
  </form>          
  </div>
</div>