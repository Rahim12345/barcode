<?php  
$query4Results=$conn->prepare("SELECT * FROM products WHERE (warehouse=? OR model=?) AND selled=? ORDER BY warehouse");
$query4Results->execute([$warehouseS,$models,"0"]);
$rows4Results=$query4Results->fetchall(PDO::FETCH_ASSOC);
$count4Results=count($rows4Results);
?>
<p style="background-color: green;color: white;line-height: 40px;padding-left: 15px;border-radius: 10px;">
<?php 
$count=count($rows4Results);
if($count==0)
{
echo "<u>$warehouseS $models</u> &nbspüzrə  heç bir məhsul tapılmadı";
}
else
{
echo "<u>$warehouseS $models</u> &nbspüzrə  $count ədəd məhsul tapıldı";
} 
?>
</p>
<table class="table table-dark" style="width: 100%;font-size: 10px;">
  <thead style="background-color: #1c4b79;">
    <tr>
      <th scope="col">№</th>
      <th scope="col">Ünvan</th>
      <th scope="col">Partnyor</th>
      <th scope="col">İstehsalçı</th>
      <th scope="col">Model</th>
      <th scope="col">Kateqoriya</th>
      <th scope="col">Seria(və ya Say)</th>
      <th scope="col">Tarix</th>
      <th scope="col">T/S qiyməti ($)</th>
      <th scope="col">N/S qiyməti ($)</th>
      <th scope="col">K/S qiyməti ($)</th>
      <th>Payla</th>
    </tr>
  </thead>
  <tbody style="background-color: #1c4b79;">
  	<?php  
  	$n=0;
  	foreach($rows4Results as $rows4Results)
  	{
  		$n++;
  		?>
		<tr>
	      <th scope="row"><?php echo $n; ?></th>
        <td><?php echo $rows4Results["warehouse"]; ?></td>
	      <td><?php echo $rows4Results["partnor"]; ?></td>
	      <td><?php echo $rows4Results["manufacturer"]; ?></td>
	      <td><?php echo $rows4Results["model"]; ?></td>
	      <td><?php echo $rows4Results["category"]; ?></td>
	      <td>
         <?php  
          if($rows4Results["seria"]=="")
          {
            echo $rows4Results["dimension"];
          }
          else
          {
            echo $rows4Results["seria"];
          }
          ?> 
        </td>
	      <td><?php echo $rows4Results["productDate"]; ?></td>
	      <td><?php echo $rows4Results["wholesale"]; ?></td>
	      <td><?php echo $rows4Results["selling"]; ?></td>
	      <td><?php echo $rows4Results["credit"]; ?></td>
        <td>
              <a href="index.php?id=20&pid=<?php echo $rows4Results["id"]; ?>">Payla</a>
        </td>
	    </tr>
  		<?php
  	}
  	?>
  </tbody>
</table>   