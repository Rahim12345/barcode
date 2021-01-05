<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Müqavilə nömrəsini daxil et</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-sm-3">
              <input type="text" name="ianeN" class="form-control" placeholder="000001" id="ianeN" value="" maxlength="50">
            </div>
             <div class="col-sm-3">
              <button type="submit" name="iane" class="btn btn-primary">AXTAR</button>
            </div>
          </div>
        </form>          
        <p style="background-color: orange;line-height: 40px;color:white;border-radius: 15px;font-size: 3vh;padding-left: 25px;text-align: center;">
          <?php 
          if(!empty($ianeErr))
          {
            echo $ianeErr;
          }
          ?>
        </p>
        </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->