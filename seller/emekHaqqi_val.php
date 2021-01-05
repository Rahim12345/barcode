<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">ƏMƏK HAQQI SİSTEMİ</h1>
  <div class="row">
    <div class="col-lg-10">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
          <?php 
          if(!empty($Denqi))
          {
            echo $Denqi."  ";
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
          <label for="worker" class="col-sm-2 col-form-label">İşçi seç <sup>*</sup></label>
          <select name="worker" id="worker" class="form-control" >
            <option value="">İşçi seçin</option>
            <?php  
            $query4Users=$conn->prepare("SELECT * FROM users WHERE id>? AND status!=?");
            $query4Users->execute([0,"admin"]);
            $rows4Users=$query4Users->fetchall(PDO::FETCH_ASSOC);
            $count4Users=count($rows4Users);
            if($count4Users!=0)
            {
              foreach($rows4Users as $rows4User)
              {
                if($rows4User["id"]==$worker)
                {
                  echo '<option value="'.$rows4User["id"].'" selected="selected">'.$rows4User["name"].'</option>';
                }
                else
                {
                  echo '<option value="'.$rows4User["id"].'">'.$rows4User["name"].'</option>';
                }
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group row">
          <label for="salary" class="col-sm-2 col-form-label">Əmək haqqı <sup>*</sup></label>
          <div class="col-sm-10">
            <input type="number" name="salary" class="form-control" id="salary" placeholder="350" min="0" max="1000000" value="<?php if($salary!=""){ echo $salary; } ?>" style="color:black;">
          </div>
        </div>
        <div class="form-group row">
          <label for="bonus" class="col-sm-2 col-form-label">Bonus <sup>*</sup></label>
          <div class="col-sm-10">
            <input type="number" name="bonus" class="form-control" id="bonus" placeholder="50" min="0" max="1000000" value="<?php if($bonus!=""){ echo $bonus; } ?>" style="color:black;">
          </div>
        </div>
        <div class="form-group row">
          <label for="priz" class="col-sm-2 col-form-label">Bayram pulu <sup>*</sup></label>
          <div class="col-sm-10">
            <input type="number" name="priz" class="form-control" id="priz" placeholder="30" min="0" max="1000000" value="<?php if($priz!=""){ echo $priz; } ?>" style="color:black;">
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Təsvir yaz <sup>*</sup></label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" id="description" cols="30" placeholder="Satıcı Süleymanov Rahim Camal oğluna 350 manat əmək haqqı,50 manat bonus və 30 manat bayram pulu verildi" rows="10" style="color:black;"><?php if(strlen($description)!=0){ echo $description; } ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" name="enter" class="btn btn-primary">Maaş ver</button>
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