<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorCategory))
      {
        echo $errorCategory;
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="category" class="col-sm-2 col-form-label">Kateqoriya adı <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="categoryInput" class="form-control" id="category" placeholder="Telfon" maxlength="51">
      </div>
    </div>
    <div class="btn-group btn-group-toggle form-group row" style="float: right;" data-toggle="buttons">
<?php  
foreach($rows4units as $rows4unit)
{
  ?>
      <label class="btn btn-success active" >
        <input type="radio" name="unit" value="<?php echo $rows4unit["name"]; ?>" id="unit" autocomplete="off"> <?php echo $rows4unit["name"]; ?>
      </label>
  <?php
}
?>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="category" class="btn btn-primary">Kateqoriya&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>