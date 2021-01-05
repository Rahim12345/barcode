<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Qaimə axtar</h1>
  <div class="row">
    <div class="col-lg-10">
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-sm-3">
              <input type="text" name="qaimeName" class="form-control" id="qaimeName" value="" maxlength="50">
            </div>
             <div class="col-sm-3">
              <button type="submit" name="qaimeSearch" class="btn btn-primary">AXTAR</button>
            </div>
          </div>
        </form>          
        <p style="background-color: orange;line-height: 40px;color:white;border-top-right-radius: 15px;border-top-left-radius: 15px;font-size: 3vh;padding-left: 25px;text-align: center;">
          <?php 
          if(!empty($result))
          {
            echo $result;
          }
          ?>
        </p>
        <?php  
        if($qai==1)
        {
          ?>
          <table class="table table-dark" style="width: 100%;">
            <thead style="background-color: #1c4b79;">
              <tr>
                <th scope="col">№</th>
                <th scope="col">Məhsulun adı</th>
                <th scope="col">Alınıb</th>
                <th scope="col">Satılıb</th>
                <th scope="col">Qiymət(1 ədədinin)</th>
                <th scope="col" style="background-color: orange;">Qiymət(ümumi)</th>
              </tr>
            </thead>
            <tbody style="background-color: #1c4b79;">
              <?php  
              $n=0;
              $sum=0;
              foreach($modelsArray as $modelArray)
              {
                $n++;
                $query4Qaime1=$conn->prepare("SELECT * FROM products WHERE model=? AND factura=?");
                $query4Qaime1->execute([$modelArray,$qaimeName]);
                $rows4Qaime1=$query4Qaime1->fetchall(PDO::FETCH_ASSOC);
                $count4Qaime1=count($rows4Qaime1);

                $query4Qaime2=$conn->prepare("SELECT * FROM products WHERE model=? AND factura=? AND selled!=?");
                $query4Qaime2->execute([$modelArray,$qaimeName,0]);
                $rows4Qaime2=$query4Qaime2->fetchall(PDO::FETCH_ASSOC);
                $count4Qaime2=count($rows4Qaime2);
                // echo $modelArray."-".$count4Qaime1."-".$rows4Qaime1[0]["wholesale"]."<br/>";
                // echo $modelArray."<br/>";

                ?>
                <tr>
                  <th scope="row"><?php echo $n; ?></th>
                  <td><?php echo $modelArray; ?></td>
                  <td>
                    <?php  
                    $say=0;
                    if($rows4Qaime1[0]["seria"]=="")
                    {
                      echo $say=$rows4Qaime1[0]["memoryDimension"];
                    }
                    else
                    {
                      echo $say=$count4Qaime1;
                    }
                    ?>
                  </td>
                  <td>
                    <?php  
                    $say2=0;
                    if($rows4Qaime1[0]["seria"]=="")
                    {
                      echo $say2=$rows4Qaime1[0]["memoryDimension"]-$rows4Qaime1[0]["dimension"];
                    }
                    else
                    {
                      echo $say2=$count4Qaime2;
                    }
                    ?>
                  </td>
                  <td><?php echo $rows4Qaime1[0]["wholesale"]; ?></td>
                  <td style="background-color: orange;"><?php echo $say*$rows4Qaime1[0]["wholesale"]; ?></td>
                </tr>
                <?php
                $sum+=$say*$rows4Qaime1[0]["wholesale"];
              }
              ?>
                <tr>
                  <td>Tarix:</td>
                  <td><?php echo $rows4Qaime1[0]["productDate"]  ?></td>
                  <td colspan="2"></td>
                  <td></td>
                  <td style="background-color: orange;">Cəm: <?php echo $sum." AZN";  ?></td>
                </tr>
            </tbody>
          </table>  
          <?php
        }
        ?>
        </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->