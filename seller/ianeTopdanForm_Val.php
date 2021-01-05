<div class="card shadow mb-4">
    <div class="card-body">
    <form action="" method="POST">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;">
      <p style="background-color: orange;line-height: 40px;padding-left: 20px;border-top-right-radius: 10px;border-top-left-radius: 10px;text-align: center;color:white;font-size: 3vh;">
        <?php  
        if(!empty($crederr))
        {
          echo $crederr;
        }
        ?>
      </p>
      <thead style="background-color: white;color:black;text-align: center;">
        <tr style="background-color: green;color:white;">
          <th colspan="5">TOPDAN SATIŞ</th>
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
<?php  
$malinQiymeti=0;
if(isset($_POST["partnors"]))
{
  foreach($qiymetler as $qiymet)
  {
    if(is_numeric($qiymet) && $qiymet>0)
    {
      $malinQiymeti+=$qiymet;
    }
  }
}
?>
        <tr id ='total'>
          <td></td><td></td><td></td><td></td><td><?php  if($malinQiymeti!=0){ echo "Cəm: ".$malinQiymeti." AZN"; } ?></td>
        </tr>
     
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
            <span class="form-control"><?php echo $mallar[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='models[]' value="<?php echo $modeller[$i] ?>">
            <span class="form-control"><?php echo $modeller[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='serias[]' value="<?php echo $serialar[$i] ?>">
            <span class="form-control"><?php echo $serialar[$i]; ?></span>
          </td>
          <td>
            <input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='prices[]' value="<?php echo $qiymetler[$i] ?>">
            <span class="form-control"><?php echo $qiymetler[$i]; ?></span>
          </td>
        </tr>
    <?php
  }
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