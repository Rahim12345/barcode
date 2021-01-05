<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Kassadan pul götür</h1>
  <div class="row">
    <div class="col-lg-10">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
          <?php 
          if(!empty($Denqi))
          {
            echo $Denqi." ";
          }
          if(!empty($errKassa))
          {
            echo $errKassa;
          } 
          ?>
        </h6>
      </div>
      <div class="card-body">
      <form action="" method="POST">
        <div class="form-group row">
          <label for="partnor" class="col-sm-2 col-form-label">Partnyor seç <sup>*</sup></label>
          <select name="partnor" id="partnor" class="form-control" >
            <option value="">Partnyor seçin</option>
            <?php 
            $query4Partnor=$conn->prepare("SELECT * FROM partnyor WHERE id>?");
            $query4Partnor->execute([0]);
            $rows4Partnor=$query4Partnor->fetchall(PDO::FETCH_ASSOC);
            $count4Partnor=count($rows4Partnor);
            foreach($rows4Partnor as $row4Partnor)
            {
              if($row4Partnor["id"]==$partnor)
              {
                echo '<option value="'.$row4Partnor["id"].'" selected="selected">'.$row4Partnor["name"].'</option>';
              }
              else
              {
                echo '<option value="'.$row4Partnor["id"].'">'.$row4Partnor["name"].'</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group row">
          <label for="money" class="col-sm-2 col-form-label">Pulun miqdarı <sup>*</sup></label>
          <div class="col-sm-10">
            <input type="number" name="money" class="form-control" id="money" placeholder="2350" min="1" max="1000000" value="<?php if($money!=""){ echo $money; } ?>" style="color:black;">
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Təsvir yaz <sup>*</sup></label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" id="description" cols="30" placeholder="SOLİTON un pulundan 2350 AZN verdim..." rows="10" style="color:black;"><?php if(strlen($description)!=0){ echo $description; } ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" name="enter" class="btn btn-primary">PUL GÖTÜR</button>
          </div>
        </div>
      </form>          
      </div>
    </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->