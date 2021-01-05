<?php
include 'commaFunction.php';
$creditTable=commaFunction($creditTime);//kredit cədvəli
$crederr='';
$seriali=[];
$seriasiz=[];
$seriasizArray=[];
$pN=count($partnorlar);
if($pN!=0)
{ 
	if(trim($malinQiymeti)<=trim($ilkinOdenis))
	{
		$crederr="Məhsulun qiyməti ilkin ödənişdən kiçikdir və ya bərabərdir.Kreditləşmə etmək mümkün olmadı";
	}
	else
	{
		// Sifarişləri partnyor,istehsalçı,model üzrə məhsulları çeşidlədim
		include "filterOrderedProducts.php";

		if($crederr!="")
		{
			// echo "Kreditləşmə aparıla bilmədi!";
		}
		else
		{
			// Krideitləşmə bazaya yazdırılır...
			include "creditSavedDb.php";
		}
	}
}
else
{
	$crederr="Məhsul seçin!";
}
	include 'sil_def_val.php';
?>