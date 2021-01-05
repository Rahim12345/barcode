<p style="background-color: orange;line-height: 40px;padding-left: 15px;border-radius: 10px;color: white;">
	<?php  
	if(!empty($error4worker))
	{
		echo $error4worker;
	}
	?>
</p>
<form action="" method="POST">
	<label class="my-1 mr-2" for="store">Mağazalar</label>
	<select class="custom-select my-1 mr-sm-2" id="store" name="store" >
		<option value="" selected>
			Mağaza seçin
		</option>
		<?php  
		foreach($rows4StoreInworker as $row4StoreInworker)
		{
			?>
				<option value='<?php echo $row4StoreInworker["name"]; ?>'><?php echo $row4StoreInworker["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<label class="my-1 mr-2" for="jobs">Vəzifə</label>
	<select class="custom-select my-1 mr-sm-2" id="jobs" name="job" >
		<option value="" selected>
			Vəzifə seçin
		</option>
		<?php  
		foreach($rows4JobsInworker as $row4JobsInworker)
		{
			?>
				<option value='<?php echo $row4JobsInworker["name"]; ?>'><?php echo $row4JobsInworker["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Ad<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="text" name="name" class="form-control" id="name" placeholder="Rahim" maxlength="51">
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Şifrə<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="password" name="password" class="form-control" id="password" placeholder="8-40 simvoldan ibarət bir şifrə" maxlength="51">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" name="workerAdd" class="btn btn-primary">İşçi&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
		</div>
	</div>
</form> 