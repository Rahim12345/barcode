<?php 
// sleep(3); 
include '../include/config.php';

$sql='SELECT * FROM news ';
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
	// $z=0;
	foreach($_POST['columns'] as $column)
	{
		// if($z!=0)
		// {
			$where[]=$column['data'].' LIKE "%'.$_POST['search']['value'].'%" ';
		// }
		// $z++;
	}
}

// print_r($where);

if(count($where)>0)
{
	$sql.=' WHERE '.implode(' || ', $where);
}

// echo $sql;

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
$news=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$response=[];

$response['data']=[];
$response['recordsTotal']=$conn->query('SELECT count(id) as total FROM news ')->fetch(PDO::FETCH_ASSOC)['total'];
$response['recordsFiltered']=$conn->query('SELECT count(id) as total FROM news '.(count($where)>0 ? ' WHERE '.implode(' || ', $where):null))->fetch(PDO::FETCH_ASSOC)['total'];

$xeber='';
foreach($news as $new)
{
	$newsID=$new['id'];
	$query4users=$conn->prepare("SELECT * FROM users WHERE id=?");
	$query4users->execute([$new["sellerID"]]);
	$rows4users=$query4users->fetchall(PDO::FETCH_ASSOC);
	$count4users=count($rows4users);
	if($count4users!=0)
	{
		$saticiAdi=$rows4users[0]["status"].":".$rows4users[0]["name"];
	}
	$operationType=$new["operationType"];
	$tarix=$new["date"];
	$saat=$new["clock"];
	$tesvir=$new["description"];
	if($operationType==1)
	{
		$satisnovu="KREDİTLƏ SATIŞ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=39&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		// echo $part;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==2)
	{
		$satisnovu="KREDİT ÖDƏNİŞİ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=40&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];	
	}
	elseif($operationType==3)
	{
		$satisnovu="NAĞD SATIŞ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=41&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber
		];
	}
	elseif($operationType==4)
	{
		$satisnovu="NAĞD ÖDƏNİŞ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=42&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==5)
	{
		$satisnovu="TOPDAN SATIŞ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=43&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==6)
	{
		$satisnovu="TOPDAN ÖDƏNİŞ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=44&mid='.$part2.'" target="_blank" style="font-size:18px;color:blue;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==7)
	{
		$satisnovu="KREDİT İADƏ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=39&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==8)
	{
		$satisnovu="NAĞD İADƏ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=41&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==9)
	{
		$satisnovu="TOPDAN İADƏ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$part=$part1.'<a href="index.php?id=43&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==10)
	{
		$satisnovu="KASSAYA PUL DAXİL ETMƏK";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$xeber.=$tesvir.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==11)
	{
		$satisnovu="KASSADAN PUL GÖTÜRMƏK";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$xeber.=$tesvir.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==12)
	{
		$satisnovu="MƏHSULUN GÖNDƏRİLMƏSİ";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$tesvirExplode=explode("||", $tesvir);
		$part1=$tesvirExplode[0];
		$part2='';
		$part3='';
		$len=strlen($tesvirExplode[1]);
		$str=$tesvirExplode[1];
		for($i=0;$i<$len;$i++)
		{
			if($i<6)
			{
				$part2.=$str[$i];
			}
			else
			{
				$part3.=$str[$i];
			}
		}
		$page='';
		$query4SellType=$conn->prepare("SELECT * FROM bmk WHERE id=?");
		$query4SellType->execute([$part2]);
		$rows4SellType=$query4SellType->fetchall(PDO::FETCH_ASSOC);
		if(count($rows4SellType)!=0)
		{
			$sellStyle=$rows4SellType[0]["sellStyle"];
			if($sellStyle==1)
			{
				$page=39;
			}
			elseif($sellStyle==2)
			{
				$page=41;
			}
			elseif($sellStyle==3)
			{
				$page=43;
			}
		}
		$part=$part1.'<a href="index.php?id='.$page.'&mid='.$part2.'" target="_blank" style="font-size:18px;"> '.$part2.' </a>'.$part3;
		$xeber.=$part.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	elseif($operationType==13)
	{
		$satisnovu="ƏMƏK HAQQI";
		$xeber.=
		'
		<div style="color:black;" class="panel panel-default">
		<div class="panel-heading"><span class="pull-left"></span> <h6 style="color:black;font-weight: bold;padding-left: 39px;">'.$saticiAdi.'<span class="pull-right" style="font-size: 1.8vh;">'.$tarix.'<br>'.$saat.'</span></h4></div>
		<div class="panel-body">
		<p style="color:black;"><img src="img/admin.png" style="width: 40px;" class="img-circle pull-left">'.$satisnovu.'</p>
		<hr style="margin-left: 45px;border:1px dotted black;">
		<div class="clearfix"></div>
		<p style="padding-left: 45px;">';
		$xeber.=$tesvir.
		'
		</p>
		</div>
		</div>
		';	
		$response['data'][]=[
			'id'						=>$newsID,
			'description' 				=>$xeber

		];
	}
	$newsID='';
	$xeber='';
}
echo json_encode($response);
?>