<?php  
function commaFunction($creditTime)
{
	$explode=explode(",", $creditTime);
	$countEx=count($explode);
	$newCreditTime="";
	for($i=0;$i<$countEx-1;$i++)
	{
		if($i==$countEx-2)
		{
			$newCreditTime.=$explode[$i];
		}
		else
		{
			$newCreditTime.=$explode[$i].",";
		}
	}
	return $newCreditTime;
}
?>