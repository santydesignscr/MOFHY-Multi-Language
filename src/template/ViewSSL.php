<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['viewing_ssl'];?><?php echo $_GET['ssl_id']?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>myssl.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div><hr>
		<?php
			$apiClient = new GoGetSSLApi();
			$token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
			$SSLInfo = $apiClient->getOrderStatus($_GET['ssl_id']);
			$get_sql=mysqli_fetch_assoc($sql);
			if($SSLInfo['status']=='processing'){
				$Status = '<span class="badge badge-pill bg-secondary">'.$text['processing'].'</span>';
			} elseif($SSLInfo['status']=='active'){
				$Status = '<span class="badge badge-pill bg-success">'.$text['active'].'</span>';
			} elseif($SSLInfo['status']=='cancelled'){
				$Status = '<span class="badge badge-pill bg-light text-dark">'.$text['cancelled'].'</span>';
			} elseif($SSLInfo['status']=='expired'){
				$Status = '<span class="badge badge-pill bg-light text-dark">'.$text['expired'].'</span>';
			}
			if(empty($SSLInfo['begin_date'])){
				$Begin = '-- -- ----';
				$End = $Begin;
			}
			else{
				$Begin = $SSLInfo['begin_date'];
				$End = $SSLInfo['end_date'];
			}
		?>
		<div class="row mb-20">
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_status'];?></b>
					<span><?php echo $Status;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_domain'];?></b>
					<span><?php echo $SSLInfo['domain'];?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_start'];?></b>
					<span><?php echo $Begin;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_end'];?></b>
					<span><?php echo $End;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_metod'];?></b>
					<span>DNS</span>
				</div>
			</div>
			<?php if($SSLInfo['status']=='processing'){ 
				?>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b><?php echo $text['ssl_action'];?></b>
					<form action="function/CancelSSL.php" method="POST">
						<input type="hidden" name="order_id" value="<?php echo $_GET['ssl_id']?>">
						<button class="btn btn-sm btn-danger" name="submit"><i class="fa fa-trash mr-5"></i> <?php echo $text['cancell_ssl'];?></button>
					</form>
				</div>
			</div>	
				<?php
				$Record = explode(' ',$SSLInfo['approver_method']['dns']['record']);
			?>
			<div class="col-md-12">
			    <div class="my-5 mx-10">
                    <b><?php echo $text['private_key'];?></b>
                	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $get_sql['ssl_private_key'];?></textarea></pre>
  		        </div>
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_csr_code'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['csr_code'];?></textarea></pre>
				</div>
				<div class="my-10 mx-10">
					<b><?php echo $text['ssl_cname'];?></b>
					<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['0'];?>" readonly></pre>
				</div>
				<div class="my-10 mx-10">
					<b><?php echo $text['ssl_cname_content'];?></b>
					<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['2'];?>" readonly></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='active'){ ?>
			<div class="col-lg-12">
			    <div class="my-5 mx-10">
                    <b><?php echo $text['private_key'];?></b>
                	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $get_sql['ssl_private_key'];?></textarea></pre>
  		        </div>
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_cert_code'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['crt_code'];?></textarea></pre>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_ca_bundle'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['ca_code'];?></textarea></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='cancelled'){ ?>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_csr_code'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['csr_code'];?></textarea></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='expired'){ ?>
			<div class="col-lg-12">
			    <div class="my-5 mx-10">
                    <b><?php echo $text['private_key'];?></b>
                	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $get_sql['ssl_private_key'];?></textarea></pre>
  		        </div>
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_cert_code'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b><?php echo $text['ssl_ca_bundle'];?></b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>