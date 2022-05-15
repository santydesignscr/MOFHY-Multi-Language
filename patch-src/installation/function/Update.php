<?php
ob_start();
session_start();
include __DIR__."/../../modules/Database/Config.php";
$connect = mysqli_connect(
	$DataBase['hostname'],
	$DataBase['username'],
	$DataBase['password'],
	$DataBase['name']
);

if(!$connect){
	echo 'Connection not established'; 
}
include __DIR__."/Database.php";
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  DB Updated <b>successfully!</b>
									</div>';
			header('location: ../install.php?step=1');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../index.php');
		
	}
?>