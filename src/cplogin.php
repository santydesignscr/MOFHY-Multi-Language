<?php
require __DIR__.'/includes/lang.php';
if(isset($_GET['account_id'])){
	$PageInfo = ['title'=>'Login to Control Panel','rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/CookieHandler.php';
	require_once __DIR__.'/handler/ValidationHandler.php';
	require_once __DIR__.'/handler/HostingHandler.php';
require_once __DIR__.'/handler/VisitHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_username`='".$_GET['account_id']."' AND `account_for`='".$ClientInfo['hosting_client_key']."'");
	if(mysqli_num_rows($sql)>0){
		include __DIR__.'/template/cPLogin.php';
	}
	else{
		include __DIR__.'/template/503.php';
	}
	require_once __DIR__.'/includes/Footer.php';
}
else{
	$PageInfo = ['title'=>'Unathorized Access'];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/includes/CookieHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	include __DIR__.'/template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>