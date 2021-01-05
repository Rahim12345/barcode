<?php  
// $currentDate=date("d.m.Y");
$query4Debitors=$conn->prepare("SELECT * FROM creditdetails WHERE id>? AND given!=? AND remindMoney!=? ORDER BY id DESC");
$query4Debitors->execute([0,0,0]);
$rows4Debitors=$query4Debitors->fetchall(PDO::FETCH_ASSOC);
$count4Debitors=count($rows4Debitors);
$debitorsArray=[];
if($count4Debitors==0)
{
	include 'debitNoResult.php';
}
else
{
	foreach($rows4Debitors as $rows4Debitor)
	{
		if(strpos($rows4Debitor["creditTable"],$currentDate)!==false)
		{
			$debitorsArray[]=$rows4Debitor["id"];
		}
		else
		{
			continue;
		}
	}
	?>
	<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-light" id="dataTable" style="width: 100%;color:white;">
	<?php
	$countdebitorsArray=count($debitorsArray);
	if($countdebitorsArray==0)
	{
		?>
			<thead style="background-color: #1c4b79;">
			<tr>
			  <th scope="col" style="text-align: center;">(<?php echo $currentDate; ?>) tarixində kredit borcu olan yoxdur.</th>
			</tr>
			</thead>
			<tbody style="background-color: white;color:black;">

		<?php
	}
	else
	{
		?>
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
		$k=1;
		foreach($debitorsArray as $debitorArray)
		{
		$query4DebitorsCurrent=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		$query4DebitorsCurrent->execute([$debitorArray]);
		$rows4DebitorsCurrent=$query4DebitorsCurrent->fetchall(PDO::FETCH_ASSOC);
			foreach($rows4DebitorsCurrent as $row4DebitorsCurrent)
			{
				?>
				<tr>
			      <th scope="row"><?php echo $k; ?></th>
			      <td><?php echo $row4DebitorsCurrent["name"]; ?></td>
			      <td>
			      	<?php  
			      	$productDetails=$row4DebitorsCurrent["productDetails"];
					include 'openDetails.php';
					echo $satılan_malın_adı;
					?>
			      </td>
			      <td><?php echo $row4DebitorsCurrent["realTime"]; ?></td>
			      <td>
			      	<a href="index.php?id=12&mid=<?php echo $row4DebitorsCurrent['id'] ?>" style="color:white;"><i class='fas fa-coins' style="color:black;"></i></a>
			      </td>
			      <td><a href="index.php?id=9&mid=<?php echo $row4DebitorsCurrent['id'] ?>">Göz at</a></td>
			    </tr>
				<?php
			}
		$k++;
		}
	}
				?>
				</tbody>
		</table>      
    </div>
</div>
				<?php
}
?>