<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'username' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'),0,8),
		'password' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'),0,16),
		'domain' => strtolower($_POST['domain']),
		'email' => $ClientInfo['hosting_client_email'],
		'plan' => $_POST['package']
	);
	if(empty($FormData['domain'])){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Domain cannot be <b>empty!</b>
									</div>';
		header('location: ../newaccount.php');
	}
	else{
		$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_for`='".$ClientInfo['hosting_client_key']."' AND `account_status`='1'");
		if(mysqli_num_rows($sql)<3){
			$client = Client::create();
			$request = $client->createAccount([
			'username' => $FormData['username'],
			'password' => $FormData['password'],
			'domain' => $FormData['domain'],
			'email' => $FormData['email'],
			'plan' => $FormData['plan']
			]);
			$response = $request->send();
			$Data = $response->getData();
			$Result = array(
				'username' => $Data['result']['options']['vpusername'],
				'message' => $Data['result']['statusmsg'],
				'status' => $Data['result']['status'],
				'domain' => str_replace('cpanel', strtolower($FormData['username']), API_CPANEL_URL),
				'date' => date('d-m-Y')
			);
			if($Result['status']==0 && strlen($Result['message'])>1){
				$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.$Result['message'].'
										</div>';
				header('location: ../newaccount.php');
				exit;
			}
			elseif($Result['status']==1 && strlen($Result['message'])>1){
				$sql = mysqli_query($connect,"INSERT INTO `hosting_account`(`account_username`, `account_password`, `account_key`, `account_domain`, `account_status`, `account_date`, `account_for`) VALUES ('".$Result['username']."','".$FormData['password']."','".$FormData['username']."','".$Result['domain']."','3','".$Result['date']."','".$ClientInfo['hosting_client_key']."')");
				if($sql){
					$_SESSION['message'] = '<div class="alert alert-success" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Account created <b>successfully!</b>
											</div>';
					header('location: ../myaccounts.php');
					exit;
				}
				else{
					$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Something went'."'".'s <b>wrong!</b>
											</div>';
					header('location: ../newaccount.php');
					exit;
				}
			}
			elseif($Result['status']==0 && $Result['message']==0){
				$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
				header('location: ../myaccounts.php');
				exit;
			}
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Free account limit <b>reached!</b>
									</div>';
			header('location: ../myaccounts.php');
		}
	}
}
else{
	header('location: ../');
}
?>