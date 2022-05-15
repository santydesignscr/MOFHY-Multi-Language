<?php
$PageInfo = ['title'=>'Validate Account','rel'=>''];
require __DIR__.'/includes/lang.php';
require_once __DIR__.'/includes/Connect.php';
require_once __DIR__.'/handler/AreaHandler.php';
require_once __DIR__.'/includes/Header.php';
require_once __DIR__.'/handler/VisitHandler.php';
require_once __DIR__.'/handler/CookieHandler.php';
include __DIR__.'/template/Validate.php';
require_once __DIR__.'/includes/Footer.php';
?>