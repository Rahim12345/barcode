<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-dark" id="dataTable" style="width: 100%;font-size: 1.8vh;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Müstərinin adı</th>
		      <th scope="col">Məhsulun adı</th>
		      <th scope="col">Tarix</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: white;color: black;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4mySelledProducts as $rows4mySelledProduct)
		  	{
		  		$productDetails=$rows4mySelledProduct["productDetails"];
				include 'openDetails.php';
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $rows4mySelledProduct["name"]; ?></td>
			      <td><?php echo $satılan_malın_adı_qiymetile; ?></td>
			      <td><?php echo $rows4mySelledProduct["date"]; ?></td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>