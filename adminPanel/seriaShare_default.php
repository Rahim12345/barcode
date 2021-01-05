<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Məhsulu seriası ilə axtar</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-sm-3">
              <input type="text" name="seriaNomre" class="form-control" id="seriaNomre" value="" maxlength="50">
            </div>
             <div class="col-sm-3">
              <button type="submit" name="seriaBtn" class="btn btn-primary">AXTAR</button>
            </div>
          </div>
        </form>          
        <p style="background-color: orange;line-height: 40px;color:white;border-top-right-radius: 15px;border-top-left-radius: 15px;font-size: 3vh;padding-left: 25px;text-align: center;">
          <?php 
          if(!empty($result))
          {
            echo $result;
          }
          ?>
        </p>
          <?php
          if($count4Seria!=0)
          {
           include 'seriaShare_table.php'; 
          }
          ?> 
        </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->