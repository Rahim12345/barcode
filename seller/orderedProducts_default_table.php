<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-dark" id="dataTable" style="width: 100%;font-size: 1.8vh;">
		  <thead style="background-color: #1c4b79;color:white;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Müstərinin adı</th>
		      <th scope="col">Müstərinin ünvanı</th>
		      <th scope="col">Telefon nömrəsi</th>	
		      <th scope="col">Məhsulun adı</th>
		      <th scope="col">Göndər</th>
		    </tr>
		  </thead>
		  <tfoot style="background-color: #1c4b79;color:white;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Müstərinin adı</th>
		      <th scope="col">Müstərinin ünvanı</th>
		      <th scope="col">Telefon nömrəsi</th>	
		      <th scope="col">Məhsulun adı</th>
		      <th scope="col">Göndər</th>
		    </tr>
		  </tfoot>
		  <tbody style="color: black;background-color: white;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4orderedProducts as $rows4orderedProduct)
		  	{
		  		$productDetails=$rows4orderedProduct["productDetails"];
				include 'openDetails.php';
		  		$n++;
		  		?>
				<tr>
					<th scope="row"><?php echo $n; ?></th>
					<td><?php echo $rows4orderedProduct["name"]; ?></td>
					<td><?php echo $rows4orderedProduct["address"]; ?></td>
					<td><?php echo $rows4orderedProduct["telno"]; ?></td>
					<td><?php echo $satılan_malın_adı_qiymetile; ?></td>
					<td>
						<a href="index.php?id=23&Cid=<?php echo $rows4orderedProduct["id"]; ?>"><i class="fa fa-truck fa-sm fa-fw mr-2 text-black-400" style="font-size: 18px;color: black;" aria-hidden="true"></i></a>
					</td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>