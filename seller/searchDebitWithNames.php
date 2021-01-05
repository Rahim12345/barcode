<?php  
$query4DebitorsWithNames=$conn->prepare("SELECT * FROM creditdetails WHERE name LIKE ? AND remindMoney!=? ORDER BY id DESC");
$query4DebitorsWithNames->execute(["%$currentDate%",0]);
$rows4DebitorsWithNames=$query4DebitorsWithNames->fetchall(PDO::FETCH_ASSOC);
$count4DebitorsWithNames=count($rows4DebitorsWithNames);
$debitorsWithNamesArray=[];
if($count4DebitorsWithNames==0)
{
	include 'debitNoResult.php';
}
else
{
	?>
	<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-light table-striped" id="dataTable" style="width: 100%;color: white;">
	   	<thead style="background-color: #1c4b79;">
			<tr>
			  <th scope="col">№</th>
			  <th scope="col">Müstərinin adı</th>
			  <th scope="col">Məhsulun adı</th>
			  <th scope="col">Tarix</th>
			  <th scope="col">Ödə</th>
			  <th scope="col">Ətraflı</th>
			</tr>
			</thead>
			<tbody style="background-color: white;color:black;">
	<?php
	$f=1;
	foreach($rows4DebitorsWithNames as $rows4DebitorsWithName)
	{
		$productDetails=$rows4DebitorsWithName["productDetails"];
		include 'openDetails.php';
		?>
		<tr>
	      <th scope="row"><?php echo $f; ?></th>
	      <td><?php echo $rows4DebitorsWithName["name"]; ?></td>
	      <td><?php echo $satılan_malın_adı; ?></td>
	      <td><?php echo $rows4DebitorsWithName["sellerTime"]; ?></td>
	      <td>
	      	<a href="index.php?id=12&mid=<?php echo $rows4DebitorsWithName['id'] ?>" style="color:white;"><i class='fas fa-coins' style="color:black;"></i></a>
	      </td>
	      <td><a href="index.php?id=9&mid=<?php echo $rows4DebitorsWithName['id'] ?>">Göz at</a></td>
	    </tr>
		<?php
		$f++;	
	}
	?>
			</tbody>
		</table>      
    </div>
</div>
	<?php
}
?>