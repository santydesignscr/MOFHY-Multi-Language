<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['new_account_title'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>myaccounts.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div>
		<hr>
		<div class="row mb-10">
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
		<hr>
		<div class="col-md-12 mb-10">
			<div class="mb-10 px-10">
				<div class="tabs">
			        <button class="tab-item btn btn-sm" data-tab="SubDomain" id="DefaultClicked"><?php echo $text['subdomain'];?></button>
			        <button class="tab-item btn btn-sm" data-tab="CustomDomain"><?php echo $text['custom_domain'];?></button>
		        </div>
		        <div id="CustomDomain" class="tab-content">
						<div class="alert alert-secondary my-5"><?php echo $text['custom_domain_alert'];?><br>
							<ul class="mb-0">
								<li class="mb-0"><?php echo $HostingApi['api_ns_1']?></li>
								<li class="mb-0"><?php echo $HostingApi['api_ns_2']?></li>
							</ul>
						</div>
		        <label class="form-label required"><?php echo $text['custom_domain'];?></label>
					<div class="input-group">
					  <input type="text" name="domain" id="cudomain" class="form-control" placeholder="<?php echo $text['custom_domain_name_place'];?>">
					  <div class="input-group-append">
					  	<button name="submit" id="validate2" class="btn btn-primary"><?php echo $text['validate'];?></button>
					  </div>
					</div>		        
				</div>
			      <div id="SubDomain" class="tab-content">
					<label class="form-label required"><?php echo $text['subdomain_name'];?></label>
					<div class="input-group">
					  <input type="text" name="domain" id="sudomain" class="form-control" placeholder="<?php echo $text['custom_domain_name_place'];?>">
					  <div class="input-group-append">
					    <select class="form-control" style="border-radius: 0" id="extension" name="extension">
					    	<?php
					    		$sql = mysqli_query($connect,"SELECT * FROM `hosting_domain_extensions` ORDER BY 'extension_id'");
								if(mysqli_num_rows($sql)>0){
									while($Extension = mysqli_fetch_Assoc($sql)){
										echo "<option>".$Extension['extension_value']."</option>";
									}
								}
								else{
									echo('<option>.html-5.me</option>');
								}
					    	?>
					    </select>
					  </div>
					  <div class="input-group-append">
					  	<button name="submit" id="validate1" class="btn btn-primary"><?php echo $text['validate'];?></button>
					  </div>
					</div>
	      		  </div>
			</div>
		</div>
		<hr>
		<div class="col-md-12 mb-15">
			<form action="function/NewAccount.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required"><?php echo $text['hosting_package'];?></label>
							<input type="text" name="package" value="<?php echo $HostingApi['api_package'];?>" class="form-control disabled" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required"><?php echo $text['domain_name'];?></label>
							<input type="text" name="domain" id="validomain" placeholder="<?php echo $text['domain_name_place'];?>" class="form-control disabled" readonly required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required"><?php echo $text['new_account_username'];?></label>
							<input type="text" name="username" placeholder="<?php echo $text['new_account_username_place'];?>" class="form-control disabled" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required"><?php echo $text['new_account_password'];?></label>
							<input type="password" name="password" placeholder="<?php echo $text['new_account_password_place'];?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<button class="btn btn-primary btn-sm" name="submit"><?php echo $text['request_account'];?></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#validate1').click(function(){
			var domain = $('#sudomain').val();
			var extensions = $('#extension').val();
			var validomain = domain + extensions;
			$.post('function/ValidateDomain.php', {domain : validomain, submit: ""}, function(data){
				if(validomain != data){
					$('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
				}
				else{
					$('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo $text['domain_validate_success'];?></div>');
					$('#validomain').val(data);
				}
			});
		});
		$('#validate2').click(function(){
			var domain = $('#cudomain').val();
			$.post('function/ValidateDomain.php', {domain : domain, submit: ""}, function(data){
				if(domain != data){
					$('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
				}
				else{
					$('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo $text['domain_validate_success'];?></div>');
					$('#validomain').val(data);
				}
			});
		});
	});
</script>