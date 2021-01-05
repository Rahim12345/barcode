<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorJob))
      {
        echo $errorJob;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="store" class="col-sm-2 col-form-label">Vəzifə adı <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="jobInput" class="form-control" id="store" placeholder="Satıcı" maxlength="51">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="job" class="btn btn-primary">Vəzifə&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>