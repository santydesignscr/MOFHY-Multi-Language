<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['knowledgde_title'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>index.php" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<tr>
					<th width="5%"><?php echo $text['id'];?></th>
					<th width="65%"><?php echo $text['subjet'];?></th>
					<th width="15%"><?php echo $text['date'];?></th>
					<th width="15%"><?php echo $text['action'];?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_knowledgebase` ORDER BY `knowledgebase_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($Knowledgebase = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $Knowledgebase['knowledgebase_subject'];?></td>
						<td><?php echo $Knowledgebase['knowledgebase_date'];?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>viewknowledgebase.php?knowledgebase_id=<?php echo $Knowledgebase['knowledgebase_id'];?>" class="btn btn-sm btn-secondary"><i class="fa fa-book mr-5"></i> <?php echo $text['read'];?></a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="5" class="text-center"><?php echo $text['noting_found'];?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> <?php echo $text['knowledgde_count'];?></p>
	</div>
</div>