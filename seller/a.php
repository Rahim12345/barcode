<?php  
include '../include/config.php';
$sql='SELECT * FROM bmk INNER JOIN creditdetails ON bmk.id=creditdetails.realbmk INNER JOIN cash ON creditdetails.realbmk=cash.realbmk INNER JOIN topdan ON cash.realbmk=topdan.realbmk';
$borclular=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
print_r($borclular);
foreach($borclular as $borclu)
{
	print_r($borclu)."<br/>";
	if($borclu["sellStyle"]==1)
	{

	}
}
?>