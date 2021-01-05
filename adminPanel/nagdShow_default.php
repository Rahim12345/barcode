<div class="card shadow mb-4">
    <div class="card-body">
    <form action="" method="POST">
     <table class="table table-light"  style="width: 100%;color:white;border: 2px solid black;">
      <thead style="background-color: white;color:black;text-align: center;">
        <tr style="background-color: green;color:white;">
          <th colspan="5">NAĞD SATIŞ</th>
        </tr>
        <tr style="background-color: green;color:white;">
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
            <span class="form-control"><?php echo $rows4SeriaMid[0]["name"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="musteriADRR">Ünvan : </label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4SeriaMid[0]["address"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="musteriTel">Telefon nömrəsi : </label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4SeriaMid[0]["telno"]; ?></span>
          </td>
        </tr>
        <tr>
          <td><label for="timer">Ödəniləcək gün<sup>*</sup> <br> (Məs:10 gün sonra) : </label></td>
          <td colspan="4">
            <span class="form-control"><?php echo $rows4SeriaMid[0]["timer"]; ?></span>
          </td>
        </tr>
        <tr style="background-color: green;font-weight: bold;color:white;">
          <td colspan="5">MƏHSUL VƏ QİYMƏT</td>
        </tr>
        <tr>
          <td><label for="timer">Malın adı və qiyməti : </label></td>
          <td colspan="4">
            <span >
              <?php
$productDetails=$rows4SeriaMid[0]["productDetails"];
$checkPro=explode("||", $productDetails);
// echo count($checkPro);
if(count($checkPro)!=2)
{
  ?>
  <p class="btn-danger" style="min-height: 20%;margin: 10px;border-radius: 10px;text-align: center;padding: 12%;font-size: 5vh;margin-bottom: 150px;">Bu müqavilə üzrə bütün məhsullar artıq qaytarılıb
  </p>
  <?php
}
else
{
  $productDetails=$rows4SeriaMid[0]["productDetails"];
  include 'openDetails.php';
  echo $satılan_malın_adı_qiymetile; 
}
              ?>
            </span>
          </td>
        </tr>
        <tr>
          <td><label for="delivery">Təhvil <sup>*</sup></label></td>
          <td colspan="4">
              <span class="form-control">Təhvil verildi</span>
          </td>
        </tr>
      </tbody>
    </table>
    </form>      
    </div>
</div>