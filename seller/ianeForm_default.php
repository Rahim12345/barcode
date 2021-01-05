<div class="card shadow mb-4">
    <div class="card-body">
    <form action="" method="POST">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;">
      <thead style="background-color: white;color:black;text-align: center;">
        <tr>
          <th colspan="5">MÜSTƏRİ MƏLUMATLARI</th>
        </tr>
      </thead>
      <tbody style="border: 2px solid black;color: black;">
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ALICI VƏ PASPORT MƏLUMATLARI</td>
        </tr>
        <tr>
          <td><label for="msaa">S.A.A : <sup>*</sup></label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4CreditDetails[0]["name"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mdt">DOĞUM TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["dogumTarixi"]; ?></span>
          </td>
          <td><label for="mc">CİNS :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["cins"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mdy">DOĞUM YERİ :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4Fin[0]["dogumYeri"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="ms">SERİYA № :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["seria"]; ?></span>
          </td>
          <td><label for="mpc">PİN-CODE :<sup>*</sup></label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["Pincode"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mqy">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :<sup>*</sup></label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4Fin[0]["qeydiyyatUnvan"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mvt">VERİLMƏ TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["verilmeTarixi"]; ?></span>
          </td>
          <td><label for="mbt">BİTMƏ TARİXİ : </label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["bitmeTarixi"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mvo">VEREN ORQAN :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["verenOrqan"]; ?></span>
          </td>
          <td><label for="mav">AİLƏ VƏZİYYƏTİ : </label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["aileVeziyyeti"]; ?></span>
          </td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">TELEFONLAR</td>
        </tr>
        <tr>
          <td><label for="mm1">MOBİL-1 :<sup>*</sup></label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["mobil1"]; ?></span>
          </td>
          <td><label for="mm2">MOBİL-2:</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["mobil2"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mm3">MOBİL-3 :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["mobil3"]; ?></span>
          </td>
          <td><label for="mev">EV :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["ev"]; ?></span>
          </td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">İŞ YERİ</td>
        </tr>
        <tr>
          <td><label for="mta">TƏŞKİLATIN ADI :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4Fin[0]["teskilatAdi"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mv">VƏZİFƏ:</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4Fin[0]["vezife"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="miy">İŞ YERİ ÜNVANI :</label></td>
           <td colspan="4">
             <span class="form-control"><?php echo $rows4Fin[0]["isYeriUnvani"]; ?></span>
           </td>
        </tr>
        <tr>
          <td><label for="meh">ƏMƏK HAQQI :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4Fin[0]["emekHaqqi"]; ?></span>
          </td>
          <td><label for="meg">ƏLAVƏ GƏLİR :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $rows4Fin[0]["elaveGelir"]; ?></span>
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
          <td></td><td></td><td></td><td></td><td>Cəm: <?php echo $rows4CreditDetails[0]["productPrice"]." AZN"; ?></td>
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
          <td><label for="mio">İLKİN ÖDƏNİŞ :<sup>*</sup></label></td>
          <td colspan="4">
            <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  id="mio" name="ilkinOdenis" placeholder="100" value="<?php echo $rows4CreditDetails[0]["firstPrice"]; ?>" class="form-control" style="border:1px solid black;" maxlength="5">
          </td>
        </tr>
        <tr>
          <td><label for="mikt">İlk Kredit tarixi :<sup>*</sup></label></td>
          <td colspan="4">
            <?php  
            $creditTable=$rows4CreditDetails[0]["creditTable"];
            $creditTable=explode(",", $creditTable);
            ?>
            <span class="form-control"><?php echo $creditTable[0]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mkm">KREDİT MÜDDƏTİ :<sup>*</sup></label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4CreditDetails[0]["countMonth"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mz">Zəmanət :</label></td>
          <td>
            <span class="form-control"><?php echo $rows4CreditDetails[0]["zemanet"]; ?></span>
          </td>
          <td colspan="3">zəmanət malın alındığı gündən etibarən qüvvəyə minir.</td>
        </tr>
        
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ZAMİN-1</td>
        </tr>
<?php  
$zamin1=$rows4CreditDetails[0]["zamin1"];
$zamin1=explode("**", $zamin1);
?>
        <tr>
          <td><label for="zsaa1">S.A.A :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin1[0]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zdt1">DOĞUM TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin1[1]; ?></span>
          </td>
          <td><label for="zc1">CİNS :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin1[2]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zdy1">DOĞUM YERİ :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin1[3]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zs1">SERİYA № :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin1[4]; ?></span>
          </td>
          <td><label for="zpc1">PİN-CODE :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin1[5]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zqy1">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin1[6]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zvt1">VERİLMƏ TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin1[7]; ?></span>
          </td>
          <td><label for="zbt1">BİTMƏ TARİXİ : </label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin1[8]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="ziy1">İŞ YERİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin1[9]; ?></span>
          </td>
          <td><label for="zeh1">Ə/H:</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin1[10]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zm1">MOBİL-1</label></td>
          <td>
            <span class="form-control"><?php echo $zamin1[11]; ?></span>
          </td>
          <td><label for="zm2">MOBİL-2</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin1[12]; ?></span>
          </td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ZAMİN-2</td>
        </tr>
<?php  
$zamin2=$rows4CreditDetails[0]["zamin2"];
$zamin2=explode("**", $zamin2);
?>
        <tr>
          <td><label for="zsaa1">S.A.A :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin2[0]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zdt1">DOĞUM TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin2[1]; ?></span>
          </td>
          <td><label for="zc1">CİNS :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin2[2]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zdy1">DOĞUM YERİ :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin2[3]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zs1">SERİYA № :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin2[4]; ?></span>
          </td>
          <td><label for="zpc1">PİN-CODE :</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin2[5]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zqy1">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $zamin2[6]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zvt1">VERİLMƏ TARİXİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin2[7]; ?></span>
          </td>
          <td><label for="zbt1">BİTMƏ TARİXİ : </label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin2[8]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="ziy1">İŞ YERİ :</label></td>
          <td>
            <span class="form-control"><?php echo $zamin2[9]; ?></span>
          </td>
          <td><label for="zeh1">Ə/H:</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin2[10]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="zm1">MOBİL-1</label></td>
          <td>
            <span class="form-control"><?php echo $zamin2[11]; ?></span>
          </td>
          <td><label for="zm2">MOBİL-2</label></td>
          <td colspan="2">
            <span class="form-control"><?php echo $zamin2[12]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="delivery">Təhvil <sup>*</sup></label></td>
          <td colspan="4">
            <span class="form-control"><?php echo "Təhvil verildi"; ?></span>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align: right;"><input type="submit" name="toCredit" class="btn btn-primary" value="İanə et"></td>
        </tr>
      </tbody>
    </table>
    </form>      
    </div>
</div>