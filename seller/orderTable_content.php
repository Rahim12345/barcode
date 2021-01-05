<?php  
$fin=$rows4SeriaCid[0]["fin"];
$query4ClientInfo=$conn->prepare("SELECT * FROM regular WHERE Pincode=?");
$query4ClientInfo->execute([$fin]);
$rows4ClientInfo=$query4ClientInfo->fetchall(PDO::FETCH_ASSOC);
$count4ClientInfo=count($rows4ClientInfo);
if($count4ClientInfo==0)
{
  echo $fin." müstəri tapılmadı";
}
else
{
  $telno=$rows4ClientInfo[0]["mobil1"];
  $unvan=$rows4ClientInfo[0]["qeydiyyatUnvan"];
  $productDetails=$rows4SeriaCid[0]["productDetails"];
  include 'openDetails.php';
}
?>
<div class="mb-4" style="font-size: 10px;">
  <div class="py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="back" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
      <a href="index.php?id=6" style="color: white;">&lt|Geri dön</a>
    </h6>
    <br>
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;text-align: center;color: white;">
      <button class="btn btn-primary" onclick="prinTorder();">Çapa hazırla</button>
    </h6>
    <button class="btn btn-primary" onclick="window.print();" style="display: none;" id="print-btn" onmouseout ="printTorder2();">Çap et</button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Soyad,Ad,Ata adı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["name"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="telno" class="col-sm-2 col-form-label">Telefon nömrəsi <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $telno; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="unvan" class="col-sm-2 col-form-label">Qeydiyyatda olduğu ünvan <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $unvan; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productName" class="col-sm-2 col-form-label">Məhsulun adı<sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-radius: 0px;color: black;font-size:10px;"><?php echo $satılan_malın_adı; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="productPrice" class="col-sm-2 col-form-label">Məhsulun qiyməti (AZN) <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["productPrice"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="firstPrice" class="col-sm-2 col-form-label">İlkin ödəniş(AZN) <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["firstPrice"]; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="firstPrice" class="col-sm-2 col-form-label">Dəbbə faizi <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["debbe"]."%"; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="sellerTime" class="col-sm-2 col-form-label">Məhsulun satıldığı tarix <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["realTime"]; ?></span>
      </div>
    </div>   
    <div class="form-group row">
      <label for="sellerTime" class="col-sm-2 col-form-label">Satıcı <sup>*</sup></label>
      <div class="col-sm-10">
        <span class="form-control" style="border:none;border-bottom: 1px solid black;border-radius: 0px;color: black;font-size:10px;"><?php echo $rows4SeriaCid[0]["seller"]; ?></span>
      </div>
    </div>  
    <table class="table table-striped" style="width: 100%;color:black;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Aylar</th>
          <th scope="col">Ödəniləcək məbləğ(AZN)</th>
          <th scope="col">Qalıq məbləğ(AZN)</th>
        </tr>
      </thead>
      <tbody class="tbody-light">
        <?php  
        $Creditmonths=explode(",", $rows4SeriaCid[0]["creditTable"]);
        $m=1;
          foreach($Creditmonths as $Creditmonth)
          {
            ?>
            <tr>
              <td><?php echo $Creditmonth; ?></td>
              <td><?php echo round($rows4SeriaCid[0]["avaragePay"],2); ?></td>
              <td><?php echo round($rows4SeriaCid[0]["remindMoney"],2)-round($m*$rows4SeriaCid[0]["avaragePay"],2); ?></td>
            </tr>
            <?php
            $m++;
          }
        ?>
        <tr style="background-color: #5A5C69;color:black;font-weight:bold;border-bottom: 3px solid black;">
          <td>Qalıq borc&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo $rows4SeriaCid[0]["remindMoney"]; ?></td>
          <td></td>
        </tr>
         <tr style="background-color: #5A5C69;color:black;font-weight:bold;">
          <td>İlk dəbbə tarixi&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>
            <?php 
            $creditTable=$rows4SeriaCid[0]["creditTable"];
            $creditTable=explode(",", $creditTable);
            echo $creditTable[0];
            ?>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>


<?php  
$query4Fin=$conn->prepare("SELECT * FROM regular WHERE Pincode=?");
$query4Fin->execute([$fin]);
$rows4Fin=$query4Fin->fetchall(PDO::FETCH_ASSOC);

$productDetails=$rows4SeriaCid[0]["productDetails"];

include 'openDetails.php';



?>
    <table class="table table-striped" style="width: 100%;color:black;page-break-before: always;">
      <tbody class="tbody-light" style="background-color: white;">
        <tr></tr>
      <tr>
          <td colspan="3" style="font-size: 15px;font-family: times new roman">
            <br><br>
<h6 style="text-align: center;"><b>MÜQAVİLƏ</b></h6>
<p style="text-align: center;">(Məişət malllarının nisiyə alqı-satqısı və girovu haqqında)</p>  
<p  style="text-align: center;">
<span style="text-align: left;">Saatlı şəhəri 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> 
<span style="text-align: right;">TARIX:  <?php echo $rows4SeriaCid[0]["sellerTime"] ?></span>  
</p>   

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAzərbaycan  Respublikasının   qanunvericiliyi  və    qanunları  əsasında   fəaliyyət        göstərən,bundan   sonra    “Satıcı”   adlanacaq      “BARCODE  mağazasının”    ın     drektoru  Məmmədov  Vüsal Əbülfət  oğlu   şəxsində  bir  tərəfdən  və  Azərbaycan  Respublikasının      vətəndaşı,  bundan  sonra  “Alıcı” adlanacaq <u><b><?php echo $rows4SeriaCid[0]["name"] ?>         (Şəxsiyyət vəsiqəsinin seriyası  <?php echo $rows4Fin[0]["seria"] ?> olan <?php echo $rows4Fin[0]["verilmeTarixi"] ?> tarixdə     <?php echo $rows4Fin[0]["verenOrqan"] ?> təfindən  verilib)</b></u> digər    tərəfdən, aşağıdakı    şərtlərlə bu müqaviləni bağladıq.                       
<br><br><br><br>                            
<h6 style="text-align: center;"><b>1.MÜQAVİLƏNİN PREDMETİ</b></h6>
1.1 Bu müqaviləyə əsasən  “Satıcı”  2.1 bəndinin göstərilən  əmlakı  ( bundan  sonra   “Mal”   adlanacaq) 
“Alicının”  mülkiyyətinə  verir. Alıcı  isə malı qəbul  etməsini və bu  Müqavilə ilə   müəyyənləşdirilmiş şərtlərlə  malın qiymətini “Satıcıya” ödəməsini öz öhdəsinə götürür.  <br>
1.2 Müqavilə üzrə öhdəliyin icrasını təmin etmək məqsədi ilə  satılan  mal  “Alıcıya”  təhvil  verildiyi andan  malın tam dəyəri ödənilməsinə qədər  girova qoyulur. Girov sabit girovdur və girov predmeti “Alıcıda” saxlanılir.        <br><br><br><br>                   
                            
<h6 style="text-align: center;"><b>2.MALIN ADI VƏ QURAŞDIRMA ÜNVANI</b></h6>       
2.1 Bu müqavilə üzrə satılan malın adı  : <?php echo $satılan_malın_adı; ?><br>
2.2 Malın quraşdırılma ünvanı:<u><?php echo $rows4Fin[0]["qeydiyyatUnvan"]; ?></u>      <br>          
                            <br><br>
                                                                                
<h6 style="text-align: center;"><b>3.TƏRƏFLƏRİN HÜQUQ VƏ VƏZİFƏLƏRİ</b></h6> 
3.1         “Satıcının” hüquqları:     <br>   
3.1.1  “Satıcı” bu  müqvilə  ilə  müəyyən  olunmuş  “Alıcıdan” onun öhdəliyini və  vəzifələrini vaxtında     və lazımınca  icra etməsini ondan tələb edə bilər.    <br>         
3.1.2  “Satıcı” Müqavilənin  4.2  bəndində  göstərilən  öhdəlikləri   “Alıcı” 3 (üç)  dəfə  ardıcıl  olaraq    icra etmədikdə  və  ya  lazımınca  icra   etmədikdə   həmin   tarixə   mövcud  olan   borc  məbləğinin dərhal ödənilməsini   “Alıcıdan” tələb edə bilər. <br>
3.1.3  “Alıcı” malın  ona  təhvil  verilməsindən   əvvəl  öz  təçəbbüsü   ilə,   “Satıcının”  razılığı olmadan müqaviləni ləğv  edərsə  ilkin  ödədiyi  məbləğ (beh) “Satıcı”  tərəfindən tutulur.  <br>                          
3.1.4   “Alıcı”   malın  ona  təhvil  verilməsindən  əvvəl  öz  təşəbbüsü   ilə, “Satıcının”  razılığı   olduqda, müqavilənin"  6.4 bəndində göstərilən hallar istisna olmaq şərti ilə göstərilən malı digər   markalı  və  ya  növlü  mala  dəyişdirərsə   ilkin  ödədiyi  məbləğin (behin) 50  (əlli) faizi “Satıcı” tərəfindən tutlur.          <br>         
3.1.5  “Alıcı”  malın  ona  təhvil verilməsindən  sonar  öz  təşəbbüsü  ilə və  “Satıcının” razılığı olduqda   müqaviləni ləğv   edərsə   və  ya   satılan    mal digər  bir  mala  dəyişdirilərsə, “Alıcı” tərəfindən ödənilən məbləğlər geri   qaytarılmır  və “Alıcı” dan zəmanət müddətinin sonuna qədər      qalan   ayların  malın  dəyərinin   1/12 - i  hasilində cərimənin ödənilməsini  tələb  edir.  “Alıcı” cəriməni ödəmədikdə “Satıcı” məhkəməyə müraciətedə bilər.   <br>  
3.1.6 “Alıcı”  iki  ay  ərzində  aylıq  ödənışləri  həyata keçirməsə , bu  təqdirdə  “Satıcı” malın  qiymətinin ödənilməmiş hissəsini tam həcmdə tələb etmək hüququna malikdir.       

<br><br><br><br>
                    
<h6 style="text-align: center;"><b>3.2 “Satıcının” vəzifələri: </b></h6>                           
3.2.1 Müqavilənin   2.1   bəndində   göstərilən   malın   müqavilə   qüvvəyə  mindikdən sonra müqavilədə göstərilmiş   ünvanda    quraşdırılıb,   sınaqdan   keçirdikdən   sonra  saz vəziyətdə  “Alıcıya” təhvil verilir.Malın  quraşdırılması  və təmiri  üçün  qaldırıcı(kran) və ya  digər  spesfik qurğular lazım olarsa həmin qurğular üzrə  xərclər müştəri tərəfindən  ödənilir.   <br>      
3.2.2 Malın istismar qaydalarını və digər şərtləri haqqında “Alıcıya” məlumat verir. <br>
3.2.3  Mala aid olan  texniki  və  digər  sənədləri mal ilə birlikdə “Alıcıya” təqdim edir. <br>
3.2.4  Bu müqavilənin şərtlərinə uyğun olaraq satılan malın keyfiyyətinə Zəmanət verir.                            <br>

<br><br><br>

<h6 style="text-align: center;"><b>3.4 “Alıcı”nın vəzifələri </b></h6>                  
3.4.1 Bu  müqavilənin 2.1 bəndində  göstərilən malı təhvil aldıqdan və ya   quraşdırılmasından  sonar onun  sifariş  etdiyi mal olmasına  və  bu malın saz  vəziyyətdə  olmasına  əmin  olduqdan   sonar “Satıcı”dan  və ya  “Satıcı” nın səlahiyyətli  nümayəndəsindən  (Malı quraşdıran şəxsdən)      təhvil almaq   <br>
3.4.2 Malın   qiymətini   bu  müqavilənin  4-cü  maddəsi  ilə  müəyyən  olunmuş  qaydada  və şərtlərlə  “Satıcıya” ödəmək <br>
3.4.3 Malın dəyərinin tam ödənilməməsinə qədər “Satıcının” razılığı olmadan malın üzərində sərəncam verilməməsi.  <br>
3.4.4 Müqavilə  və  Azərbaycan  Respublikası  qanunvericiliyi ilə üzərinə düşdüyü öhdəlikləri  və  vəzifələri vaxtında  və lazımı qaydada icra etməsini və onun pozulmasına  yol  verməməsini  öhdəsinə götürür.   <br>                         
                            
                        
<br><br><br>

<h6 style="text-align: center;"><b> 4.MALIN QİYMƏTİ VƏ ÖDƏNİLMƏ ŞƏRTLƏRİ  </b></h6>    
4.1 Malın qiyməti   <u><?php echo $rows4SeriaCid[0]["productPrice"]." AZN"; ?></u>               <br>        
4.2 Malın qiymətinin  <u><?php echo $rows4SeriaCid[0]["firstPrice"]." AZN"; ?></u> manata olan  hissəsi müqavilə bağlanan zaman   “Alıcı”  tərəfindən  ilkin ödənilir, digər  hissəsi isə  müqavilə qüvvəyə  mindiyi gündən etibarən  hər 30 (otuz)    təqvim  günü   bitdikdən   sonra   ertəsi      <u><?php echo $rows4SeriaCid[0]["countMonth"]; ?> ay</u>        ərzində  hər ay   <u><?php echo ceil($rows4SeriaCid[0]["avaragePay"])." AZN"; ?></u>  olmaqla həmin  gün  (günlər)  mövcud  qanunvericiliklə müəyyən edilmiş  istirahət və ya  bayram   gününə  (günlərinə)    təsadüf  etdikdə  isə  ödəniş  iş  günü  nəğd  və   ya köçürülmə  yolu ilə ödənilir     <br>     
4.3 Bu  müqavilə  üzrə  bütün  ödəmələr  Azərbaycan  Respublikasının  milli  valyutası  ilə -  manatla aparılır.    <br>                       
<br><br><br>                              
<h6 style="text-align: center;"><b> 5.MÜQAVİLƏNİN MÜDDƏTİ VƏ ŞƏRTLƏRİ</b></h6>
5.1 Bu müqavilə  tərəflər öz üzərinə götürdükləri öhdəlikləri icra edənədək  qüvvədədir. <br>
5.2 Bu müqaviləyə dəyişikliklərin və əlavələrin edilməsi ancaq tərəflərin  razılığı ilə  həyata keçirilir.  Müqaviləyə edilən bütün dəyişikliklər və əlavələr yazılı qaydada aparılr və tərəflərin imza və  möhürü ilə  təsdiq edildiyi  andan hüquqi qüvvəyə minir.  Bir tərəfli qaydada aparılan  dəyisikliklər  hüquqi qüvvəyə malik deyil.   <br>                          
 
 <br><br><br>                           
                                    
<h6 style="text-align: center;"><b>6.TƏRƏFLƏRİN MƏSULİYYƏTİ VƏ MALIN  ZƏMANƏTİ</b></h6>
6.1 “ Satıcı”   “Alıcıya”   təhvil  verdiyi  malın  keyfiyyətinə  zəmanət  verir.  Zəmanətin   müddəti <u><?php echo $rows4SeriaCid[0]["zemanet"]; ?></u>dir. Zəmanətin  şərtləri  mal  ilə  birgə  verilən   Zəmanət  talonunda  müəyyən olunur. <br>
6.2 Bu   müqaviləyə   görə   tərəflər  oz   vəzifələrini  icra  etməməsi  və  ya  lazımınca  icra etməməsi nəticəsində  bir-birinə vurduqları zərərə görə mülki məsuliyyət  daşıyırlar. <br>
6.3 “Alıcı”   ödəmələri   həyata   keçirilməsini  gecikdirərsə, hər gecikdirilən gün üçün malın məbləğinin <u><?php echo $rows4SeriaCid[0]["debbe"]; ?>%</u>  miqdarında dəbbə pulu ödəyir. <br>
6.4 Əgər  malın “Alıcıya” təhvil  verilmısindən  və  ya  qurasdırılmasından  sonra , Zəmanət müddəti   ərzində “Satıcı”  nın  servis  xidməti  tərəfindən  malda  qüsurlar  tapılsa  “Satıcı” bu  qüsurları  öz  hesabına   aradan qaldırmalıdır. Bu  qüsurları   malın   təmir   edilməsi  ilə  aradan götürmək mümkün olmadıqda  “Satıcı”  qüsurlu   malı eyni tipli , saz mal ilə əvəz edir. <br>
6.5 “Alıcı” nın  düzgün və  ya  məqsədə uyğun istifadə  etməməsi  və  ya  üçüncü   şəxslərin    hərəkətləri ucbatından     malın  tam   və  ya  qismən   yararsız   hala  düşməsinə  görə   ”Satıcı” məsuliyyət daşımır. <br>
6.6  Zəmanət  müddəti  ərzində ,  6.5   bəndində  göstərilmiş  hallar   istisna  olmaqla   malda qüsurlar  yaranarsa Alıcı”bu qüsurlar barəsində ”Satıcıya”dərhal məlumat verməlidir və  Saatlı şəhəri,  H.Əliyev  prospektində yerləşən “ BARCODE ” Mağazasna bu  müqaviləni  təqdim etməklə müraciət  etməliidr. “Satıcı”məlumat aldığı andan başlayaraq      40    gün  ərzindəbu qüsurlar aradan götürür.
6.7 Əşyanın təsadüfən məhv  olması  və  ya  təsadüfən  zədələnməsi  riski   malın   “Alıcıya” təvil  verdiyi   andan “ Alıcıya ”  keçir .  Belə   hallarda   ” Satıcı ”  malın  dəyəri  tam   şəkildə  ödəməsini “Alıcıdan ” tələb edə bilər . <br>
6.8 Fors –major   (daşqın,  uçqun,  yanğın  və digər   qarşısıalınmaz  fövqəladə   vəziyyətlər) hallarında  tərəflər müqavilə  şərtlərinin  tam və ya qismən  yerinə  yetirilməsinə  görə  bir- biri qarşısında  heç  bir  məsuliyyət daşımırlar  və  həmin  hallar  aradan  qalxanadək  müqavilənin müddəti dayandırılır.  <br>                           
                            
                            
<br><br><br>

<h6 style="text-align: center;"><b>7. MÜBAHİSƏLƏRİN HƏLLİ</b></h6>
3.4 Müqavilənin icrası ilə əlaqədar tərəflər arasında yaranmış mübahisələr qarsılıqlı razılıqla  həll   edilir. Qarşılıqlı razılıqla   həll  edilməyən   mübahisələr    Azərbaycan  Respublikasının  qanunvericiliyinə   müvafiq   olaraq Azərbaycan  Respublikasının  məhkəmələri  vasitəsilə həll  olunur. <br>                            
                            
 <br><br><br>             
<h6 style="text-align: center;"><b>8.YEKUN MÜDDƏALAR</b></h6>
8.1 Bu  müqavilə  qüvvədə  olduğu  müddətdə “Alıcı” ünvanında və  iş  yerində  baş  vermiş dəyişikliklər barədə “Satıcının” 2 (iki) iş günü ərzində yazılı formada xəbərdar  etməlidir. <br>
8.2 Bu müqavilə Azərbaycan dilində, iki  eyni  hüquqi  qüvvəyə  malik  olan  nüsxədə  tərtib edilmişdir. Nüsxələr tərəflərin  imzası  və  möhürü  ilə təsdiq   edildiyi  andan  hüquqi  qüvvəyə  minir. Nüsxələrdən biri “Alıcıda”digəri isə “Satıcıda” da  saxlanılır
          </td>
        </tr>
        <tr></tr>
        <tr>
          
        </tr>
        <tr></tr>
        
      </tbody>
    </table>


    <table class="table " style="width: 100%;color:black;page-break-before: always;">
      <tbody class="tbody-light" style="background-color: white;">
        <tr style="border:none;"></tr>
      <tr>
        <td colspan="2">
          <br><br><br><br>
          <h6 style="text-align: center;"><b>9.TƏRƏFLƏRİN  HÜQUQİ  ÜNVANI  VƏ  REKVİZTLƏRİ</b></h6>
        </td>
      </tr>
      <tr style="border:none;"></tr>
      <tr style="border:none;border:2px solid white;">
          <td  style="font-size: 15px;font-family: times new roman;text-align: center;">
            “SATICI” <br> <b> “BARCODE   ELECTRONİCS” </b> <br> VÖEN  6700327522 <br><br>Saatlı şəhər, H.Əliyev pr-ti <br><br>
            Tel: (050) 302 51 55, (050) 446 18 15  <br>                         
(021) 285 28 37, (021) 285 26 12    <br>                        
         Məmmədov Vüsal Əbülfət oğlu <br><br>
         <hr style="width: 60%;border: 1px solid black;">
         <p>İmza,M.Y</p>
          </td>
          <td   style="font-size: 15px;font-family: times new roman;text-align: center;">
            “ALICI” <br>
            <b> <?php echo $rows4SeriaCid[0]["name"]; ?></b>
             <hr style="width: 60%;border: 1px solid black;">
             <?php echo $rows4Fin[0]["qeydiyyatUnvan"]; ?>
             <hr style="width: 60%;border: 1px solid black;">
             Mobil:<?php echo $rows4Fin[0]["mobil1"]; ?>&nbsp&nbsp||&nbsp&nbspEv:<?php echo $rows4Fin[0]["ev"]; ?>
             <hr style="width: 60%;border: 1px solid black;"><br>
             <hr style="width: 60%;border: 1px solid black;">
             <p>İmza,M.Y</p>
          </td>
        </tr>
      </tbody>
    </table>


  </div>
</div>