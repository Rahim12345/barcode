<?php 
$partfirstTime=explode(".", $ilkinKreditTarixi);
if(count($partfirstTime)==3)
{
	if(is_numeric($malinQiymeti) && is_numeric($ilkinOdenis) && is_numeric($kreditMuddeti) && is_numeric($partfirstTime[0]) && is_numeric($partfirstTime[1]) && is_numeric($partfirstTime[2]))
	{
		if(strlen($partfirstTime[0])!=2 || strlen($partfirstTime[1])!=2 || strlen($partfirstTime[2])!=4)
		{
		$crederr="İlkin ödəniş tarixi vasitəsi ilə hackəmi çalışırsan?)";
		include 'sil_def_val.php';
		}
		else
		{
			if($partfirstTime[1]>=01 && $partfirstTime[1]<=12)
			{
				if($partfirstTime[2]%4==0)
				{
					if($partfirstTime[1]==02)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=29)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Fevral ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==04)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Aprel ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==06)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="İyun ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]=="09")
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Sentyabr ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==11)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Noyabr ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					else
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=31)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
				}
				else
				{
					if($partfirstTime[1]==02)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=28)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Fevral ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==04)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Aprel ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==06)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="İyun ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]=="09")
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Sentyabr ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					elseif($partfirstTime[1]==11)
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=30)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Noyabr ayı üçün doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
					else
					{
						if($partfirstTime[0]>=01 && $partfirstTime[0]<=31)
						{
	include 'sil_credit_limit_time.php';
						}
						else
						{
	$crederr="Doğru bir gün daxil edin";
	include 'sil_def_val.php';
						}
					}
				}
			}
			else
			{
				$crederr="Bir ildə 12 ay var!";
				include 'sil_def_val.php';
			}
		}
	}
	else
	{
		$crederr="Lütfən xanalara doğru informasiya daxil edin";
		include 'sil_def_val.php';
	}
}
else
{
	$crederr="İlkin ödəniş tarixinə doğru formatda bir tarix daxil edin";
		include 'sil_def_val.php';
}
?>