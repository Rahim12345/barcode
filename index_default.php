<div class="card-body" style="width:360px;">
	<div style="background-color: orange;margin-bottom: 20px;padding-left: 10px;border-radius: 10px;color:white;line-height: 30px;"><?php if(!empty($error)){ echo $error;} ?></div>
	<form action="" method="POST">
		<div class="input-group form-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="color:orange;"></i></span>
			</div>
			<input type="text" name="name" value="" class="form-control" placeholder="Ad">
			
		</div>
		<div class="input-group form-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-key" style="color:orange;"></i></span>
			</div>
			<input type="password" name="password" value="" class="form-control" placeholder="Şifrə">
		</div>
		<div class="form-group">
			<input type="submit" name="login" value="Daxil ol" class="btn float-right login_btn" style="background-color:orange;color:white;">
		</div>
	</form>
</div>