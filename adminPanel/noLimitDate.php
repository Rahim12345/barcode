<div class="card shadow mb-4">
    <div class="card-body">
         <table class="table table-dark" style="width: 100%;">
              <thead class="bg-success">
            <tr>
                  <th scope="col" colspan="3"  style="text-align: center;">Gün limitin aradan qaldırmağa icazə ver</th>
            </tr>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col" style="text-align: center;">İşçi</th>
                  <th scope="col" style="text-align: center;">İCAZƏ</th>
                </tr>
              </thead>
              <tbody style="background-color: #fff;color: black">
                  <?php  
                  if(isset($_POST["permit"]))
                  {
                        
                        if(isset($_POST['permitInputs']))
                        {
                              // print_r($_POST['permitInputs']);
                              $permits=$_POST['permitInputs'];
                              $query4Workers=$conn->prepare("SELECT * FROM users WHERE id>? and status!=?");
                              $query4Workers->execute([0,"admin"]);
                              $rows4Workers=$query4Workers->fetchall(PDO::FETCH_ASSOC);
                              $count4Workers=count($rows4Workers);
                              $noPermited=[];
                              if($count4Workers!=0)
                              {
                                    foreach($rows4Workers as $rows4Worker)
                                    {
                                          if(!in_array($rows4Worker["id"], $permits))
                                          {
                                                $noPermited[]=$rows4Worker["id"];
                                          }
                                          
                                    }
                                    $UpdatePermit=$conn->prepare("UPDATE `users` SET `limitedDate`=? WHERE  id=?");
                                    foreach($permits as $permit)
                                    {
                                    $UpdatePermit->execute([1,$permit]);
                                    }

                                    $UpdatePermit=$conn->prepare("UPDATE `users` SET `limitedDate`=? WHERE  id=?");
                                    foreach($noPermited as $noPermit)
                                    {
                                    $UpdatePermit->execute([0,$noPermit]);
                                    }
                              }
                              include 'noLimitDate_default.php';
                        }
                        else
                        {
                              $UpdatePermit=$conn->prepare("UPDATE `users` SET `limitedDate`=? WHERE  status!=?");
                              $UpdatePermit->execute([0,"admin"]);
                              include 'noLimitDate_default.php';
                        }
                  }
                  else
                  {
                        include 'noLimitDate_default.php';
                  }
                  ?>
              </tbody>
            </table>      
    </div>
</div>