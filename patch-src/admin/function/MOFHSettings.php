<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'url' => $_POST['url'],
    'ip' => $_POST['ip'],
    'ns1' => $_POST['ns1'],
    'ns2' => $_POST['ns2'],
    'pkg' => $_POST['pkg'],
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_account_api` SET `api_username`='".$FormData['username']."',`api_password`='".$FormData['password']."',`api_cpanel_url`='".$FormData['url']."',`api_server_ip`='".$FormData['ip']."',`api_ns_1`='".$FormData['ns1']."',`api_ns_2`='".$FormData['ns2']."',`api_package`='".$FormData['pkg']."' WHERE `api_key`='MOFHAPI'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  MOFH API updated <b>successfully!</b>
									</div>';
		header('location: ../apisettings.php');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../apisettings.php');
	}
}
else{
	header('location: ../');
}
?>