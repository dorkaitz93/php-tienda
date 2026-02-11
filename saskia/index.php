<?php
require('../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/detailea.php');
require('../klaseak/com/leartik/daw24doca/produktuak/saskia.php');

session_start();

use com\leartik\daw24doca\produktuak\ProduktuaDB;
use com\leartik\daw24doca\produktuak\Detailea;
use com\leartik\daw24doca\produktuak\Saskia;

if (!isset($_SESSION['saskia'])) {
    $_SESSION['saskia'] = new Saskia();
}
$saskia = $_SESSION['saskia'];

// Produktua gehitu (Katalogoetik datorrena)
if (isset($_POST['gehitu']) && is_numeric($_POST['id'])) {
    $id = (int)$_POST['id'];
    $kopurua = isset($_POST['kopurua']) && is_numeric($_POST['kopurua']) ? (int)$_POST['kopurua'] : 1;
    
    $aurkitua = false;
    foreach ($saskia->getDetaileak() as $detailea) {
        if ($detailea->getArtikulua()->getId() == $id) {
            $detailea->setKopurua($detailea->getKopurua() + $kopurua);
            $aurkitua = true;
            break;
        }
    }

    if (!$aurkitua) {
        $produktua = ProduktuaDB::selectProduktua($id);
        if ($produktua) {
            $detailea = new Detailea();
            $detailea->setArtikulua($produktua);
            $detailea->setKopurua($kopurua);
            $saskia->detaileaGehitu($detailea);
        }
    }
}

// Unitatea gehitu (+)
if(isset($_POST['gehitubat']) && is_numeric($_POST['id'])){
    $saskia->unitateaGehitu((int)$_POST['id']);
}

// Unitatea kendu (-)
if(isset($_POST['kendubat']) && is_numeric($_POST['id'])){
    $saskia->unitateaKendu((int)$_POST['id']);
}

// Saskia hustu
if(isset($_POST['ezabatudena'])){
    $saskia = new Saskia();
}

// Lerroa ezabatu (X)
if (isset($_POST['ezabatu']) && is_numeric($_POST['id'])) {
    $saskia->detaileaEzabatu((int)$_POST['id']);
}

$_SESSION['saskia'] = $saskia;
include('saskia_erakutsi.php');
?>