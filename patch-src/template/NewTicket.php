<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['new_ticket_title'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>mytickets.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div>
		<hr>
		<form action="function/NewTicket.php" method="post">
			<div class="row pb-20">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['your_name'];?></label>
						<input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'].' '.$ClientInfo['hosting_client_lname'];?>" class="form-control disabled" required readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['email_address'];?></label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email'];?>" class="form-control disabled" required readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['ticket_subjet'];?></label>
						<input type="text" name="subject" class="form-control" placeholder="<?php echo $text['ticket_subjet_place'];?>" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['ticket_departament'];?></label>
						<select name="department" class="form-control" required>
					      <option value="" selected="selected" disabled="disabled"><?php echo $text['select_departament'];?></option>
					      <option value="hosting"><?php echo $text['departament_hosting'];?></option>
					      <option value="ssl"><?php echo $text['departament_ssl'];?></option>
					      <option value="tech"><?php echo $text['departament_technical'];?></option>
					      <option value="client"><?php echo $text['departament_customer'];?></option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['ticket_content'];?></label>
						<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
						<textarea name="editor" id="editor" placeholder="<?php echo $text['ticket_content_place'];?>" style="height: 200px;"></textarea>
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
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary"><?php echo $text['create_ticket'];?></button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>