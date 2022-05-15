<div class="container-fluid" id='login'>	
	<div class="row">
		<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="card mx-30" style="opacity: 80%">
				<form action="function/ResetPassword.php" method="post" onsubmit="
					var password = document.getElementById('password').value;
					var cpassword = document.getElementById('cpassword').value;
					if(password != cpassword){
						alert('<?php echo $text['password_error'];?>');
						return false;
					}
					return true;
				">
					<h5 class="m-0 text-center"><?php echo $text['reset_pass_title'];?></h5><hr>
					<div class="mb-10">
						<label class="form-label required"><?php echo $text['reset_pass_token'];?></label>
						<input type="text" name="token" class="form-control" placeholder="<?php echo $text['reset_pass_token_place'];?>">
					</div>
					<div class="mb-10">
						<label class="form-label required"><?php echo $text['reset_pass_pass'];?></label>
						<input type="password" name="password" id="password" class="form-control" placeholder="<?php echo $text['reset_pass_place'];?>">
					</div>
					<div class="col-md-12 px-5 mb-10">
							<label class="form-label required"><?php echo $text['reset_pass_confirm'];?></label>
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="<?php echo $text['reset_pass_confrim_place'];?>">
						</div>
  					<div class="mb-10 d-grid">
						<button class="btn btn-primary btn-block" name="reset"><?php echo $text['reset_pass_buttom'];?></button>
					</div>
				</form>
				<div class="nav-links">
					<a href="<?php echo $AreaInfo['area_url'];?>signup.php"><?php echo $text['bottom_nav_signup'];?></a> or <a href="<?php echo $AreaInfo['area_url'];?>forgetpassword.php"><?php echo $text['bottom_nav_reset_pass'];?></a>
				</div>
			</div>
		</div>
	</div>
</div>