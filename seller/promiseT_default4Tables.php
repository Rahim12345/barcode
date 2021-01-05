<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-dark" style="width: 100%;font-size: 2vh;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Müstərinin adı</th>
		      <th scope="col">Məhsulun adı</th>
		      <th scope="col">Satış Tarixi</th>
		      <th scope="col">Gün</th>
		      <th scope="col">Borc(AZN)</th>
		      <th scope="col">Ödə</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php 
		  	$sert=0; 
		  	$n=0;
		  	foreach($rows4Promise as $row4Promise)
		  	{
		  		$timer2Sec=$row4Promise["timer"]*24*60*60;
		  		$realSelldate=$row4Promise["date"];
		  		$realSelldate=strtotime($realSelldate);
		  		$promiseTime=$realSelldate+$timer2Sec;
		  		$interval=($promiseTime-strtotime(date("d.m.Y")))/(24*60*60);
		  		if($interval<=0)
		  		{
		  			$productDetails=$row4Promise["productDetails"];
					include 'openDetails.php';
			  		$n++;
			  		?>
					<tr>
				      <th scope="row"><?php echo $n; ?></th>
				      <td><?php echo $row4Promise["name"]; ?></td>
				      <td><?php echo $satılan_malın_adı; ?></td>
				      <td><?php echo $row4Promise["date"]; ?></td>
				      <td><?php echo $row4Promise["timer"]; ?></td>
				      <td><?php echo $row4Promise["price"]; ?></td>
				      <td><a style="color:white;" href="index.php?id=31&mid=<?php echo $row4Promise['id'] ?>"><i class='fas fa-coins'></i></a></td>
				    </tr>
			  		<?php
			  		$sert=1;
		  		}
		  		else
		  		{
		  			
		  		}
		  	}
		  	if($sert!=1)
		  	{
		  		?>
					<tr>
						<td colspan="7" style="text-align: center;font-size: 3vh">Bugünə söz verən yoxdur</td>
					</tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>