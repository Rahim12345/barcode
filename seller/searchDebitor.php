<?php 
$searchTimeExplode= explode(".", $currentDate);
$countsearchTimeExplode=count($searchTimeExplode);
// $currentDate=date("d.m.Y");
// $currentDate="13.05.2020";
// echo $currentDate;
if($countsearchTimeExplode==3)
{
	if(is_numeric($searchTimeExplode[0]) && is_numeric($searchTimeExplode[1]) && is_numeric($searchTimeExplode[2]) && strlen($searchTimeExplode[0])==2 && strlen($searchTimeExplode[1])==2 && strlen($searchTimeExplode[2])==4)
	{	
		// Debitorları tarixə görə axtardım
		include 'searchDebitor_default.php';
	}
	else
	{
		include 'debitNoResult.php';
	}	
}
else
{
	// Debitorları adları ilə axtardım
	include 'searchDebitWithNames.php';
}