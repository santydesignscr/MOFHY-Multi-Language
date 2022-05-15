<?php
require_once __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'username' => $_POST['account_username'],
		'key' => strtolower($_POST['account_key']),
		'reason' => $_POST['reason']
	);
	$client1 = Client::create();
	$request1 = $client1->getUserDomains([
	'username' => $FormData['username'],
	]);
	$response1 = $request1->send();
	$Domains = $response1->getDomains();
	if(count($Domains)>0){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.count($Domains).' domains are not <b>removed!</b>
										</div>';
		header('location: ../settings.php?account_id='.$FormData['username']);
		exit;
	}
	else{
		$client = Client::create();
		$request = $client->suspend([
		'username' => $FormData['key'],
		'reason' => $FormData['reason'],
		]);
		$response = $request->send();
		$Data = $response->getData();
		$Result = array(
			'status' => $Data['result']['status'],
			'message' => $Data['result']['statusmsg']
		);
		if($Result['status']==0 && !is_array($Result['message'])){
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.$Result['message'].'
										</div>';
			header('location: ../viewaccount.php?account_id='.$FormData['username']);
			exit;
		} elseif($Result['status']==1 && is_array($Result['message'])){
			$sql = mysqli_query($connect,"UPDATE `hosting_account` SET `account_status`='4' WHERE `account_username`='".$FormData['username']."'");
			if($sql){
					$_SESSION['message'] = '<div class="alert alert-success" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Account deactivated <b>successfully!</b>
											</div>';
					header('location: ../viewaccount.php?account_id='.$FormData['username']);
					exit;
				}
				else{
					$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Something went'."'".'s <b>wrong!</b>
											</div>';
					header('location: ../settings.php?account_id='.$FormData['username']);
					exit;
				}
		} elseif($Result['status']==0 && $Result['message']==0){
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
			header('location: ../settings.php?account_id='.$FormData['username']);
			exit;
		}
	}
}
else{
	header('location: ../');
}
?>