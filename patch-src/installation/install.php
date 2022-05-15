<?php
if(isset($_GET['step'])){
	if($_GET['step']==1){
		$PageInfo = ['title'=>'Sucess'];
	}
}
require_once __DIR__.'/includes/Header.php';
if(isset($_GET['step'])){
	if($_GET['step']==1){
		include __DIR__.'/template/Done.php';
	}
}
require_once __DIR__.'/includes/Footer.php';
if(isset($_GET['step'])){
	if($_GET['step']==1){
		rename(__DIR__.'/../installation', __DIR__.'/../reupdate');
	}
}
?>