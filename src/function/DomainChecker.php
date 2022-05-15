<?php
require __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'domain' => strtolower($_POST['domain']),
	);
	$client = Client::create();
	$request = $client->getDomainUser(['domain' => $FormData['domain']]);
	$response = $request->send();
	$Data = $response->getData();
	if(!empty($Data)){
		if($Data[0] !== 'ACTIVE'){
			echo '<hr>
				<h5 class="mb-5">Domain status</h5><div>This domain is releated to our free hosting account ('.$Data[3].') and is inactive due to DNS problem. Changing DNS can take upto 72 hours to work correctly.</div>
				<h5 class="mb-5">Nameserver</h5>
				<ul>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns1.byet.org <i class="fa fa-2x text-danger">&times;</i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns2.byet.org <i class="fa fa-2x text-danger">&times;</i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns3.byet.org <i class="fa fa-2x text-danger">&times;</i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns4.byet.org <i class="fa fa-2x text-danger">&times;</i></li>
				</ul>
			</div>';
		}
		else{
			echo '<hr>
				<h5 class="mb-5">Domain status</h5><div>This domain is releated to our free hosting account ('.$Data[3].') and is active in dns. Changing DNS can take upto 72 hours to work correctly.</div>
				<h5 class="mb-5">Nameserver</h5>
				<ul>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns1.byet.org <i class="fa fa-check text-success"></i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns2.byet.org <i class="fa fa-check text-success"></i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns3.byet.org <i class="fa fa-check text-success"></i></li>
					<li class="d-flex mb-0 justify-content-between align-items-center">ns4.byet.org <i class="fa fa-check text-success"></i></li>
				</ul>
			</div>';
		}
	}
	else{
		echo '<hr><h5 class="mb-5">Domain status</h5><div>This domain is  not releated to our free hosting account.</div>';
	}
}
else{
	header('location: ../');
}
?>