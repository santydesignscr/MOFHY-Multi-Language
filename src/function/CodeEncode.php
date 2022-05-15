<?php
if(isset($_POST['submit'])){
	$FormData = array(
		'code' => trim($_POST['code']),
	);
	if(!empty($FormData['code'])){
		$code = trim($FormData['code']);
		$code = base64_encode($code);
		$code = strrev($code);
		$code = gzcompress($code);
		$code = str_rot13($code);
		$code = base64_encode($code);
		echo '<hr><label>Encoded code:</label><pre><textarea class="form-control disabled mb-5" style="cursor: context-menu;height:250px" readonly><?php'."\neval(base64_decode(strrev(gzuncompress(str_rot13(base64_decode(".$code."))))));\n".'?></textarea></pre>';
	}
	else{
		echo '<hr><label>Encoded code:</label><pre><textarea class="form-control disabled mb-5" style="cursor: context-menu;height:250px" readonly>Code cannot be empty!</textarea></pre>';
	}
}
else{
	header('location: ../');
}
?>