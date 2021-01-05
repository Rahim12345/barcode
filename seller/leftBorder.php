<?php  ?>
<table class="table table-dark" style="width: 100%;font-size: 10px;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">İstehsalçı</th>
		      <th scope="col">Ünvan</th>
		      <th scope="col">Model</th>
		      <th scope="col">Kateqoriya</th>
		      <th scope="col">Seria(və ya Say)</th>
		      <th scope="col">N/S qiyməti ($)</th>
		      <th scope="col">K/S qiyməti ($)</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rowscategory as $rowcategory)
		  	{
		  		if($rowcategory["selling"]>$min)
		  		{
	  				$n++;
	  				?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $rowcategory["manufacturer"]; ?></td>
			      <td><?php echo $rowcategory["warehouse"]; ?></td>
			      <td><?php echo $rowcategory["model"]; ?></td>
			      <td><?php echo $rowcategory["category"]; ?></td>
			      <td>
			      	  <?php  
			          if($rowcategory["seria"]!="")
			          {
			            echo $rowcategory["seria"];
			          }
			          else
			          {
			            echo $rowcategory["dimension"];
			          }
			          ?>
			      </td>
			      <td><?php echo $rowcategory["selling"]; ?></td>
			      <td><?php echo $rowcategory["credit"]; ?></td>
			    </tr>
	  				<?php
		  		}
		  	}
		  	?>
		  <tr>
		  	<td colspan="8" style="text-align: center;font-size: 20px;color:orange;font-weight: bold;">
		  		<?php 
		  		if($n==0)
		  		{
		  			echo "Heç bir nəticə tapılmadı";
		  		}
		  		else
		  		{
		  			echo $min." AZN dən baha məhsul sayı ".$n;
		  		}
		  		?>
		  	</td>
		  </tr>
		  </tbody>
		</table> 