<div class="container-fluid" id='login'>	
	<div class="row">
		<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="card mx-30" style="opacity: 80%">
				<form action="function/ForgetPassword.php" method="post">
					<h5 class="m-0 text-center">Forget Password</h5><hr>
					<div class="mb-10">
						<label class="form-label required">Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="Email Address...">
					</div>
  					<div class="mb-10 d-grid">
						<button class="btn btn-primary btn-block" name="reset">Reset Password</button>
					</div>
				</form>
				<div class="nav-links">
					<a href="<?php echo $AreaInfo['area_url'];?>login.php">Login</a>
				</div>
			</div>
		</div>
	</div>
</div>