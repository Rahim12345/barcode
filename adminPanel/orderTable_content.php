<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
      <a href="index.php?id=26" style="color: white;">&lt|Geri dön</a>
    </h6>
    <br>
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
      Müqavilə
    </h6>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Soyad,Ad,Ata adı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["name"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="telno" class="col-sm-2 col-form-label">Telefon nömrəsi <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["telno"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="myFile" class="col-sm-2 col-form-label">Vəsiqə və arayış<sup>*</sup></label>
      <div class="col-sm-10">
          <?php 
          $imgs=explode(",", $rows4SeriaMid[0]["creditDocuments"]);
          foreach($imgs as $img)
          {
            ?>
        <a href="../seller/<?php echo $img ?>" target="_blank"><img src="../seller/<?php echo $img ?>" alt="IdentifyCard" style="width:100px;height: 100px;"></a>
            <?php
          }
          ?>    
      </div>
    </div>
    <div class="form-group row">
      <label for="productName" class="col-sm-2 col-form-label">Məhsulun adı<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["productName"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productSeria" class="col-sm-2 col-form-label">Məhsulun seriyası<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["productSeria"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productPrice" class="col-sm-2 col-form-label">Məhsulun qiyməti (AZN) <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["productPrice"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="firstPrice" class="col-sm-2 col-form-label">İlkin ödəniş(AZN) <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["firstPrice"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="firstPrice" class="col-sm-2 col-form-label">Dəbbə faizi <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["debbe"]."%"; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="sellerTime" class="col-sm-2 col-form-label">Məhsulun satıldığı tarix <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["realTime"]; ?></span>
      </div>
    </div>   
    <div class="form-group row">
      <label for="sellerTime" class="col-sm-2 col-form-label">Satıcı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;"><?php echo $rows4SeriaMid[0]["seller"]; ?></span>
      </div>
    </div>  
    <table class="table table-dark" style="width: 100%;">
      <thead style="background-color: #1c4b79;">
        <tr>
          <th scope="col">Aylar</th>
          <th scope="col">Ödəniləcək məbləğ(AZN)</th>
        </tr>
      </thead>
      <tbody style="background-color: #1c4b79;">
        <?php  
        $Creditmonths=explode(",", $rows4SeriaMid[0]["creditTable"]);
          foreach($Creditmonths as $Creditmonth)
          {
            ?>
            <tr>
              <td><?php echo $Creditmonth; ?></td>
              <td><?php echo $rows4SeriaMid[0]["avaragePay"]; ?></td>
            </tr>
            <?php
          }
        ?>
        <tr style="background-color: orange;">
          <td>Qalıq borc&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo $rows4SeriaMid[0]["remindMoney"]; ?></td>
        </tr>
         <tr style="background-color: orange;">
          <td>İlk dəbbə tarixi&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>
            <?php 
            $creditTable=$rows4SeriaMid[0]["creditTable"];
            $creditTable=explode(",", $creditTable);
            echo $creditTable[0];
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>