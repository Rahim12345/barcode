<?php
date_default_timezone_set("Asia/Baku");  
header('Content-Type:application/json');

define('DB_HOST','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','barcode');

$mysqli= new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$mysqli)
{
	die("Connection failed:".$mysqli->error);
}

$query=sprintf("SELECT * FROM creditdetails ");

$result=$mysqli->query($query);

$data=array();
$n1=0;
$n2=0;
$n3=0;
$n4=0;
$n5=0;
$n6=0;
$n7=0;
foreach($result as $row)
{
	// echo $row["sellerTime"]."\n";
	// echo ."\n";
	$a=strtotime(date("d.m.Y"))-strtotime($row["sellerTime"]);
	$a=$a/(24*60*60);
	// echo $a."\n";
	// echo $row["id"]."- $a"."\n";
	if($a==0)
	{
		// echo "1";
		// echo $row["productPrice"]."\n";
		$n1+=$row["productPrice"];
	}
	elseif($a==1)
	{
		$n2+=$row["productPrice"];
	}
	elseif($a==2)
	{
		$n3+=$row["productPrice"];
	}
	elseif($a==3)
	{
		$n4+=$row["productPrice"];
	}
	elseif($a==4)
	{
		$n5+=$row["productPrice"];
	}
	elseif($a==5)
	{
		$n6+=$row["productPrice"];
	}
	elseif($a==6)
	{
		$n7+=$row["productPrice"];
	}
}
$data[0]=$n1;
$data[1]=$n2;
$data[2]=$n3;
$data[3]=$n4;
$data[4]=$n5;
$data[5]=$n6;
$data[6]=$n7;
$result->close();
print json_encode($data);
?>