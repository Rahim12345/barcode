<form action="" method="POST">
			<select class="custom-select my-1 mr-sm-2" id="warehouse" name="warehouse" style="width:150px;" >
				<option value="">Yerləşdiyi yer</option>
		<?php  
	$query4Warehouse=$conn->prepare("SELECT * FROM warehouse WHERE id>? ORDER BY name");
	$query4Warehouse->execute([0]);
	$rows4Warehouse=$query4Warehouse->fetchall(PDO::FETCH_ASSOC);
	$count4Warehouse=count($rows4Warehouse);
	if($count4Warehouse!=0)
	{
		foreach($rows4Warehouse as $row4Warehouse)
		{
			?>
			<option value="<?php echo $row4Warehouse["name"] ?>">
				<?php echo $row4Warehouse["name"] ?>
			</option>
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
				?>
				<option value="<?php echo $row4Store["name"] ?>">
					<?php echo $row4Store["name"] ?>
				</option>
				<?php
			}
		}
	}
	else
	{
		$query4Store=$conn->prepare("SELECT * FROM store WHERE id>? ORDER BY name");
		$query4Store->execute([0]);
		$rows4Store=$query4Store->fetchall(PDO::FETCH_ASSOC);
		$count4Store=count($rows4Store);
		if($count4Store!=0)
		{
			foreach($rows4Store as $row4Store)
			{
				?>
				<option value="<?php echo $row4Store["name"] ?>">
					<?php echo $row4Store["name"] ?>
				</option>
				<?php
			}
		}	
	}
		?>
			</select>

			<select class="custom-select my-1 mr-sm-2" id="model" name="model" style="width:150px;" >
				<option value="">Model seçin</option>
		<?php  
	$query4Models=$conn->prepare("SELECT * FROM models WHERE id>? ORDER BY name");
	$query4Models->execute([0]);
	$rows4Models=$query4Models->fetchall(PDO::FETCH_ASSOC);
	$count4Models=count($rows4Models);
	if($count4Models!=0)
	{
		foreach($rows4Models as $rows4Model)
		{
			?>
			<option value="<?php echo $rows4Model["name"] ?>">
				<?php echo $rows4Model["name"] ?>
			</option>
			<?php
		}
	}
		?>
			</select>
		<button type="submit" name="searchProduct" class="btn btn-primary">Axtar</button>
		</form>