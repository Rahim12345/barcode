<p style="background-color: orange;line-height: 40px;padding-left: 15px;border-radius: 10px;color: white;">
	<?php  
	if(!empty($errorProduct))
	{
		echo $errorProduct;
	}
	?>
</p>
<form action="" method="POST">
	<label class="my-1 mr-2" for="partnor">Partnyor</label>
	<select class="custom-select my-1 mr-sm-2" id="partnor" name="partnor4Product" >
		<option value="" selected>
			Partnyor seçin
		</option>
		<?php  
		foreach($rows4PartnorInAddProduct as $row4PartnorInAddProduct)
		{
			?>
				<option value='<?php echo $row4PartnorInAddProduct["name"]; ?>'><?php echo $row4PartnorInAddProduct["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<label class="my-1 mr-2" for="manufacturers">İstehsalçı</label>
	<select class="custom-select my-1 mr-sm-2" id="manufacturers" name="manufacturer4Product" >
		<option value="" selected>
			İstehsalçı seçin
		</option>
		<?php  
		foreach($rows4manufacturerInAddProduct as $row4manufacturerInAddProduct)
		{
			?>
				<option value='<?php echo $row4manufacturerInAddProduct["name"]; ?>'><?php echo $row4manufacturerInAddProduct["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<label class="my-1 mr-2" for="model4Product">Model</label>
	<select class="custom-select my-1 mr-sm-2" id="model4Product" name="model4Product" >
		<option value="" selected>
			Model seçin
		</option>
		<?php  
		foreach($rows4ModelsInAddProduct as $row4ModelsInAddProduct)
		{
			?>
				<option value='<?php echo $row4ModelsInAddProduct["name"]; ?>'><?php echo $row4ModelsInAddProduct["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<label class="my-1 mr-2" for="categor">Kateqoriya</label>
	<select class="custom-select my-1 mr-sm-2" id="categor" name="category4Product" >
		<option value="" selected>
			Kateqoriya seçin
		</option>
		<?php  
		foreach($rows4CategoryInAddProduct as $row4CategoryInAddProduct)
		{
			?>
				<option value='<?php echo $row4CategoryInAddProduct["name"]; ?>'><?php echo $row4CategoryInAddProduct["name"]; ?></option>
			<?php
		}
		?>
	</select>
	<br>
	<div class="form-group row">
		<label for="factura" class="col-sm-2 col-form-label">Qaimə nömrəsi<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="text" name="factura" class="form-control" id="factura" placeholder="Qaimə nömrəsini daxil edin" maxlength="50">
		</div>
	</div>
	<div class="form-group row">
		<label for="date" class="col-sm-2 col-form-label">Tarix<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="text" name="date" class="form-control" id="date" placeholder="15.06.2020" value="<?php echo date("d.m.Y") ?>" maxlength="10">
		</div>
	</div>
	<div class="form-group row">
		<label for="wholesale" class="col-sm-2 col-form-label">Topdan qiymət<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="number" name="wholesale" class="form-control" id="wholesale" placeholder="250" min="0" max="9999">
		</div>
	</div>
	<div class="form-group row">
		<label for="selling" class="col-sm-2 col-form-label">Satış qiymət<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="number" name="selling" class="form-control" id="selling" placeholder="290" min="0" max="9999">
		</div>
	</div>
	<div class="form-group row">
		<label for="credit" class="col-sm-2 col-form-label">Kredit qiymət<sup>*</sup></label>
		<div class="col-sm-10">
		  <input type="number" name="credit" class="form-control" id="credit" placeholder="350" min="0" max="9999">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
		  <label for="seria" class="col-form-label"></label>
		  <button type="button" class="btn btn-success" onclick="hdd();">Vahidlə</button>
		  <span id="demo" style="display: none;">4 rəqəmdən az sayda yazılan ədədləri sistem(ədəd,kq,qram,litr...) kimi başa düşür</span>
		</div>
	</div>
	<div class="form-group row" id="sh1">
		<label for="seria" class="col-sm-2 col-form-label">Seria</label>
		<div class="col-sm-10">
		  <input type="text" name="serias[]" class="form-control" id="seria" maxlength="100">
		</div>
	</div>
	<div class="form-group row" id="addDiv">
		<div class="col-sm-12" style="text-align: right;">
			<button type="button" id="new" class="btn btn-primary">Yeni seria&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" name="productAdd" class="btn btn-primary">Məhsul&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
		</div>
	</div>
</form>