<?php
    $lang = "en";
    $allowedlangs = array(
        "es",
        "en",
        "fr",
        "ch",
	"tr"
    );
    if (!empty($_GET["lang"])) {
        $rlang = $_GET["lang"];
    } else if (!empty($_COOKIE["lang"])) {
        $rlang = $_COOKIE["lang"];
    }
    if (isset($rlang) && !empty($rlang) && in_array($rlang, $allowedlangs)) {
        $lang = $rlang;
        setcookie("lang", $lang,time()+31536000);
    }
    $langmaps = array(
        "en" => "langs/en.json",
        "es" => "langs/es.json",
        "fr" => "langs/fr.json",
        "ch" => "langs/ch.json",
	    "tr" => "langs/tr.json"
    );
    $text = json_decode(file_get_contents($langmaps[$lang]), true);
?>