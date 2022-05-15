<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['my_tickets'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>newticket.php" class="btn text-white btn-success btn-sm"><?php echo $text['new_ticket_title'];?></a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th width="10%"><?php echo $text['id'];?></th>
						<th width="55%"><?php echo $text['subjet'];?></th>
						<th width="15%"><?php echo $text['departament'];?></th>
						<th width="10%"><?php echo $text['status'];?></th>
						<th width="10%"><?php echo $text['action'];?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_for`='".$ClientInfo['hosting_client_key']."' ORDER BY `ticket_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($TicketInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php echo $TicketInfo['ticket_unique_id'];?></td>
						<td><?php echo str_rot13($TicketInfo['ticket_subject']);?></td>
						<td><?php 
							if($TicketInfo['ticket_department']=='hosting'){
								echo $text['departament_hosting'];
							} elseif($TicketInfo['ticket_department']=='ssl'){
								echo $text['departament_ssl'];
							} elseif($TicketInfo['ticket_department']=='tech'){
								echo $text['departament_technical'];
							} elseif($TicketInfo['ticket_department']=='client'){
								echo $text['dpartament_customer'];
							}
						?></td>
						<td><?php 
							if($TicketInfo['ticket_status']=='0'){
								echo '<span class="badge bg-secondary badge-pill">'.$text['ticket_open'].'</span>';
							} elseif($TicketInfo['ticket_status']=='1'){
								echo '<span class="badge bg-success badge-pill text-dark">'.$text['ticket_support_reply'].'</span>';
							} elseif($TicketInfo['ticket_status']=='2'){
								echo '<span class="badge bg-primary badge-pill text-white">'.$text['ticket_customer_reply'].'</span>';
							} elseif($TicketInfo['ticket_status']=='3'){
								echo '<span class="badge bg-light badge-pill text-dark">'.$text['ticket_closed'].'</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>viewticket.php?ticket_id=<?php echo $TicketInfo['ticket_unique_id'];?>#reply" class="btn btn-sm btn-<?php
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
						?>"><i class="fa fa-globe mr-5"></i> <?php echo $text['manage'];?></a></td>
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
		<p class="pb-10"><?php echo $Rows;?> <?php echo $text['my_tickets_count'];?></p>
	</div>
</div>