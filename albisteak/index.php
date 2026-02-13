<?php
// APIaren URLa definitu (ziurtatu bide hau zuzena dela zure XAMPPn)
$url = "http://localhost/zerbitzari-06-03/httpcrud/index.php";

// APIari deia egin eta erantzuna jaso (JSON formatuan)
$erantzuna = file_get_contents($url);

// JSONa PHPko array bihurtu
$albisteak = json_decode($erantzuna, true);

// Bista kargatu
include('albisteak_erakutsi.php');
?>