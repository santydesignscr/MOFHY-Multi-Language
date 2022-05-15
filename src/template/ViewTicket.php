<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['viewing_ticket'];?><?php echo $_GET['ticket_id']?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>mytickets.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div><hr>
		<?php $TicketInfo = mysqli_fetch_assoc($sql);?>
		<div class="mb-20">
			<div class="row">
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b><?php echo $text['view_ticket_subjet'];?></b>
						<span><?php echo str_rot13($TicketInfo['ticket_subject']);?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b><?php echo $text['view_ticket_status'];?></b>
						<span><?php 
							if($TicketInfo['ticket_status']=='0'){
								echo '<span class="badge bg-secondary">'.$text['ticket_open'].'</span>';
							} elseif($TicketInfo['ticket_status']=='1'){
								echo '<span class="badge bg-success text-white">'.$text['ticket_support_reply'].'</span>';
							} elseif($TicketInfo['ticket_status']=='2'){
								echo '<span class="badge bg-primary">'.$text['ticket_customer_reply'].'</span>';
							} elseif($TicketInfo['ticket_status']=='3'){
								echo '<span class="badge bg-light">'.$text['ticket_closed'].'</span>';
							}
						?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b><?php echo $text['ticket_departament'];?></b>
						<span><?php 
							if($TicketInfo['ticket_department']=='hosting'){
								echo $text['departament_hosting'];
							} elseif($TicketInfo['ticket_department']=='ssl'){
								echo $text['departament_ssl'];
							} elseif($TicketInfo['ticket_department']=='tech'){
								echo $text['departament_technical'];
							} elseif($TicketInfo['ticket_department']=='client'){
								echo $text['departament_customer'];
							}
						?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b><?php echo $text['view_ticket_date'];?></b>
						<span><?php echo $TicketInfo['ticket_date'];?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card p-10">
		<div class="d-flex justify-content-between align-items-center px-5">
			<b class="py-5"><?php echo $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname'];?></b>
			<span><?php echo $TicketInfo['ticket_date'];?></span>
		</div><hr>
		<div class="px-10 m-5">
			<?php echo str_rot13($TicketInfo['ticket_content']);?>
		</div>
	</div>
	<?php 
		$sql = mysqli_query($connect,"SELECT * FROM `hosting_ticket_replies`WHERE `reply_for`='".$TicketInfo['ticket_unique_id']."'");
		if(mysqli_num_rows($sql)>0){
			while($ReplyInfo = mysqli_fetch_assoc($sql)){
				if($ReplyInfo['reply_from'] == $ClientInfo['hosting_client_key']){
					$From = $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname'];
				}
				else{
					$From = $text['staff_member'];
				}
	?>
		<div class="card p-10">
			<div class="d-flex justify-content-between align-items-center px-5">
				<b class="py-5"><?php echo $From;?></b>
				<span><?php echo $ReplyInfo['reply_date'];?></span>
			</div><hr>
			<div class="px-10 m-5">
				<?php echo str_rot13($ReplyInfo['reply_content']);?>
			</div>
		</div>
	<?php 
			}
		} else { 
	?>
		<div class="card p-10">
			<div class="text-center">
				<p><?php echo $text['view_ticket_no_reply'];?></p>
			</div>
		</div>
	<?php } ?>
	<div class="card p-10" id="reply">
		<?php if($TicketInfo['ticket_status']=='3'){ ?>
			<div class="text-center">
				<p><?php echo $text['view_ticket_cant_reply'];?></p>
			</div>
		<?php } else { ?>
				<form action="function/ReplyTicket.php" method="post" class="p-10">
					<div class="form-group">
						<label class="form-label required"><?php echo $text['view_ticket_reply_content'];?></label>
						<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
						<textarea name="editor" id="editor" style="height: 200px;"></textarea>
						<script type="text/javascript">
						    ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .then( editor => {
                                console.log( editor );
                            } )
                            .catch( error => {
                                console.error( error );
                            } );
						</script>
						<input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_unique_id'];?>">
					</div>
					<div class="form-group my-0">
						<button class="btn btn-sm btn-primary" name="submit"><?php echo $text['add_ticket_reply'];?></button>
						<a href="function/CloseTicket.php?ticket_id=<?php echo $_GET['ticket_id']?>" class="btn btn-danger btn-sm"><?php echo $text['close_ticket'];?></a>
					</div>
				</form>
		<?php } ?>
	</div>
</div>