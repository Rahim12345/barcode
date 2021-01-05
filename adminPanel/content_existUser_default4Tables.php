<div class="card shadow mb-4">
    <div class="card-body">
	   <table class="table table-dark" style="width: 100%;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Adı</th>
		      <th scope="col">Şifrə</th>
		      <th scope="col">Mağaza</th>
		      <th scope="col">Vəzifə</th>
		      <th scope="col">Şifrə dəyiş</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4Users as $rows4User)
		  	{
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $rows4User["name"]; ?></td>
			      <td><?php echo $rows4User["password"]; ?></td>
			      <?php  
			      if($rows4User["status"]=="admin")
			      {
			      	?>
					<td>BÜTÜN</td>
			      	<?php
			      }
			      else
			      {
			      	?>
					<td><?php echo $rows4User["store"]; ?></td>
			      	<?php
			      }
			      ?>
			      <td><?php echo $rows4User["status"]; ?></td>
			      <td><a href="index.php?id=21&uid=<?php echo $rows4User["id"] ?>">DƏYİŞ</a></td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>