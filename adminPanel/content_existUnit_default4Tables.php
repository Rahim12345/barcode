<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-dark" style="width: 100%;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Vahid adı</th>
		      <th scope="col">Sil</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4Units as $rows4Unit)
		  	{
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $rows4Unit["name"]; ?></td>
			      <td><a href="removeUnit.php?id=<?php echo $rows4Unit["id"] ?>"><i class="fa fa-trash" style="color: white;" aria-hidden="true"></i></a></td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>