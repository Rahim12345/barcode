<div class="card shadow mb-4">
    <div class="py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="back" style="padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
    </h6>
    <br>
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
      <button class="btn btn-primary" onclick="prinTorder();">Çapa hazırla</button>
    </h6>
    <button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
  </div>
    <div class="card-body">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;page-break-before: always;">
      <thead style="background-color: white;color:black;text-align: center;">
        <tr>
          <th colspan="4">MÜSTƏRİ MƏLUMATLARI</th>
        </tr>
      </thead>
      <tbody style="border: 2px solid black;color: black;">
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">ALICI VƏ PASPORT MƏLUMATLARI</td>
        </tr>
        <tr>
          <td><label for="msaa">S.A.A : <sup>*</sup></label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["SAA"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mdt">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["dogumTarixi"]; ?>" disabled=""></td>
          <td><label for="mc">CİNS :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["cins"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mdy">DOĞUM YERİ :</label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["dogumYeri"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="ms">SERİYA № :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["seria"]; ?>" disabled=""></td>
          <td><label for="mpc">PİN-CODE :<sup>*</sup></label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["Pincode"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mqy">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :<sup>*</sup></label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["qeydiyyatUnvan"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mvt">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["verilmeTarixi"]; ?>" disabled=""></td>
          <td><label for="mbt">BİTMƏ TARİXİ : </label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["bitmeTarixi"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mvo">VEREN ORQAN :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["verenOrqan"]; ?>" disabled=""></td>
          <td><label for="mav">AİLƏ VƏZİYYƏTİ : </label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["aileVeziyyeti"]; ?>" disabled=""></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">TELEFONLAR</td>
        </tr>
        <tr>
          <td><label for="mm1">MOBİL-1 :<sup>*</sup></label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["mobil1"]; ?>" disabled=""></td>
          <td><label for="mm2">MOBİL-2:</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["mobil2"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mm3">MOBİL-3 :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["mobil3"]; ?>" disabled=""></td>
          <td><label for="mev">EV :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["ev"]; ?>" disabled=""></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">İŞ YERİ</td>
        </tr>
        <tr>
          <td><label for="mta">TƏŞKİLATIN ADI :</label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["teskilatAdi"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mv">VƏZİFƏ:</label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["vezife"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="miy">İŞ YERİ ÜNVANI :</label></td>
           <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["isYeriUnvani"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="meh">ƏMƏK HAQQI :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["emekHaqqi"]; ?>" disabled=""></td>
          <td><label for="meg">ƏLAVƏ GƏLİR :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4DebitFin[0]["elaveGelir"]; ?>" disabled=""></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">MƏHSUL VƏ QİYMƏT</td>
        </tr>
        <tr>
          <td><label for="mma">MALIN ADI<sup>*</sup></label></td>
          <td colspan="3">
            <span class="form-control" style="border-radius: 0;border:none;background-color: white;"><?php echo $satılan_malın_adı; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="mmq">MALIN QİYMƏTİ :<sup>*</sup></label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4SeriaMid[0]["productPrice"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mio">İLKİN ÖDƏNİŞ :<sup>*</sup></label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4SeriaMid[0]["firstPrice"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mkm">KREDİT MÜDDƏTİ :<sup>*</sup></label></td>
          <td colspan="3"><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4SeriaMid[0]["countMonth"]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="mz">Zəmanət :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $rows4SeriaMid[0]["zemanet"]; ?>" disabled=""></td>
          <td colspan="2">zəmanət malın alındığı gündən etibarən qüvvəyə minir.</td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">ZAMİN-1</td>
        </tr>
        <tr>
          <td><label for="zsaa1">S.A.A :</label></td>
          <td colspan="3">
            <span class="form-control" style="border:none;border-radius: 0;border-bottom:1px solid black;">
              <?php echo $zamiN1[0]; ?>
            </span>
          </td>
        </tr>
        <tr>
          <td><label for="zdt1">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="zdt1"  class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white; " value="<?php echo $zamiN1[1]; ?>" disabled=""></td>
          <td><label for="zc1">CİNS :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[2]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zdy1">DOĞUM YERİ :</label></td>
          <td colspan="3"><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[3]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zs1">SERİYA № :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[4]; ?>" disabled=""></td>
          <td><label for="zpc1">PİN-CODE :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[5]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zqy1">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="3"><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[6]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zvt1">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[7]; ?>" disabled=""></td>
          <td><label for="zbt1">BİTMƏ TARİXİ : </label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[8]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="ziy1">İŞ YERİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[9]; ?>" disabled=""></td>
          <td><label for="zeh1">Ə/H:</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[10]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zm1">MOBİL-1</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[11]; ?>" disabled=""></td>
          <td><label for="zm2">MOBİL-2</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN1[12]; ?>" disabled=""></td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="4">ZAMİN-2</td>
        </tr>
        <tr>
          <td><label for="zsaa2">S.A.A :</label></td>
          <td colspan="3"><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[0]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zdt2">DOĞUM TARİXİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[1]; ?>" disabled=""></td>
          <td><label for="zc2">CİNS :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[3]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zdy2">DOĞUM YERİ :</label></td>
          <td colspan="3"><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[2]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zs2">SERİYA № :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[4]; ?>" disabled=""></td>
          <td><label for="zpc2">PİN-CODE :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[5]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zqy2">QEYDİYYAT VƏ YAŞAYIŞ ÜNVANI :</label></td>
          <td colspan="3"><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[6]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zvt2">VERİLMƏ TARİXİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[7]; ?>" disabled=""></td>
          <td><label for="zbt2">BİTMƏ TARİXİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[8]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="ziy2">İŞ YERİ :</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[9]; ?>" disabled=""></td>
          <td><label for="zeh2">Ə/H:</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[10]; ?>" disabled=""></td>
        </tr>
        <tr>
          <td><label for="zm12">MOBİL-1</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[11]; ?>" disabled=""></td>
          <td><label for="zm22">MOBİL-2</label></td>
          <td><input type="text" id="zc1" name="z1Cins" class="form-control" style="border-radius: 0;border:none;border-bottom:1px solid black;background-color: white;" maxlength="20" value="<?php echo $zamiN2[12]; ?>" disabled=""></td>
        </tr>
      </tbody>
    </table>
    </div>
</div>