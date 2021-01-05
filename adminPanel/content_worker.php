<?php  
$query4StoreInworker=$conn->prepare("SELECT * FROM store WHERE id>?");
$query4StoreInworker->execute([0]);
$rows4StoreInworker=$query4StoreInworker->fetchall(PDO::FETCH_ASSOC);
$count4StoreInworker=count($rows4StoreInworker);
if($count4StoreInworker==0)
{
	$errorWorker="İlk öncə mağazalar əlavə etməlisiniz";
}
else
{
	$query4JobsInworker=$conn->prepare("SELECT * FROM jobs WHERE id>?");
	$query4JobsInworker->execute([0]);
	$rows4JobsInworker=$query4JobsInworker->fetchall(PDO::FETCH_ASSOC);
	$count4JobsInworker=count($rows4JobsInworker);	
	if($count4JobsInworker==0)
	{
		$errorWorker="İlk öncə vəzifələr əlavə etməlisiniz";
	}
	else
	{
		include 'content_worker_insert.php';
	}
}
include 'content_worker_default.php';
?>