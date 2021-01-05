<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Müstərini FİN ilə axtar</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-sm-3">
              <input type="text" name="daimiName" class="form-control" id="daimiName" value="" maxlength="50">
            </div>
             <div class="col-sm-3">
              <button type="submit" name="daimi" class="btn btn-primary">AXTAR</button>
            </div>
          </div>
        </form>          
        <p style="background-color: orange;line-height: 40px;color:white;border-radius: 15px;font-size: 3vh;padding-left: 25px;text-align: center;">
          <?php 
          if(!empty($daimiErr))
          {
            echo $daimiErr;
          }
          ?>
        </p>
        </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->