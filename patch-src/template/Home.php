<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-1 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$acc = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_for`='".$ClientInfo['hosting_client_key']."' AND `account_status`=1");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($acc);?></h3>
					<i class="fa fa-shopping-cart fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="myaccounts.php" class="text-white"><?php echo $text['home_accounts'];?> <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-2 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$ssl = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_for`='".$ClientInfo['hosting_client_key']."'");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($ssl);?></h3>
					<i class="fa fa-shield-alt fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="myssl.php" class="text-white"><?php echo $text['home_ssl'];?> <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-3 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$tic = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_for`='".$ClientInfo['hosting_client_key']."' AND `ticket_status`=0 OR `ticket_for`='".$ClientInfo['hosting_client_key']."' AND `ticket_status`=1");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($tic);?></h3>
					<i class="fa fa-bullhorn fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="mytickets.php" class="text-white"><?php echo $text['home_tickets'];?> <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-4 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<h3 class="mb-0 pt-10 text-white">9</h3>
					<i class="fa fa-server fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="mytools.php" class="text-white"><?php echo $text['home_services'];?> <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title">
			  <?php echo $text['home_hosting_advice'];?>
			  </h2>
			  <p>
			  <?php echo $text['home_hosting_text'];?>
			  </p>
			  <div class="text-right">
			    <a href="myaccounts.php" class="btn btn-sm"><?php echo $text['home_hosting_buttom'];?></a>
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title">
			  <?php echo $text['home_ssl_advice'];?>
			  </h2>
			  <p>
			  <?php echo $text['home_ssl_advice_text'];?>
			  </p>
			  <div class="text-right">
			    <a href="myssl.php" class="btn btn-sm"><?php echo $text['home_ssl_buttom'];?></a>
			  </div>
			</div>
		</div>
	</div>
</div>