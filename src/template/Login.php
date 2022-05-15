<div class="container-fluid" id='login'>	
	<div class="row">
		<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="card mx-30" style="opacity: 80%">
				<form action="function/Login.php" method="post">
					<h5 class="m-0 text-center"><?php echo $text['login_title'];?></h5><hr>
					<div class="mb-10">
						<label class="form-label required"><?php echo $text['email_address'];?></label>
						<input type="email" name="email" class="form-control" placeholder="<?php echo $text['email_address_place'];?>">
					</div>
					<div class="mb-10">
						<label class="form-label required"><?php echo $text['login_pass'];?></label>
						<input type="password" name="password" class="form-control" placeholder="<?php echo $text['login_pass_place'];?>">
					</div>
					  <div class="form-group">
					    <div class="custom-switch">
					      <input type="checkbox" name="remember" value="1" id="remember-my-information">
					      <label for="remember-my-information"><?php echo $text['login_remember'];?></label>
					    </div>
					  </div>
  					<div class="mb-10 d-grid">
						<button class="btn btn-primary btn-block" name="login"><?php echo $text['login_buttom'];?></button>
					</div>
				</form>
				<div class="nav-links">
					<a href="<?php echo $AreaInfo['area_url'];?>signup.php"><?php echo $text['bottom_nav_signup'];?></a> or <a href="<?php echo $AreaInfo['area_url'];?>forgetpassword.php"><?php echo $text['bottom_nav_reset_pass'];?></a>
				</div>
			</div>
		</div>
	</div>
</div>