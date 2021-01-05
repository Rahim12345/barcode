<div class="card shadow mb-4">
    <div class="card-body">
    <form action="" method="POST">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;">
      <thead style="background-color: white;color:black;text-align: center;">
        <tr style="background-color: green;color:white;">
          <th colspan="5">NAĞD SATIŞ</th>
        </tr>
        <tr>
          <th colspan="5">MÜSTƏRİ MƏLUMATLARI</th>
        </tr>
      </thead>
      <tbody style="border: 2px solid black;color: black;">
      	<tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ALICI VƏ ÜNVAN MƏLUMATLARI</td>
        </tr>
        <tr>
          <td><label for="musteriSAA">S.A.A : </label></td>
          <td colspan="4">
            <input type="hidden" id="musteriSAA" name="musteriSAA" placeholder="SÜLEYMANOV RAHİM CAMAL" value="<?php echo $name ?>" class="form-control" style="border:1px solid black;" maxlength="50">
            <span class="form-control"><?php echo $name ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="musteriADRR">Ünvan : </label></td>
          <td colspan="4"><input type="hidden" id="musteriADRR" name="musteriADRR" placeholder="SAATLI RAY.,ƏHMƏDBƏYLİ K" class="form-control" style="border:1px solid black;" maxlength="50">
            <span class="form-control"><?php echo $address; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="musteriTel">Telefon nömrəsi : </label></td>
          <td colspan="4"><input type="hidden" id="musteriTel" name="musteriTel" placeholder="055-555-55-55,077-777-77-77" class="form-control" style="border:1px solid black;" maxlength="50">
            <span class="form-control"><?php echo $telno; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="timer">Ödəniləcək gün<sup>*</sup> <br> (Məs:10 gün sonra) : </label></td>
          <td colspan="4"><input type="hidden" id="timer" name="timer" placeholder="10" class="form-control" style="border:1px solid black;" maxlength="2">
          <span class="form-control"><?php echo $timer ?></span>
          </td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">MƏHSUL VƏ QİYMƏT</td>
        </tr>
        <tr id="qwe">
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align: right;"></td>
          <td style="text-align: right;"><input type="button" class="delete-row btn btn-danger" value="QAYTAR"></td>
        </tr>
        <tr id ='total'>
          <td></td><td></td><td></td><td></td><td>Cəm: <?php echo $rows4CreditDetails[0]["price"]." AZN"; ?></td>
        </tr>
     

<?php  
$productDetails=$rows4CreditDetails[0]["productDetails"];
$productDetails=explode("||", $productDetails);
if(count($productDetails)==2)
{
  $serLen=strlen($productDetails[0]);
  $serSizLen=strlen($productDetails[1]);
  if($serLen!=0)
  {
    $serialiArray=explode(",",$productDetails[0]);
    foreach($serialiArray as $seriali)
    {
      $serialiExp=explode("**", $seriali);
      $query4Products=$conn->prepare("SELECT * FROM products WHERE seria=?");
      $query4Products->execute([$serialiExp[0]]);
      $rows4Products=$query4Products->fetchall(PDO::FETCH_ASSOC);
      $count4Products=count($rows4Products);
      if($count4Products!=0)
      {
        $partnorlar=$rows4Products[0]["partnor"];
        $mallar=$rows4Products[0]["manufacturer"];
        $modeller=$rows4Products[0]["model"];
        $serialar=$rows4Products[0]["seria"];
        $qiymetler=$serialiExp[1];
  ?>
          <tr>
            <td>
              <input class='form-control' type='checkbox' name='record'>
            </td>
            <td>
              <input class='form-control' name='partnors[]' type='hidden' value="<?php echo $partnorlar; ?>">
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='productNames[]' value="<?php echo $mallar; ?>">
              <span class="form-control"><?php echo $mallar; ?></span>
            </td>
            <td>
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='models[]' value="<?php echo $modeller; ?>">
               <span class="form-control"><?php echo $modeller; ?></span>
            </td>
            <td>
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='serias[]' value="<?php echo $serialar; ?>">
              <span class="form-control"><?php echo $serialar; ?></span>
            </td>
            <td>
              <input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='prices[]' value="<?php echo $qiymetler ?>">
              <span class="form-control"><?php echo $qiymetler; ?></span>
            </td>
          </tr>
  <?php
      }
    }
  }

  if($serSizLen!=0)
  {
    $seriaSizArray=explode(",",$productDetails[1]);
    foreach($seriaSizArray as $seriaSiz)
    {
      $seriaSizExp=explode("**", $seriaSiz);
  ?>
          <tr>
            <td>
              <input class='form-control' type='checkbox' name='record'>
            </td>
            <td>
              <input class='form-control' name='partnors[]' type='hidden' value="<?php echo $seriaSizExp[0]; ?>">
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='productNames[]' value="<?php echo $seriaSizExp[1]; ?>">
              <span class="form-control"><?php echo $seriaSizExp[1]; ?></span>
            </td>
            <td>
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='models[]' value="<?php echo $seriaSizExp[2]; ?>">
              <span class="form-control"><?php echo $seriaSizExp[2]; ?></span>
            </td>
            <td>
              <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='serias[]' value="<?php echo $seriaSizExp[3]; ?>">
              <span class="form-control"><?php echo $seriaSizExp[3]; ?></span>
            </td>
            <td>
              <input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='prices[]' value="<?php echo $seriaSizExp[4] ?>">
              <span class="form-control"><?php echo $seriaSizExp[4]; ?></span>
            </td>
          </tr> 
  <?php
    }
  }
}
else
{
  ?>
        <tr>
          <td class="btn-danger" style="text-align: center;" colspan="5">Bu müqavilə artıq ləğv olunub</td>
        </tr>
  <?php
}
?>

        <tr>
          <td><label for="delivery">Təhvil <sup>*</sup></label></td>
          <td colspan="4">
            <span class="form-control">Təhvil verildi</span>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align: right;"><input type="submit" name="toSell" class="btn btn-primary" value="İane et"></td>
        </tr>
      </tbody>
    </table>
    </form>      
    </div>
</div>