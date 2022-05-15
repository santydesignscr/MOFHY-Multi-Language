<?php
require __DIR__.'/../modules/xmltojson/xml2json.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'code' => trim($_POST['code']),
	);
	$xmlNode = simplexml_load_string($FormData['code']);
	if(!$xmlNode){
		echo '<hr><label>Json code:</label><pre><textarea class="form-control disabled mb-5" style="height:250px;cursor:context-menu;" readonly>Invalid XML Code</textarea></pre>';
	}
	else{
		$arrayData = xmlToArray($xmlNode);
	 	$code = json_encode($arrayData);
		echo '<hr><label>Json code:</label><pre><textarea class="form-control disabled mb-5" style="height:250px;cursor:context-menu;" readonly>'.$code.'</textarea></pre>';
	}
}
else{
	header('location: ../');
}
?>