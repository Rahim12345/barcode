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
	$z=0;
	foreach($_POST['columns'] as $column)
	{
		if($z!=0)
		{
			$where[]=$column['data'].' LIKE "%'.$_POST['search']['value'].'%" ';
		}
		$z++;
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
$credits=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$response=[];

$response['data']=[];
$response['recordsTotal']=$conn->query('SELECT count(id) as total FROM creditdetails ')->fetch(PDO::FETCH_ASSOC)['total'];
$response['recordsFiltered']=$conn->query('SELECT count(id) as total FROM creditdetails '.(count($where)>0 ? ' WHERE '.implode(' || ', $where):null))->fetch(PDO::FETCH_ASSOC)['total'];

$x="";
$al='';
$qaytar='';
foreach($credits as $credit)
{
	if(count(explode("||", $credit['productDetails']))==2)
	{
		$productDetails=$credit['productDetails'];
		include 'openDetails.php';
		$al=$satılan_malın_adı_qiymetile;
	}
	if(count(explode("||", $credit['rejectedProducts']))==2)
	{
		$productDetails=$credit['rejectedProducts'];
		include 'openDetails.php';
		$qaytar=$satılan_malın_adı_qiymetile;
	}
	$bmk=$credit['realbmk'];
	include 'bmkFunction.php';
	$response['data'][]=[
		'realbmk'				=>$bmk,
		'name'		 			=>$credit['name'],
		'productDetails'		=>$al,
		'rejectedProducts'		=>$qaytar,
		'sellerTime'			=>$credit['sellerTime'],
		'id'					=>'<a class="btn btn-info" target="_blank" href="index.php?id=4&mid='.$credit["id"].'">BAX</a>'

	];
}


echo json_encode($response);

?>