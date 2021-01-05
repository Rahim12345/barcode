<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorDebbe))
      {
        echo $errorDebbe;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="debbe" class="col-sm-2 col-form-label">Dəbbə % <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="debbeInput" class="form-control" id="debbe" placeholder="Dəbbə %-ni daxil edin" maxlength="1">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="debbe" class="btn btn-primary">Dəbbə&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>