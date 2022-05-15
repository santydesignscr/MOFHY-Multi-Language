<?php 
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require __DIR__.'/../handler/SSLHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
	'order_id' => $_POST['order_id'],
	'reason' => 'This was a test'
	);
	   $apiClient = new GoGetSSLApi();
	   $token = $apiClient->auth($SSLApi['api_username'],$SSLApi['api_password']);
	   $newOrder = $apiClient->cancelSSLOrder($FormData['order_id'],$FormData['reason']);
	if($newOrder['success'] == 1){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  SSL cancelled <b>successfully!</b>
										</div>';
			header('location: ../myssl.php');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something wemt'."'".' <b>wrong!</b>
										</div>';
			header('location: ../myssl.php');
	}
}
?>