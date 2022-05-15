<?php 
require __DIR__.'/../modules/UserInfo/UserInfo.php';
if(isset($_COOKIE['VISIT001'])){
	$sql = mysqli_query($connect,"INSERT INTO `hosting_visits`(`visit_device`, `visit_ip`, `visit_type`, `visit_time`) VALUES ('".UserInfo::get_device()."','".UserInfo::get_ip()."','0','".time()."')");
}
else{
	$sql = mysqli_query($connect,"INSERT INTO `hosting_visits`(`visit_device`, `visit_ip`, `visit_type`, `visit_time`) VALUES ('".UserInfo::get_device()."','".UserInfo::get_ip()."','1','".time()."')");
	setcookie("VISIT001", time(), time()+30*86400, "/");
}
?>