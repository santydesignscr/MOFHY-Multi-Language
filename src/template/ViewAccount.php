<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['viewing_account'];?> (<?php echo $_GET['account_id']?>)</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>myaccounts.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div><hr>
		<?php $AccountInfo = mysqli_fetch_assoc($sql);
			if($AccountInfo['account_status']==1){
		?>
			<div class="row pb-10">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 px-5 text-center py-15">
						<i class="fa fa-laptop fa-10x"></i>
					</div>
					<div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
						<a href="cplogin.php?account_id=<?php echo $AccountInfo['account_username']?>" target="_blank" class="btn btn-success text-white btn-block my-5 btn-rounded"><?php echo $text['control_panel'];?></a>
						<a href="https://filemanager.ai/new/#/c/ftpupload.net/<?php echo $AccountInfo['account_username'].'/'.base64_encode(json_encode(['t'=>'ftp','c'=>['v'=>1,'p'=>$AccountInfo['account_password']]]));?>" target="_blank" class="btn btn-primary text-white btn-block my-5 btn-rounded"><?php echo $text['view_account_files'];?></a>
						<a href="settings.php?account_id=<?php echo $AccountInfo['account_username']?>" class="btn btn-secondary btn-block my-5 btn-rounded"><?php echo $text['view_account_settings'];?></a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Username:</b>
					<span><?php echo $AccountInfo['account_username']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Password:</b>
					<span class="badge"><?php echo $AccountInfo['account_password']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_username'];?></b>
					<span><?php echo $AccountInfo['account_domain']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['cpanel_domain'];?></b>
					<span><?php echo $HostingApi['api_cpanel_url']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_status'];?></b>
					<span>
						<?php echo '<span class="badge badge-pill bg-success text-dark">Active</span>';
						?>
					</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_creation_date'];?></b>
					<span><?php echo $AccountInfo['account_date']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_server_ip'];?></b>
					<span><?php echo $HostingApi['api_server_ip']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_your_ip'];?></b>
					<span><?php echo UserInfo::get_ip()?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_ftp_host'];?></b>
					<span>ftpupload.net</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_ftp_port'];?></b>
					<span>21</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_mysql_host'];?></b>
					<span><?php echo str_replace('cpanel', $AccountInfo['account_sql'], $HostingApi['api_cpanel_url'])?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_mysql_port'];?></b>
					<span>3306</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['name_server1'];?></b>
					<span><?php echo $HostingApi['api_ns_1']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['name_server2'];?></b>
					<span><?php echo $HostingApi['api_ns_2']?></span>
				</div>
			</div>
		</div>
		<?php } else {?>
		<div class="row pb-10">
			<div class="col-md-12">
				<div class="row">
					<?php
						if($AccountInfo['account_status']=='3'){
							echo '<div class="alert alert-secondary col-md-12"><i class="fa fa-cog fa-spin mr-5"></i>'.$text['processing_alert'].'</div>';
						} elseif($AccountInfo['account_status']=='0'){
							echo '<div class="alert alert-secondary col-md-12">'.$text['suspended_alert'].'</div>';
						} elseif($AccountInfo['account_status']=='2'){
						    echo '<div class="alert alert-danger col-md-12">'.$text['desactivated_alert'].'</div>';
						} elseif($AccountInfo['account_status']=='4'){
							echo '<div class="alert alert-secondary col-md-12"><i class="fa fa-cog fa-spin mr-5"></i>'.$text['desactivating_alert'].'</div>';
						}
					?>
					<div class="col-md-4 px-5 text-center py-15">
						<i class="fa fa-laptop fa-10x"></i>
					</div>
					<div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
						<a class="btn btn-success text-white btn-block my-5 btn-rounded disabled"><?php echo $text['control_panel'];?></a>
						<a class="btn btn-primary text-white btn-block my-5 btn-rounded disabled"><?php echo $text['view_account_files'];?></a>
						<?php
							if($AccountInfo['account_status']=='2'){
						?>
						<form action="function/ReactivateAccount.php" method="post">
							<input type="hidden" name="key" value="<?php echo $AccountInfo['account_key']?>">
							<input type="hidden" name="username" value="<?php echo $AccountInfo['account_username']?>">
							<button class="btn btn-secondary btn-block my-5 btn-rounded" name="submit"><?php echo $text['view_account_reactivate'];?></button>
						</form>
						<?php
						}
							else{
						?>
							<a href="newticket.php" target="_blank" class="btn btn-secondary btn-block my-5 btn-rounded"><?php echo $text['view_account_open_ticket'];?></a>
							<?php
							}
						?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_username'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_password'];?></b>
					<span><kbd>NaN</kbd></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_domain'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['cpanel_domain'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Status:</b>
					<span>
						<?php if($AccountInfo['account_status']=='0'){
								echo '<span class="badge badge-pill bg-light text-dark">'.$text['suspended'].'</span>';
							} elseif($AccountInfo['account_status']=='1'){
								echo '<span class="badge badge-pill bg-success text-dark">'.$text['active'].'</span>';
							} elseif($AccountInfo['account_status']=='2'){
								echo '<span class="badge badge-pill bg-light text-dark">'.$text['desactivated'].'</span>';
							} elseif($AccountInfo['account_status']=='3'){
								echo '<span class="badge badge-pill bg-secondary">'.$text['setting_up'].'</span>';
							} elseif($AccountInfo['account_status']=='4'){
								echo '<span class="badge badge-pill bg-secondary">'.$text['desactivating'].'</span>';
							}?>
					</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_creation_date'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_server_ip'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_your_ip'];?></b>
					<span><?php echo UserInfo::get_ip()?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_ftp_host'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_ftp_port'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_mysql_host'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['account_mysql_port'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['name_server1'];?></b>
					<span>NaN</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b><?php echo $text['name_server2'];?></b>
					<span>NaN</span>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['account_domains'];?></h5>
		</div>
		<hr>
		<div class="mb-10">
			<?php 
			use \InfinityFree\MofhClient\Client;
			if($AccountInfo['account_status']==1){
				$client = Client::create();
				$request = $client->getUserDomains(['username' => $AccountInfo['account_username']]);
				$response = $request->send();
				$res = $response->getDomains();
				if(count($res)>0){
					foreach($res as $domain){
						$link = "https://filemanager.ai/new/#/c/ftpupload.net/".$AccountInfo['account_username'].'/'.base64_encode(json_encode(['t'=>'ftp','c'=>['v'=>1,'p'=>$AccountInfo['account_password'],'i' => "/".$domain."/htdocs/"]]));
						echo "<div class='d-flex justify-content-between align-items-center m-5'>
						<span>".$domain."</span>
						<span><a href='".$link."' class='btn btn-sm btn-square btn-secondary' target='_blank'><i class='fa fa-file-import'></i></a></span>
					</div>";
					}
				}
				else{
					echo "<p class='text-center'>".$text['no_domains_found']."</p>";
				}
			}
			else{
				echo "<p class='text-center'>".$text['no_domains_found']."</p>";
			}
			?>
		</div>
	</div>
</div>