<?php
require __DIR__.'/Connect.php';
if(isset($_GET['client_id'])){
	$sql = mysqli_query($connect,"UPDATE `hosting_clients`SET `hosting_client_status`=1 WHERE `hosting_client_key`='".$_GET['client_id']."'");
	if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Client activated <b>successfully!</b>
									</div>';
			header('location: ../viewclient.php?client_id='.$_GET['client_id']);
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../viewclient.php?client_id='.$_GET['client_id']);
		}
	}
else{
	header('location: ../login.php');
}
?>