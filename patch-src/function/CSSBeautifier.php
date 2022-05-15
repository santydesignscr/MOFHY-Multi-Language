<?php
if(isset($_POST['submit'])){
	$FormData = array(
		'css' => trim($_POST['css']),
	);
	if(!empty($FormData['css'])){
		$css = str_replace(';}',";\n\t}",$FormData['css']);
		$css = str_replace("\t}","}",$css);
		$css = str_replace(':',": ",$css);
		$css = str_replace(',',", ",$css);
		$css = str_replace(';',"; ",$css);
		$css = str_replace('(',"( ",$css);
		$css = str_replace('{',"{\n\t",$css);
		$css = str_replace('}',"}\n",$css);
		$css = trim($css);
		echo '<hr><label>Beautified CSS:</label><pre><textarea class="form-control disabled mb-5" style="cursor: context-menu;height:250px" readonly>'.$css.'</textarea></pre>';
	}
	else{
		echo '<hr><label>Beautified CSS:</label><pre><textarea class="form-control disabled mb-5" style="cursor: context-menu;height:250px" readonly>Code cannot be empty!</textarea></pre>';
	}
}
else{
	header('location: ../');
}
?>