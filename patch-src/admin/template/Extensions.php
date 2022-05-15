<div class="container-fluid">
	<div class="card p-15">
		<div class="d-flex justify-content-between align-items-center px-5">
			<h5 class="m-0">Extensions</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		  <form action="function/NewExtension.php" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-5 px-10">
						<label class="form-label required">New Domain Extension</label>
							<div class="input-group">
							  <input type="text" name="domain" id="cudomain" class="form-control" placeholder="eg .example.com">
							  <div class="input-group-append">
							  	<button name="submit" class="btn btn-primary">Register</button>
							  </div>
							</div>		        
						</div>
					</div>
				</div>
			</form>
			<h6 class="mb-5 px-10">Registered Extensions</h6>
			<ul class="list-unstyled mb-10 px-10">
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_domain_extensions` ORDER BY `extension_id` DESC");
						if(mysqli_num_rows($sql)>0){
							while($Extensions = mysqli_fetch_assoc($sql)){
					?>
						<li class="d-flex justify-content-between align-items-center mb-5">
							<?php 
								echo $Extensions['extension_value'];
							?>
							<a href="function/DeleteExtension.php?extension=<?php echo $Extensions['extension_value'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash mr-5"></i> DELETE</a>
						</li>
					<?php
							}
						}
						else{
					?>
						<p class="text-center my-0">No extensions found</p>
					<?php
						}
					?>
			</ul>
		</div>
	</div>
</div>