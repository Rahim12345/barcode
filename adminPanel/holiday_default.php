<form action="" method="POST">
<?php  
$query4Worker=$conn->prepare("SELECT * FROM users WHERE id>? and status!=?");
$query4Worker->execute([0,"admin"]);
$rows4Worker=$query4Worker->fetchall(PDO::FETCH_ASSOC);
$count4Worker=count($rows4Worker);
if($count4Worker!=0)
{
$n=0;
	foreach($rows4Worker as $row4Worker)
	{
		$n++;
		?>
	<tr>
      <th scope="row"><?php echo $n; ?></th>
      <td style="text-align: center;"><?php echo $row4Worker["status"].":".$row4Worker["name"]; ?></td>
      <td style="text-align: center;">
      	<?php  
      	if($row4Worker["doorKey"]==1)
      	{
      		?>
			<input type="checkbox" title="Giriş bloklamaq üçün klikləyin" class="form-control" value="<?php echo $row4Worker["id"]; ?>" name="permitInputs[]" checked>
      		<?php
      	}
      	else
      	{
      		?>
			<input type="checkbox" title="Giriş bloklamaq üçün klikləyin" class="form-control" value="<?php echo $row4Worker["id"]; ?>" name="permitInputs[]">
      		<?php
      	}
      	?>
      </td>
    </tr>
		<?php
	}
	?>
	<tr>
		<td colspan="3"><input type="submit" name="permit" value="BLOKLA"  class="btn btn-info" style="width:100%;line-height: 40px;"></td>
	</tr>
	<?php
}
?>
</form>