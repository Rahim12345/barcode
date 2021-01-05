<?php  
$date1 = date("d.m.Y");
$date2 = $ilkinKreditTarixi;

$queryUser=$conn->prepare("SELECT * FROM users WHERE id=?");
$queryUser->execute([$_SESSION["id"]]);
$rowsUser=$queryUser->fetchall(PDO::FETCH_ASSOC);
$countUser=count($rowsUser);

if($countUser!=0)
{
	$krediPastDatePermit 	=$rowsUser[0]["krediPastDatePermit"];
	$limitedDate 		 	=$rowsUser[0]["limitedDate"];
}

if((strtotime($date2) - strtotime($date1)<0) AND $krediPastDatePermit==0)
{
	$crederr="Keçmiş tarixi qeyd etmə! <br/>";
	include 'sil_def_val.php';
}
else
{
$diff = strtotime($date2) - strtotime($date1);

$years = floor($diff / (365*60*60*24));
$days = floor(($diff - $years * 365*60*60*24) / (60*60*24));
	if(($days>$rows4SellerLimitedCreditTime[0]["time"] || $years!=0) AND $limitedDate==0)
	{
		$crederr="Şirkətin təyin etdiyi kredit müddətin aşmağa çalışmayın!";
		include 'sil_def_val.php';
	}
	else
	{
		$creditDay=$partfirstTime[0];//kreditin başladığı gün
		$creditMonth=$partfirstTime[1];//kreditin başladığı ay
		$creditYear=$partfirstTime[2];//kreditin başladığı il
		echo "<br>";
		$creditTime="";
		for($i=1;$i<=$kreditMuddeti;$i++)
		{
			if($creditMonth<=12)
			{
				if(strlen($creditMonth)==1)
				{
					include 'sil_credit_time_modul.php';
					$creditTime.=$creditDay.".0".$creditMonth.".".$creditYear.",";
				}
				else
				{
					include 'sil_credit_time_modul.php';
					$creditTime.=$creditDay.".".$creditMonth.".".$creditYear.",";
				}
			}
			else
			{
				$creditMonth=01;
				$creditYear++;
				$creditTime.=$creditDay."."."0".$creditMonth.".".$creditYear.",";
			}
			$creditMonth++;
		}
include 'endCredi.php';
	}
}
?>