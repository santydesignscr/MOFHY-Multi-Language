<?php
include __DIR__.'/../includes/Connect.php';
if(isset($_POST['comments'])){
	if(substr($_POST['status'],0,3) == 'sql'){
		include __DIR__.'/SQLHost.php';
		include __DIR__.'/Activated.php';
	}
	elseif($_POST['status'] == 'SUSPENDED'){
		if($_POST['comments'] == 'AUTO_IDLE'){
			include __DIR__.'/Suspended.php';
		}
		else{
			include __DIR__.'/Deactivated.php';
		}
	}
	elseif($_POST['status'] == 'REACTIVATE'){
		include __DIR__.'/Reactivated.php';
	}
	elseif($_POST['status'] == "DELETE"){
		include __DIR__.'/Deleted.php';
	}
	file_put_contents("data.json","\n".json_encode($_POST), FILE_APPEND);
}