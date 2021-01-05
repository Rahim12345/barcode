<div class="card shadow mb-4">
    <div class="card-body">
<?php  
$query4Warehouse=$conn->prepare("SELECT * FROM warehouse WHERE id>? ORDER BY name");
$query4Warehouse->execute([0]);
$rows4Warehouse=$query4Warehouse->fetchall(PDO::FETCH_ASSOC);
$count4Warehouse=count($rows4Warehouse);
if($count4Warehouse==0)
{
	$errorShare="Məhsulları bölüşmək üçün ilk öncə anbar daxil etməlisiniz! <br/> <a href='index.php?id=1' class='btn btn-primary'>Anbar <i class='fa fa-plus' aria-hidden='true'></i></a> <br/>";
	include 'shareErr.php';
}
else
{
	?>
	   <table class="table table-dark" style="width: 100%;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Ünvan</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4Warehouse as $row4Warehouse)
		  	{
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><a href="index.php?id=34&pid=<?php echo $pid; ?>&address=<?php echo $row4Warehouse["name"]; ?>"><?php echo $row4Warehouse["name"]; ?></a></td>
			    </tr>
		  		<?php
		  	}
$query4Store=$conn->prepare("SELECT * FROM store WHERE id>? ORDER BY name");
$query4Store->execute([0]);
$rows4Store=$query4Store->fetchall(PDO::FETCH_ASSOC);
$count4Store=count($rows4Store);
if($count4Store!=0)
{
			foreach($rows4Store as $row4Store)
		  	{
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><a href="index.php?id=34&pid=<?php echo $pid; ?>&address=<?php echo $row4Store["name"]; ?>"><?php echo $row4Store["name"]; ?></a></td>
			    </tr>
		  		<?php
		  	}
}
		  	?>
		  </tbody>
		</table>      
	<?php
}
?>
    </div>
</div>