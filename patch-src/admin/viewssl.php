<?php
if(isset($_GET['ssl_id'])){
	$PageInfo = ['title'=>'View Ticket #'.$_GET['ssl_id'],'rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/handler/SSLHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_key`='".$_GET['ssl_id']."'");
	include __DIR__.'/template/ViewSSL.php';
	require_once __DIR__.'/includes/Footer.php';
}
else{
	$PageInfo = ['title'=>'Unathorized Access','rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	include __DIR__.'/../template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>