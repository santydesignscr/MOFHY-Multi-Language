<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Viewing Knowledgebase #<?php echo $_GET['knowledgebase_id']?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/knowledgebase.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $Knowledgebase = mysqli_fetch_assoc($sql);?>
		<div class="mb-20">
			<div class="row">
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Subject:</b>
						<span><?php echo $Knowledgebase['knowledgebase_subject'];?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Date:</b>
						<span><?php echo $Knowledgebase['knowledgebase_date'];?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<?php echo $Knowledgebase['knowledgebase_content'];?>
	</div>
</div>