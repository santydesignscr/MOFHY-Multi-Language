<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['account_settings_title'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>viewaccount.php?account_id=<?php echo $_GET['account_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div><hr>
		<?php $AccountInfo = mysqli_fetch_assoc($sql);?>
		<div class="mb-15">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['your_name'];?></label>
						<input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'].' '.$ClientInfo['hosting_client_lname'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['your_email'];?></label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['phone'];?></label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_phone'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['address'];?></label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_address'];?>" class="form-control disabled" readonly>
					</div>
				</div>
			</div>
			<div class="col-md-12"><hr></div>
			<form class="row" action="function/ChangePassword.php" method="post">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['new_pass'];?></label>
						<input type="password" name="new_password" placeholder="<?php echo $text['new_pass_place'];?>" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['old_pass'];?></label>
						<input type="password" name="old_password" placeholder="<?php echo $text['old_pass_place'];?>" class="form-control">
						<input type="hidden" name="account_username" value="<?php echo $AccountInfo['account_username'];?>">
						<input type="hidden" name="account_password" value="<?php echo $AccountInfo['account_password'];?>">
						<input type="hidden" name="account_key" value="<?php echo $AccountInfo['account_key'];?>">
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<input type="submit" name="submit" value="<?php echo $text['change_pass'];?>" class="btn btn-primary btn-sm text-white">
					</div>
				</div>
			</form><hr>
			<form  action="function/DeactivateAccount.php" method="post" onsubmit="
					var reason = document.getElementById('reason').value;
					if(reason.length<8){
						alert('<?php echo $text['reason_error'];?>');
						return false;
					}
					return true;
				">
				<p class="text-muted mx-10 alert alert-secondary"><?php echo $text['desactivation_alert'];?></p>
				<div class="mb-10 px-10">
					<label class="form-label required"><?php echo $text['desactivate_reason'];?></label>
					<textarea name="reason" placeholder="<?php echo $text['desactivate_reason_place'];?>" class="form-control" id="reason"></textarea>
					<input type="hidden" name="account_username" value="<?php echo $AccountInfo['account_username'];?>">
					<input type="hidden" name="account_key" value="<?php echo $AccountInfo['account_key'];?>">
				</div>
				<div class="mb-10 px-10">
					<input type="submit" name="submit" value="<?php echo $text['desactivate'];?>" class="btn btn-danger btn-sm text-white">
				</div>
			</form>
		</div>
	</div>
</div>
