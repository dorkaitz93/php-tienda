<?php
require_once('../../klaseak/com/leartik/daw24doca/produktuak/eskaria_db.php');
require_once('../../klaseak/com/leartik/daw24doca/produktuak/eskaria.php');
require_once('../../klaseak/com/leartik/daw24doca/produktuak/bezeroa.php');

use com\leartik\daw24doca\produktuak\EskariaDB;

$id = $_REQUEST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    include('../eskaria_aldatu/eskaria_id_baliogabea.php'); 
    exit();
}

$id = (int)$id;

if (isset($_POST['ezabatu'])) {
    if (EskariaDB::deleteEskaria($id)) {
        include('eskaria_ezabatu_da.php');
    } else {
        include('eskaria_ez_da_ezabatu.php');
    }
} else {
    $eskaria = EskariaDB::selectEskaria($id); 

    if (!$eskaria) {
        include('../eskaria_aldatu/eskaria_id_baliogabea.php');
        exit();
    }

    include('eskaria_ezabatu.php');
}
?>