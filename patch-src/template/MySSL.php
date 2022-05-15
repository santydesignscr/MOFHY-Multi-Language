<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['my_ssl'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>newssl.php" class="btn text-white btn-success btn-sm"><?php echo $text['new_ssl_title'];?></a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th width="5%"><?php echo $text['id'];?></th>
						<th width="10%"><?php echo $text['order_id'];?></th>
						<th width="55%"><?php echo $text['domain_name'];?></th>
						<th width="10%"><?php echo $text['method'];?></th>
						<th width="10%"><?php echo $text['status'];?></th>
						<th width="10%"><?php echo $text['action'];?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_for`='".$ClientInfo['hosting_client_key']."' ORDER BY `ssl_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($SSLToken = mysqli_fetch_assoc($sql)){
								    $apiClient = new GoGetSSLApi();
								    $token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
								    $SSLInfo = $apiClient->getOrderStatus($SSLToken['ssl_key']);

				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $SSLInfo['order_id'];?></td>
						<td><?php echo $SSLInfo['domain'];?></td>
						<td>DNS</td>
						<td><?php 
							if($SSLInfo['status']=='processing'){
								echo '<span class="badge bg-secondary badge-pill">'.$text['processing'].'</span>';
							} elseif($SSLInfo['status']=='active'){
								echo '<span class="badge bg-success badge-pill text-dark">'.$text['active'].'</span>';
							} elseif($SSLInfo['status']=='cancelled'){
								echo '<span class="badge bg-light badge-pill text-dark">'.$text['cancelled'].'</span>';
							} elseif($SSLInfo['status']=='expired'){
								echo '<span class="badge bg-light badge-pill text-dark">'.$text['expired'].'</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>viewssl.php?ssl_id=<?php echo $SSLInfo['order_id'];?>" class="btn btn-sm btn-<?php
							if($SSLInfo['status']=='processing'){
								echo "secondary";
							} elseif($SSLInfo['status']=='active'){
								echo "success text-white";
							}
							else{
								echo "danger";
							}
						?>"><i class="fa fa-globe mr-5"></i> <?php echo $text['manage'];?></a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="6" class="text-center"><?php echo $text['noting_found'];?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> <?php echo $text['my_ssl_count'];?></p>
	</div>
</div>