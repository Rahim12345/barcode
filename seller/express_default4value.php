<div class="card shadow mb-4">
    <div class="card-body">
      <p style="background-color: orange;border-top-right-radius: 10px;border-top-left-radius: 10px;color:white;padding-left: 15px;font-size: 4vh;">
        <?php echo $crederr ?>
      </p>
    <form action="" method="POST">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;">
      <thead style="background-color: white;color:black;text-align: center;">
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
          <td colspan="4"><input type="text" id="musteriSAA" name="musteriSAA" placeholder="SÜLEYMANOV RAHİM CAMAL" value="<?php if(!empty($musteriSAA)){ echo $musteriSAA;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="musteriADRR">Ünvan : </label></td>
          <td colspan="4"><input type="text" id="musteriADRR" name="musteriADRR" placeholder="SAATLI RAY.,ƏHMƏDBƏYLİ K" value="<?php if(!empty($musteriADRR)){ echo $musteriADRR;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="musteriTel">Telefon nömrəsi : </label></td>
          <td colspan="4"><input type="text" id="musteriTel" name="musteriTel" placeholder="055-555-55-55,077-777-77-77" value="<?php if(!empty($musteriTel)){ echo $musteriTel;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="timer">Ödəniləcək gün<sup>*</sup> <br> (Məs:10 gün sonra) : </label></td>
          <td colspan="4"><input type="text" id="timer" name="timer" placeholder="10" value="<?php if($timer!=""){ echo $timer;} ?>" class="form-control" style="border:1px solid black;" maxlength="2"></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">MƏHSUL VƏ QİYMƏT</td>
        </tr>
        <tr>
          <td><label for="partnorAdi">PARTNYOR<sup>*</sup></label></td>
          <td colspan="4">
            <input type="text" id="partnorAdi" name="partnorAdi" placeholder="Partnyor axtar..." class="form-control" style="border:1px solid black;" maxlength="20" autocomplete="off">
            <div id="resultP"></div>
          </td>
        </tr>
        <tr>
          <td><label for="mma">MALIN ADI<sup>*</sup></label></td>
          <td><input type="text" id="mma" name="malinAdi" placeholder="İstehsalçı axtar..." class="form-control" style="border:1px solid black;" maxlength="20" autocomplete="off">
            <div id="resultY"></div>
          </td>
          <td><label for="mmk">KODU<sup>*</sup></label></td>
          <td colspan="2">
            <input type="text" id="modelX" name="modelX" placeholder="Model axtar..." class="form-control" style="border:1px solid black;" maxlength="50" autocomplete="off">
            <div id="resultX"></div>
          </td>
        </tr>
        <tr>
          <td><label for="msn">SERİYA № :</label></td>
          <td colspan="4">
            <select class="custom-select my-1 mr-sm-2" id="seria" name="seria" >
              <option value="" selected>
                Seria seçin
              </option>
              
            </select>
            <div id="resultSS"></div>
          </td>
        </tr>
        <tr>
          <td><label for="Nmmq">MALIN QİYMƏTİ :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="Nmmq" name="malinQiymeti" placeholder="700" class="form-control" style="border:1px solid black;" maxlength="5"><p id="priceDemo2"></p></td>
        </tr>
        <tr id="qwe">
          <td></td>
          <td></td>
          <td><input type="button" class="reset-row2 btn btn-info" value="SIFIRLA"></td>
          <td style="text-align: right;"><input type="button" class="add-row2 btn btn-primary" value="ƏLAVƏ ET"></td>
          <td style="text-align: right;"><input type="button" class="delete-row2 btn btn-danger" value="SİL"></td>
        </tr>

<?php  
$malinQiymeti=0;
foreach($qiymetler as $qiymet)
{
  if(is_numeric($qiymet) && $qiymet>0)
  {
    $malinQiymeti+=$qiymet;
  }
}
?>
        <tr id ='total'><td></td><td></td><td></td><td></td><td>Cəm: <?php echo $malinQiymeti." AZN"; ?></td></tr>
<?php  
$sayPartnors=count($partnorlar);
if($sayPartnors!=0)
{
  for($i=0;$i<$sayPartnors;$i++)
  {
    ?>
        <tr>
          <td>
            <input class='form-control' type='checkbox' name='record'>
          </td>
          <td>
            <input class='form-control' name='partnors[]' type='hidden' value="<?php echo $partnorlar[$i] ?>">
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='productNames[]' value="<?php echo $mallar[$i] ?>">
            <span class="form-control" style="font-size: 1vw;"><?php echo $mallar[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='models[]' value="<?php echo $modeller[$i] ?>">
            <span class="form-control" style="font-size: 1vw;"><?php echo $modeller[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='serias[]' value="<?php echo $serialar[$i] ?>">
            <span class="form-control" style="font-size: 1vw;"><?php echo $serialar[$i]; ?></span>
          </td>
          <td>
            <input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='prices[]' value="<?php echo $qiymetler[$i] ?>">
            <span class="form-control" style="font-size: 1vw;"><?php echo $qiymetler[$i]; ?></span>
          </td>
        </tr>
    <?php
  }
}

?>

        <tr>
          <td><label for="delivery">Təhvil <sup>*</sup></label></td>
          <td colspan="4">
            <select name="delivery" class="form-control" id="delivery">
              <option value="">Birini seçin</option>
            <?php
              if($delivery=="1")
              {
                ?>
                <option value="1" selected="selected">Təhvil verildi</option>
                <option value="2">Göndəriləcək</option>
                <?php
              }
              elseif($delivery=="2")
              {
                  ?>
                <option value="1">Təhvil verildi</option>
                <option value="2" selected="selected">Göndəriləcək</option>
                  <?php
              }
              else
              {
                ?>
                <option value="1">Təhvil verildi</option>
                <option value="2">Göndəriləcək</option>
                <?php
              }
            ?>
              
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align: right;"><input type="submit" name="toSell" class="btn btn-primary" value="Satış et"></td>
        </tr>
      </tbody>
    </table>
    </form>      
    </div>
</div>