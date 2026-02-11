<?php 
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24doca/produktuak/mezua.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/mezua_db.php');

use com\leartik\daw24doca\produktuak\Mezua;
use com\leartik\daw24doca\produktuak\MezuakDB;

$id_ezabatu = $_REQUEST['id'] ?? null;

if (!$id_ezabatu || !is_numeric($id_ezabatu)) {
    include('mezua_id_baliogabea.php');
    exit();
}

$id_ezabatu = (int)$id_ezabatu;

if (isset($_POST['ezabatu'])) {
    if (MezuakDB::ezabatuMezua($id_ezabatu)) {
        include('mezua_ezabatu_da.php');
        exit();
    } else {
        include('mezua_ez_da_ezabatu.php');
        exit();
    }
} else {
    $mezua_obj = MezuakDB::selectMezua($id_ezabatu);

    if (!$mezua_obj) {
        include('mezua_id_baliogabea.php');
        exit();
    }

    include('mezua_ezabatu.php');
}
?>