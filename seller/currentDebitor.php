<div class="card shadow mb-4">
<div class="card-body">
   <table  id="dataTable" style="width: 100%;" class="table table-stripped" width="100%" style="font-size: 1.4vh;color:black;" cellspacing="0" data-toggle="table" data-show-toggle="true" data-cache="false" data-show-refresh="true" data-url="data.json" data-filter-control="true" data-side-pagination="server" data-search="true" data-sort-name="Id" data-sort-order="desc" data-pagination="true" data-page-size="10">
<?php  
// $currentDate="31.05.2020";
$currentDate=date("d.m.Y");
$query4Debitors=$conn->prepare("SELECT * FROM creditdetails WHERE id>?  ORDER BY id DESC");
$query4Debitors->execute([0]);
$rows4Debitors=$query4Debitors->fetchall(PDO::FETCH_ASSOC);
$count4Debitors=count($rows4Debitors);
$debitorsArray=[];
if($count4Debitors==0)
{
	echo "Sistemdə hələ kreditləşmə işi aparılmayıb";
}
else
{
	foreach($rows4Debitors as $rows4Debitor)
	{
		if($rows4Debitor["remindMoney"]!=$rows4Debitor["amountPaid"])
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
	}
	?>
	<?php
	$countdebitorsArray=count($debitorsArray);
	if($countdebitorsArray==0)
	{
		?>
			<thead style="background-color: #1c4b79;color:white;">
			<tr>
			  <th scope="col">Bugün(<?php echo $currentDate; ?>) kredit borcu olan yoxdur.</th>
			</tr>
			</thead>
			<tbody style="background-color: white;">

		<?php
	}
	else
	{
		?>
			<thead style="background-color: #1c4b79;color: white;">
			<tr>
				<th scope="col" colspan="6" style="text-align: center;"><?php echo "<b style='color:white;'>Bugün kredit borcu olanlar</b>" ?></th>
			</tr>
			<tr>
			  <th scope="col">№</th>
			  <th scope="col">Müstərinin adı</th>
			  <th scope="col">Məhsulun adı</th>
			  <th scope="col">Tarix</th>
			  <th scope="col">Ödə</th>
			  <th scope="col">Ətraflı</th>
			</tr>
			</thead>
			<tbody style="color:black;">
		<?php
		$k=1;
		foreach($debitorsArray as $debitorArray)
		{
		$query4DebitorsCurrent=$conn->prepare("SELECT * FROM creditdetails WHERE id=?");
		$query4DebitorsCurrent->execute([$debitorArray]);
		$rows4DebitorsCurrent=$query4DebitorsCurrent->fetchall(PDO::FETCH_ASSOC);
			foreach($rows4DebitorsCurrent as $row4DebitorsCurrent)
			{
				if($row4DebitorsCurrent["amountPaid"]<$row4DebitorsCurrent["remindMoney"])
				{
					$dd=$row4DebitorsCurrent["amountPaid"]/$row4DebitorsCurrent["avaragePay"];
					$fl=floor($dd);
					$row4DebitorsCurrentEx=explode(",", $row4DebitorsCurrent["creditTable"]);
					$dateCrstrtotime=$row4DebitorsCurrentEx[floor($fl)];
					$datestrtotime=strtotime(date("d.m.Y"));
					if(strtotime($row4DebitorsCurrentEx[$fl])-$datestrtotime!=0)
					{

					}
					else
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
					      <td><a href="index.php?id=12&mid=<?php echo $row4DebitorsCurrent['id'] ?>" style="color:white;"><i class='fas fa-coins' style="color:black;"></i></a></td>
					      <td><a href="index.php?id=10&mid=<?php echo $row4DebitorsCurrent['id'] ?>">Göz at</a></td>
					    </tr>
						<?php
					}
				}
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