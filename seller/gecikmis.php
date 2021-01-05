<?php 
// sleep(3); 
include '../include/config.php';

$sql='SELECT * FROM creditdetails ';
$where=[];

$order=['id','DESC'];

// $column=$_POST['order'][0]['column'];
// $columnName=$_POST['order'][$column]['data'];
// $columnOrder=$_POST['order'][0]['dir'];

// if(isset($columnName)  && !empty($columnName) && isset($columnOrder) && !empty($columnOrder))
// {
// 	$order[0]=$columnName;
// 	$order[1]=$columnOrder;
// }


if(isset($_POST['search']['value']) && !empty(($_POST['search']['value'])))
{
	foreach($_POST['columns'] as $column)
	{
		
		$where[]=$column['data'].' LIKE "%'.$_POST['search']['value'].'%" ';
		
	}
}

if(count($where)>0)
{
	$sql.=' WHERE '.implode(' || ', $where);
}


if(isset($_POST['start']) && isset($_POST['length']))
{
$startN=$_POST['start'];
$pageN=$_POST['length'];
}


$sql.=' ORDER BY '.$order[0].' '.$order[1];

$sql.=' LIMIT '.$startN.', '.$pageN;
// print_r($_POST['columns']);
// echo $sql;	
// exit;	
$borclular=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$response=[];

$response['data']=[];
$response['recordsTotal']=$conn->query('SELECT count(id) as total FROM creditdetails ')->fetch(PDO::FETCH_ASSOC)['total'];
$response['recordsFiltered']=$conn->query('SELECT count(id) as total FROM creditdetails '.(count($where)>0 ? ' WHERE '.implode(' || ', $where):null))->fetch(PDO::FETCH_ASSOC)['total'];

$x="";
// $n=$startN+1;
// print_r($borclular);
// exit();
$overArray=[];
$datestrtotime=strtotime(date("d.m.Y"));
$sert1=0;
$address='';
foreach($borclular as $borclu)
{
	if($borclu["avaragePay"]!=0)
	{
		if($borclu["amountPaid"]<$borclu["remindMoney"])
		{

			$query4Bmk=$conn->prepare("SELECT * FROM bmk WHERE bmkNo=? AND sellStyle=?");
			$query4Bmk->execute([$borclu["id"],1]);
			$rows4Bmk=$query4Bmk->fetchall(PDO::FETCH_ASSOC);

			$dd=$borclu["amountPaid"]/$borclu["avaragePay"];
			$fl=floor($dd);
			$borcluEx=explode(",", $borclu["creditTable"]);
			$dateCrstrtotime=$borcluEx[floor($fl)];
			if(strtotime($borcluEx[$fl])-$datestrtotime<0)
			{
				$productDetails=$borclu["productDetails"];
				$bmk=$borclu["id"];
				include 'openDetails.php';
		      	include 'bmkFunction.php';
		      	// include 'debbeFunction.php';
				$borcluName=$borclu["name"];//müştərinin adı
		      	$name=$borclu["name"];//debitorName
		  //     	$fin=$borclu["fin"];
		  //     	$query4Addres=$conn->prepare("SELECT qeydiyyatUnvan FROM regular WHERE Pincode=?");
				// $query4Addres->execute([$fin]);
				// $rows4Addres=$query4Addres->fetchall(PDO::FETCH_ASSOC);
				// $count4Addres=count($rows4Addres);
				// if($count4Addres!=0)
				// {
				// 	$address=$rows4Addres[0]["qeydiyyatUnvan"];//address
				// }
				$mehsulAdi=$satılan_malın_adı;//satılan məhsulun adı
				$ortaAyliq=$borclu["avaragePay"];//orta aylıq

				
				$x=$borclu["remindMoney"];
				$y=$borclu["amountPaid"];
					if($x!=$y)
					{
						$emsal=$borclu["amountPaid"]/$borclu["avaragePay"];
						$emsal=floor($emsal);
						$months=explode(",",$borclu["creditTable"]);
						$today=strtotime(date("d.m.Y"));//Burda bu "16.05.2020" date("d.m.Y") yazacam
						$month=$months[$emsal];
						$month=strtotime($months[$emsal]);
						$overDay=($today-$month)/(24*60*60);
						if($overDay<=0)
						{
							$overDay=0;
						}
					}



				$x=ceil($overDay/30);
				$esasborc=$x*$borclu["avaragePay"];//Əsas borc

				$a=$overDay+$borclu["totalDebbeDays"];
      	  		$money= ($borclu["productPrice"]*$borclu["debbe"]*$a)/100;
      	  		$cerimeBorc=$money-$borclu["amountPaidDebbe"];//Cərimə borcu

      	  		$sellerTime=$borclu["sellerTime"];//Satış tarixi

      	  		$paidLink='<a href="index.php?id=12&mid='.$borclu['id'].'"><i class="fas fa-coins"></i></a>';//Ödəmə linki

      	  		$eye='<a href="index.php?id=19&mid='.$borclu['id'].'"><i class="fa fa-eye" style="font-size: 20px;color: black;" aria-hidden="true"></i></a>';//Bax linki

      	  		$response['data'][]=[
					'fin'					=>$bmk,
					'name' 					=>$borcluName,
					'address'				=>$borclu["address"],
					'productDetails'		=>$mehsulAdi,
					'avaragePay'			=>$ortaAyliq,
					'remindMoney'			=>$esasborc,
					'totalDebbeDays'		=>$cerimeBorc,
					'sellerTime'			=>$sellerTime,
					'debbeDays'				=>$paidLink,
					'firstPrice'			=>$eye
				];


			}
		}
	}
}
echo json_encode($response);
?>