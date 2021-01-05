<?php  
$AssistSeriali=[];
$seriaSiz=[];
$seriaFix='';
$seriaSizFix='';
for($i=0;$i<$pN;$i++)
{
	if(strlen($serialar[$i])>4)
	{
		$AssistSeriali[]=$serialar[$i];
		$seriali[]=$serialar[$i]."**".$qiymetler[$i];
	}
	else
	{
		$seriaSiz[]=strtoupper($partnorlar[$i])."**".strtoupper($mallar[$i])."**".strtoupper($modeller[$i])."**".$serialar[$i]."**".$qiymetler[$i];
	}
}


$sercount=count($seriali);
for($i=0;$i<$sercount;$i++)
{
	if($i<$sercount-1)
	{
		$seriaFix.=$seriali[$i].",";
	}
	else
	{
		$seriaFix.=$seriali[$i];
	}
}

$sercount=count($seriaSiz);
for($i=0;$i<$sercount;$i++)
{
	if($i<$sercount-1)
	{
		$seriaSizFix.=$seriaSiz[$i].",";
	}
	else
	{
		$seriaSizFix.=$seriaSiz[$i];
	}
}

$rejected1=[];
$rejected2=[];
$rejected=[];


$dbPro=$rows4CreditDetails[0]["productDetails"];
$dbProExp=explode("||", $dbPro);
$SSseriali=$dbProExp[0];
$SSseriali=explode(",", $SSseriali);
foreach($SSseriali as $SSseria)
{
	if(!in_array($SSseria, $seriali))
	{
		$rejected1[]=$SSseria;
	}
}


$SSseriaSiz=$dbProExp[1];
$SSseriaSiz=explode(",", $SSseriaSiz);
foreach($SSseriaSiz as $SSseriaS)
{
	if(!in_array($SSseriaS, $seriaSiz))
	{
		$rejected2[]=$SSseriaS;
	}
}

$RseriaFix='';
$RseriaSizFix='';
for($i=0;$i<count($rejected1);$i++)
{
	if($i<count($rejected1)-1)
	{
		$RseriaFix.=$rejected1[$i].",";
	}
	else
	{
		$RseriaFix.=$rejected1[$i];
	}
}

// print_r($rejected1);

for($i=0;$i<count($rejected2);$i++)
{
	if($i<count($rejected2)-1)
	{
		$RseriaSizFix.=$rejected2[$i].",";
	}
	else
	{
		$RseriaSizFix.=$rejected2[$i];
	}
}
if($seriaFix=="" && $seriaSizFix=="")
{
	$pro="";
}
else
{
	$pro=$seriaFix."||".$seriaSizFix;
}

$RecejedPro=$RseriaFix."||".$RseriaSizFix;
?>