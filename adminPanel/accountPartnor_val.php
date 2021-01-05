<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php  
      if(!empty($error))
      {
        echo $error;
      }
      ?>
    </h6>
  </div>
  <div class="card-body" style="margin-bottom: 150px;">
  <form action="" method="POST">
    <div class="form-group row">
      <label for="start" class="col-sm-2 col-form-label">Başlanğıc tarix <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="date" name="start" class="form-control" id="start" placeholder="15.02.2020" maxlength="51" value="<?php if(!empty($start)){ echo $start; } ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="finish" class="col-sm-2 col-form-label">Son tarix <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="date" name="finish" class="form-control" id="finish" placeholder="25.04.2020" maxlength="51" value="<?php if(!empty($finish)){ echo $finish; } ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="partnors" class="col-sm-2 col-form-label">Partnyor seçin <sup>*</sup></label>
      <select name="partnor" id="partnors" class="form-control">
        <option value="">Birini seçin</option>
        <?php  
        $query4partnor=$conn->prepare("SELECT * FROM partnyor WHERE id>?");
        $query4partnor->execute([0]);
        $rows4partnor=$query4partnor->fetchall(PDO::FETCH_ASSOC);
        $count4partnor=count($rows4partnor);
        if($count4partnor!=0)
        {
          foreach($rows4partnor as $row4partnor)
          {
            if($row4partnor["id"]==$partnor)
            {
              echo '<option value="'.$row4partnor["id"].'" selected="selected">'.$row4partnor["name"].'</option>';
            }
            else
            {
              echo '<option value="'.$row4partnor["id"].'" >'.$row4partnor["name"].'</option>';
            }
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name="partnorAccount" class="btn btn-primary">GÖSTƏR</button>
      </div>
    </div>
  </form>          
  </div>
</div>