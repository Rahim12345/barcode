<table class="table table-dark" style="width: 100%;font-size: 10px;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">İstehsalçı</th>
		      <th scope="col">Model</th>
		      <th scope="col">Kateqoriya</th>
		      <th scope="col">Seria</th>
		      <th scope="col">Nağd satış qiyməti ($)</th>
		      <th scope="col">Kreditlə satış qiyməti ($)</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4Min as $row4Min)
		  	{
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $row4Min["manufacturer"]; ?></td>
			      <td><?php echo $row4Min["model"]; ?></td>
			      <td><?php echo $row4Min["category"]; ?></td>
			      <td><?php echo $row4Min["seria"]; ?></td>
			      <td><?php echo $row4Min["selling"]; ?></td>
			      <td><?php echo $row4Min["credit"]; ?></td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>  