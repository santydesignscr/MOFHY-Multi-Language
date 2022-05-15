<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0"><?php echo $text['xml_to_json_title'];?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>mytools.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $text['return'];?></a>
		</div>
		<hr>
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
						<label class="form-label required"><?php echo $text['company_name'];?></label>
						<input type="text" name="company" value="<?php echo $ClientInfo['hosting_client_company'];?>" class="form-control disabled"  required readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['address'];?></label>
						<input type="text" name="address" value="<?php echo $ClientInfo['hosting_client_address'];?>" class="form-control disabled"  required readonly>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<label class="form-label required"><?php echo $text['xml_code'];?></label>
						<textarea name="csr" style="height: 250px" placeholder="<?php echo $text['xml_code_place'];?>" class="form-control" id="xml_code" required></textarea> 
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-5 px-10">
						<button name="submit" id="convet" class="btn btn-sm btn-primary"><?php echo $text['convert_xml_to_json'];?></button>
					</div>
				</div>
				<div class="col-md-12 mb-10" id="result"></div>
			</div>
	</div>
</div>
<script src="assets/js/jquery.js"></script>
<script>
$(document).ready(function(){
	$("#convet").click(function(){
	var code = $("#xml_code").val();
		$.post("function/XmltoJson.php", {code: code,submit: ""}, function(data){
			$('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo $text['convert_success'];?></div>');
			$("#result").html(data);
		});
	});
});
</script>