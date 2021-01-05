<form action="" method="POST">
<table>
	<tr>
		<td><label for="min">Minimum</label></td>
		<td><input type="text" id="min" min="0" max="9999" name="min" style="width:70px;"></td>
		<td rowspan ="2"><button type="submit" name="searchPrice" class="btn btn-primary">Axtar</button></td>
		<td>
			<?php  
			if(!empty($errorPrice))
			{
				echo $errorPrice;
			}
			?>
		</td>
	</tr>
	<tr>
		<td><label for="max">Maksimum</label></td>
		<td><input type="text" id="max" min="0" max="9999" name="max" style="width:70px;"></td>
	</tr>
</table>		
</form>