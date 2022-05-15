<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My SSL</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th width="5%">ID</th>
					<th width="10%">Order ID</th>
					<th width="55%">Domain Name</th>
					<th width="10%">Method</th>
					<th width="10%">Status</th>
					<th width="10%">Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` ORDER BY `ssl_id` DESC");
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
								echo '<span class="badge bg-secondary badge-pill">Processing</span>';
							} elseif($SSLInfo['status']=='active'){
								echo '<span class="badge bg-success badge-pill">Active</span>';
							} elseif($SSLInfo['status']=='cancelled'){
								echo '<span class="badge bg-light text-dark badge-pill">Cancelled</span>';
							} elseif($SSLInfo['status']=='expired'){
								echo '<span class="badge bg-light text-dark badge-pill">Expired</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewssl.php?ssl_id=<?php echo $SSLInfo['order_id'];?>" class="btn btn-sm btn-<?php
							if($SSLInfo['status']=='processing'){
								echo "secondary";
							} elseif($SSLInfo['status']=='active'){
								echo "success text-white";
							}
							else{
								echo "danger";
							}
						?>"><i class="fa fa-globe mr-5"></i> Manage</a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="6" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> SSL Found</p>
	</div>
</div>