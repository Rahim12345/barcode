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
        <tr>
          <th colspan="5">MÜSTƏRİ MƏLUMATLARI</th>
        </tr>
      </thead>
      <tbody style="border: 2px solid black;color: black;">
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ALICI VƏ PASPORT MƏLUMATLARI</td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="msaa">S.A.A : <sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="msaa" name="musteriSAA" placeholder="SÜLEYMANOV RAHİM CAMAL" value="<?php if(!empty($musteriSAA)){echo $musteriSAA;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="mdt">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="mdt" name="musteriDogumTarixi" placeholder="18.02.1994" value="<?php if(!empty($musteriDogumTarixi)){echo $musteriDogumTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="mc">CİNS :</label></td>
          <td colspan="2"><input type="text" id="mc" name="musteriCins" placeholder="KİŞİ" value="<?php if(!empty($musteriCins)){echo $musteriCins;} ?>"  class="form-control" style="border:1px solid black;" maxlength="10"></td>
        </tr>
        <tr>
          <td><label for="mdy">DOĞUM YERİ :</label></td>
          <td colspan="4"><input type="text" id="mdy" name="musteriDogumYeri" placeholder="SAATLI RAY.,ƏHMƏDBƏYLİ K" value="<?php if(!empty($musteriDogumYeri)){echo $musteriDogumYeri;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="ms">SERİYA № :</label></td>
          <td><input type="text" id="ms" name="musteriSeria" placeholder="AZE12345678" value="<?php if(!empty($musteriSeria)){echo $musteriSeria;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td class="bg-danger"><label for="mpc">PİN-CODE :<sup>*</sup></label></td>
          <td colspan="2"><input type="text" id="mpc" name="musteriPinCode" placeholder="6OF7OY8" value="<?php if(!empty($musteriPinCode)){echo $musteriPinCode;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="mqy">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="mqy" name="musteriQeydUnvani" placeholder="SAATLI RAY.,ƏHMƏDBƏYLİ K" value="<?php if(!empty($musteriQeydUnvani)){echo $musteriQeydUnvani;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="mvt">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="mvt" name="musteriVerilmeTaixi" placeholder="20.05.2019" value="<?php if(!empty($musteriVerilmeTaixi)){echo $musteriVerilmeTaixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="mbt">BİTMƏ TARİXİ : </label></td>
          <td colspan="2"><input type="text" id="mbt" name="musteriBitmeTarixi" placeholder="20.05.2029" value="<?php if(!empty($musteriBitmeTarixi)){echo $musteriBitmeTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
        </tr>
        <tr>
          <td><label for="mvo">VEREN ORQAN :</label></td>
          <td><input type="text" id="mvo" name="musteriVerenOrqan" placeholder="SAATLI RPŞ" value="<?php if(!empty($musteriVerenOrqan)){echo $musteriVerenOrqan;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td><label for="mav">AİLƏ VƏZİYYƏTİ : </label></td>
          <td colspan="2"><input type="text" id="mav" name="musteriAlieVez" placeholder="SUBAY" value="<?php if(!empty($musteriAlieVez)){echo $musteriAlieVez;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">TELEFONLAR</td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="mm1">MOBİL-1 :<sup>*</sup></label></td>
          <td><input type="text" id="mm1" name="musteriMobil1" placeholder="055-555-55-55" value="<?php if(!empty($musteriMobil1)){echo $musteriMobil1;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
          <td><label for="mm2">MOBİL-2:</label></td>
          <td colspan="2"><input type="text" id="mm2" name="musteriMobil2" placeholder="077-777-77-77" value="<?php if(!empty($musteriMobil2)){echo $musteriMobil2;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr>
          <td><label for="mm3">MOBİL-3 :</label></td>
          <td><input type="text" id="mm3" name="musteriMobil3" placeholder="050-500-00-00" value="<?php if(!empty($musteriMobil3)){echo $musteriMobil3;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
          <td><label for="mev">EV :</label></td>
          <td colspan="2"><input type="text" id="mev" name="musteriEv" placeholder="0212852612" value="<?php if(!empty($musteriEv)){echo $musteriEv;} ?>" class="form-control" style="border:1px solid black;" maxlength="20" ></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">İŞ YERİ</td>
        </tr>
        <tr>
          <td><label for="mta">TƏŞKİLATIN ADI :</label></td>
          <td colspan="4"><input type="text" id="mta" name="musteriTeskAdi" placeholder="XXXX MMC" value="<?php if(!empty($musteriTeskAdi)){echo $musteriTeskAdi;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="mv">VƏZİFƏ:</label></td>
          <td colspan="4"><input type="text" id="mv" name="musteriVezife" placeholder="XXXX" value="<?php if(!empty($musteriVezife)){echo $musteriVezife;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="miy">İŞ YERİ ÜNVANI :</label></td>
           <td colspan="4"><input type="text" id="miy" name="musteriIsYeriUnvani" placeholder="M.QAŞQAY KÜÇ.,..." value="<?php if(!empty($musteriIsYeriUnvani)){echo $musteriIsYeriUnvani;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="meh">ƏMƏK HAQQI :</label></td>
          <td><input type="text" id="meh" name="musteriEmekHaqq" placeholder="1234" value="<?php if(!empty($musteriEmekHaqq)){echo $musteriEmekHaqq;} ?>" class="form-control" style="border:1px solid black;" maxlength="6"></td>
          <td><label for="meg">ƏLAVƏ GƏLİR :</label></td>
          <td colspan="2"><input type="text" id="meg" name="musteriElaveGelir" placeholder="123" value="<?php if(!empty($musteriElaveGelir)){echo $musteriElaveGelir;} ?>" class="form-control" style="border:1px solid black;" maxlength="6"></td>
        </tr>
        
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">MƏHSUL VƏ QİYMƏT</td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="partnorAdi">PARTNYOR<sup>*</sup></label></td>
          <td colspan="4">
            <input type="text" id="partnorAdi" name="partnorAdi" placeholder="Partnyor axtar..." class="form-control" style="border:1px solid black;" maxlength="20" autocomplete="off">
            <div id="resultP"></div>
          </td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="mma">MALIN ADI<sup>*</sup></label></td>
          <td><input type="text" id="mma" name="malinAdi" placeholder="İstehsalçı axtar..." class="form-control" style="border:1px solid black;" maxlength="20" autocomplete="off">
            <div id="resultY"></div>
          </td>
          <td class="bg-danger"><label for="mmk">KODU<sup>*</sup></label></td>
          <td colspan="2">
            <input type="text" id="modelX" name="modelX" placeholder="Model axtar..." class="form-control" style="border:1px solid black;" autocomplete="off" maxlength="50">
            <div id="resultX"></div>
          </td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="msn">SERİYA № : <sup>*</sup></label></td>
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
          <td class="bg-danger"><label for="mmq">MALIN QİYMƏTİ :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="mmq" name="malinQiymeti" placeholder="700" class="form-control" style="border:1px solid black;" maxlength="5"><p id="priceDemo"></p></td>
        </tr>
        <tr id="qwe">
          <td></td>
          <td></td>
          <td><input type="button" class="reset-row btn btn-info" value="SIFIRLA"></td>
          <td style="text-align: right;"><input type="button" class="add-row btn btn-primary" value="ƏLAVƏ ET"></td>
          <td style="text-align: right;"><input type="button" class="delete-row btn btn-danger" value="SİL"></td>
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
            <span style="font-size:1vw;" class="form-control"><?php echo $mallar[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='models[]' value="<?php echo $modeller[$i] ?>">
            <span style="font-size:1vw;" class="form-control"><?php echo $modeller[$i]; ?></span>
          </td>
          <td>
            <input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='serias[]' value="<?php echo $serialar[$i] ?>">
            <span style="font-size:1vw;" class="form-control"><?php echo $serialar[$i] ?></span>
          </td>
          <td>
            <input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;' type='hidden' name='prices[]' value="<?php echo $qiymetler[$i] ?>">
            <span style="font-size:1vw;" class="form-control"><?php echo $qiymetler[$i]; ?></span>
          </td>
        </tr>
    <?php
  }
}

?>
        

        <tr>
          <td class="bg-danger"><label for="mio">İLKİN ÖDƏNİŞ :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="mio" name="ilkinOdenis" placeholder="100" value="<?php echo $ilkinOdenis; ?>" class="form-control" style="border:1px solid black;" maxlength="5"></td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="mikt">İlk Kredit tarixi :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="mikt" name="ilkinKreditTarixi" placeholder="31.02.2020" value="<?php if(!empty($ilkinKreditTarixi)){ echo $ilkinKreditTarixi; } ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="mkm">KREDİT MÜDDƏTİ :<sup>*</sup></label></td>
          <td colspan="4"><input type="text" id="mkm" name="kreditMuddeti" placeholder="12" value="<?php echo $kreditMuddeti; ?>" class="form-control" style="border:1px solid black;" maxlength="2"></td>
        </tr>
        <tr>
          <td><label for="mz">Zəmanət :</label></td>
          <td><input type="text" name="zemanet" id="mz" placeholder="6 ay" value="<?php if(!empty($zemanet)){ echo $zemanet;} ?>" class="form-control" style="border:1px solid black;" maxlength="5"></td>
          <td colspan="3">zəmanət malın alındığı gündən etibarən qüvvəyə minir.</td>
        </tr>

        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ZAMİN-1</td>
        </tr>
        <tr>
          <td><label for="zsaa1">S.A.A :</label></td>
          <td colspan="4"><input type="text" id="zsaa1" name="z1SAA" placeholder="İSAYEV NİCAT CABİR" value="<?php if(!empty($z1SAA)){echo $z1SAA;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zdt1">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="zdt1" name="z1DogumTarixi" placeholder="14.08.1990" value="<?php if(!empty($z1DogumTarixi)){echo $z1DogumTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="zc1">CİNS :</label></td>
          <td colspan="2"><input type="text" id="zc1" name="z1Cins" placeholder="KİŞİ" value="<?php if(!empty($z1Cins)){echo $z1Cins;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr>
          <td><label for="zdy1">DOĞUM YERİ :</label></td>
          <td colspan="4"><input type="text" id="zdy1" name="z1DogumYeri" placeholder="SAATLI RAY.,..." value="<?php if(!empty($z1DogumYeri)){echo $z1DogumYeri;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zs1">SERİYA № :</label></td>
          <td><input type="text" id="zs1" name="z1Seriya" placeholder="AZE12345678" value="<?php if(!empty($z1Seriya)){echo $z1Seriya;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td><label for="zpc1">PİN-CODE :</label></td>
          <td colspan="2"><input type="text" id="zpc1" name="z1PinCode" placeholder="4OX7OL9" value="<?php if(!empty($z1PinCode)){echo $z1PinCode;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zqy1">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="4"><input type="text" id="zqy1" name="z1QeydUnvan" placeholder="SAATLI RAY.,..." value="<?php if(!empty($z1QeydUnvan)){echo $z1QeydUnvan;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zvt1">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="zvt1" name="z1VerilmeTarixi" placeholder="14.08.2015" value="<?php if(!empty($z1VerilmeTarixi)){echo $z1VerilmeTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="zbt1">BİTMƏ TARİXİ : </label></td>
          <td colspan="2"><input type="text" id="zbt1" name="z1BitmeTarixi" placeholder="29.05.2029" value="<?php if(!empty($z1BitmeTarixi)){echo $z1BitmeTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
        </tr>
        <tr>
          <td><label for="ziy1">İŞ YERİ :</label></td>
          <td><input type="text" id="ziy1" name="z1IsYeri" placeholder="XXXX MMC" value="<?php if(!empty($z1IsYeri)){echo $z1IsYeri;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td><label for="zeh1">Ə/H:</label></td>
          <td colspan="2"><input type="text" id="zeh1" name="z1EH" placeholder="500" value="<?php if(!empty($z1EH)){echo $z1EH;} ?>" class="form-control" style="border:1px solid black;" maxlength="6"></td>
        </tr>
        <tr>
          <td><label for="zm1">MOBİL-1</label></td>
          <td><input type="text" id="zm1" name="z1Mobil1" placeholder="055-555-55-55" value="<?php if(!empty($z1Mobil1)){echo $z1Mobil1;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
          <td><label for="zm2">MOBİL-2</label></td>
          <td colspan="2"><input type="text" id="zm2" name="z1Mobil2" placeholder="077-777-77-77" value="<?php if(!empty($z1Mobil2)){echo $z1Mobil2;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">ZAMİN-2</td>
        </tr>
        <tr>
          <td><label for="zsaa2">S.A.A :</label></td>
          <td colspan="4"><input type="text" id="zsaa2" name="z2SAA" placeholder="ƏLİYEV ELÇİN TAHİR" value="<?php if(!empty($z2SAA)){echo $z2SAA;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zdt2">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="zdt2" name="z2DogumTarixi" placeholder="19.06.2000" value="<?php if(!empty($z2DogumTarixi)){echo $z2DogumTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="zc2">CİNS :</label></td>
          <td colspan="2"><input type="text" id="zc2" name="z2Cins" placeholder="KİŞİ" value="<?php if(!empty($z2Cins)){echo $z2Cins;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr>
          <td><label for="zdy2">DOĞUM YERİ :</label></td>
          <td colspan="4"><input type="text" id="zdy2" name="z2DogumYeri" placeholder="SAATLI RAY.,..." value="<?php if(!empty($z2DogumYeri)){echo $z2DogumYeri;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zs2">SERİYA № :</label></td>
          <td><input type="text" id="zs2" name="z2Seriya" placeholder="AZE12345678" value="<?php if(!empty($z2Seriya)){echo $z2Seriya;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td><label for="zpc2">PİN-CODE :</label></td>
          <td colspan="2"><input type="text" id="zpc2" name="z2PinCode" placeholder="5Q3ER45" value="<?php if(!empty($z2PinCode)){echo $z2PinCode;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zqy2">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="4"><input type="text" id="zqy2" name="z2QeydUnvan" placeholder="SAATLI RAY.," value="<?php if(!empty($z2QeydUnvan)){echo $z2QeydUnvan;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
        </tr>
        <tr>
          <td><label for="zvt2">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="zvt2" name="z2VerilmeTarixi" placeholder="14.05.2009" value="<?php if(!empty($z2VerilmeTarixi)){echo $z2VerilmeTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
          <td><label for="zbt2">BİTMƏ TARİXİ :</label></td>
          <td colspan="2"><input type="text" id="zbt2" name="z2BitmeTarixi" placeholder="14.05.2025" value="<?php if(!empty($z2BitmeTarixi)){echo $z2BitmeTarixi;} ?>" class="form-control" style="border:1px solid black;" maxlength="10"></td>
        </tr>
        <tr>
          <td><label for="ziy2">İŞ YERİ :</label></td>
          <td><input type="text" id="ziy2" name="z2IsYeri" placeholder="XXXX MMC" value="<?php if(!empty($z2IsYeri)){echo $z2IsYeri;} ?>" class="form-control" style="border:1px solid black;" maxlength="50"></td>
          <td><label for="zeh2">Ə/H:</label></td>
          <td colspan="2"><input type="text" id="zeh2" name="z2Eh" placeholder="1234" value="<?php if(!empty($z2Eh)){echo $z2Eh;} ?>" class="form-control" style="border:1px solid black;" maxlength="6"></td>
        </tr>
        <tr>
          <td><label for="zm12">MOBİL-1</label></td>
          <td><input type="text" id="zm12" name="z2Mobil1" placeholder="055-555-55-55" value="<?php if(!empty($z2Mobil1)){echo $z2Mobil1;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
          <td><label for="zm22">MOBİL-2</label></td>
          <td colspan="2"><input type="text" id="zm22" name="z2Mobil2" placeholder="077-777-77-77" value="<?php if(!empty($z2Mobil2)){echo $z2Mobil2;} ?>" class="form-control" style="border:1px solid black;" maxlength="20"></td>
        </tr>
        <tr>
          <td class="bg-danger"><label for="delivery">Təhvil <sup>*</sup></label></td>
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
          <td style="text-align: right;"><input type="submit" name="toCredit" class="btn btn-primary" value="Kreditləşdir"></td>
        </tr>
      </tbody>
    </table>
    </form>      
    </div>
</div>