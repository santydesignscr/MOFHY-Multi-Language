<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My Tickets</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th>ID</th>
					<th>Subject</th>
					<th>Department</th>
					<th>Client Email</th>
					<th>Status</th>
					<th>Date</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` ORDER BY `ticket_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($TicketInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php echo $TicketInfo['ticket_unique_id'];?></td>
						<td><?php echo str_rot13($TicketInfo['ticket_subject']);?></td>
						<td><?php 
							if($TicketInfo['ticket_department']=='hosting'){
								echo 'Hosting Issue';
							} elseif($TicketInfo['ticket_department']=='ssl'){
								echo 'SSL Issue';
							} elseif($TicketInfo['ticket_department']=='tech'){
								echo 'Technical Issue';
							} elseif($TicketInfo['ticket_department']=='client'){
								echo 'Customer Issue';
							}
						?></td>
						<td><?php echo $TicketInfo['ticket_email'];?></td>
						<td><?php echo $TicketInfo['ticket_date']?></td>
						<td><?php 
							if($TicketInfo['ticket_status']=='0'){
								echo '<span class="badge bg-secondary badge-pill">Open</span>';
							} elseif($TicketInfo['ticket_status']=='1'){
								echo '<span class="badge bg-success badge-pill">Support Reply</span>';
							} elseif($TicketInfo['ticket_status']=='2'){
								echo '<span class="badge bg-primary badge-pill">Customer Reply</span>';
							} elseif($TicketInfo['ticket_status']=='3'){
								echo '<span class="badge bg-light text-dark badge-pill">Closed</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewticket.php?ticket_id=<?php echo $TicketInfo['ticket_unique_id'];?>#reply" class="btn btn-sm btn-<?php
							if($TicketInfo['ticket_status'] == 0){
								echo "secondary";
							} elseif($TicketInfo['ticket_status'] == 1){
								echo "success text-white";
							} elseif($TicketInfo['ticket_status'] == 2){
								echo "primary";
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
						<td colspan="5" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> Tickets Found</p>
	</div>
</div>