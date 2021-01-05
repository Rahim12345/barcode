<?php  
if(isset($_POST["toSell"]))
{
  if(isset($_POST["partnors"]))
  {
    $partnorlar       =$_POST["partnors"];
    $mallar           =$_POST["productNames"];
    $modeller         =$_POST["models"];
    $serialar         =$_POST["serias"];
    $qiymetler        =$_POST["prices"];
  }
  else
  {
    $partnorlar       =[];
    $mallar           =[];
    $modeller         =[];
    $serialar         =[];
    $qiymetler        =[];
  }
  $partnorCount=count($partnorlar);

  $crederr='';
  $seriali=[];
  $seriasiz=[];
  $seriasizArray=[];
  $pN=count($partnorlar);
  include 'ianeFilter.php';

  $query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
  $query4Bmk->execute([$mid,3]);
  $rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);
  $count4Bmk=count($rows4Bmk);
  if($count4Bmk!=0)
  {
    $uid=$_SESSION["id"];
    $queryUsers=$conn->prepare("SELECT * FROM users WHERE id=?");
    $queryUsers->execute([$uid]);
    $rowsUsers=$queryUsers->fetchall(PDO::FETCH_ASSOC);
    $countUsers=count($rowsUsers);
    if($countUsers!=0)
    {
      $rejectExecName=$rowsUsers[0]["status"].":".$rowsUsers[0]["name"];
      $insertReject=$conn->prepare("INSERT INTO `rejected`(`bmk`, `date`, `rejectExecName`, `rejectExecID`) VALUES (?,?,?,?)");
      $insertReject->execute([$rows4Bmk[0]["id"],date("d.m.Y"),$rejectExecName,$uid]);


      $query4RejID=$conn->prepare("SELECT * FROM rejected WHERE id>? ORDER BY id DESC");
      $query4RejID->execute([0]);
      $rows4RejID=$query4RejID->fetchall(PDO::FETCH_ASSOC);
      $rejecedID=$rows4RejID[0]["id"];
    }
  }




  if($partnorCount==0)
  {
    include 'ianeTopdanTam.php';
  }
  else
  {
    // $crederr="Hissə hissə ləğv edəcəm";
    include 'ianeTopdanPart.php';
  }
  include 'ianeTopdanForm_Val.php';
}
else
{
  include 'ianeTopdanForm_default.php';
}
?>