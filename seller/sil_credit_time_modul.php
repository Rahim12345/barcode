<?php  
if($creditYear%4==0)
{
	if($creditMonth=="02")
	{
		if($partfirstTime[0]==31)
		{
			$creditDay=29;
		}
		elseif($partfirstTime[0]==30)
		{
			$creditDay=29;
		}
		else
		{
			$creditDay=$partfirstTime[0];
		}
	}
	elseif($creditMonth=="04" || $creditMonth=="06" || $creditMonth=="09" || $creditMonth=="11")
	{
		if($partfirstTime[0]==31)
		{
			$creditDay=30;
		}
		else
		{
			$creditDay=$partfirstTime[0];
		}
	}
	else
	{
		$creditDay=$partfirstTime[0];
	}
}
else
{
	if($creditMonth=="02")
	{
		if($partfirstTime[0]==31)
		{
			$creditDay=28;
		}
		elseif($partfirstTime[0]==30)
		{
			$creditDay=28;
		}
		elseif($partfirstTime[0]==29)
		{
			$creditDay=28;
		}
		else
		{
			$creditDay=$partfirstTime[0];
		}
	}
	elseif($creditMonth=="04" || $creditMonth=="06" || $creditMonth=="09" || $creditMonth=="11")
	{
		if($partfirstTime[0]==31)
		{
			$creditDay=30;
		}
		else
		{
			$creditDay=$partfirstTime[0];
		}
	}
	else
	{
		$creditDay=$partfirstTime[0];
	}
}
?>