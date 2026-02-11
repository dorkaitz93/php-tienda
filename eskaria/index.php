<?php
require('../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/saskia.php');
require('../klaseak/com/leartik/daw24doca/produktuak/detailea.php');
require('../klaseak/com/leartik/daw24doca/produktuak/bezeroa.php');
require('../klaseak/com/leartik/daw24doca/produktuak/eskaria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/eskaria_db.php');

session_start();

use com\leartik\daw24doca\produktuak\Saskia;
use com\leartik\daw24doca\produktuak\Bezeroa;
use com\leartik\daw24doca\produktuak\Eskaria;
use com\leartik\daw24doca\produktuak\EskariaDB;

if (!isset($_SESSION['saskia'])) {
    $_SESSION['saskia'] = new Saskia();
}
$saskia = $_SESSION['saskia'];

if (isset($_POST['gehitu_unitatea']) && is_numeric($_POST['id'])) {
    $saskia->unitateaGehitu((int)$_POST['id']);
}

if (isset($_POST['kendu_unitatea']) && is_numeric($_POST['id'])) {
    $saskia->unitateaKendu((int)$_POST['id']);
}

if (isset($_POST['kendu']) && is_numeric($_POST['id'])) {
    $saskia->detaileaEzabatu((int)$_POST['id']);
}

if (isset($_POST['eskaria_gorde'])) {
    $bezeroa = new Bezeroa();
    $bezeroa->setIzena(trim($_POST['izena'] ?? ''));
    $bezeroa->setAbizenak(trim($_POST['abizenak'] ?? ''));
    $bezeroa->setHelbidea(trim($_POST['helbidea'] ?? ''));
    $bezeroa->setHerria(trim($_POST['herria'] ?? ''));
    $bezeroa->setPostaKodea(trim($_POST['posta_kodea'] ?? ''));
    $bezeroa->setProbintzia(trim($_POST['probintzia'] ?? ''));
    $bezeroa->setEmaila(trim($_POST['email'] ?? ''));

    if (!empty($bezeroa->getIzena()) && !empty($bezeroa->getEmaila()) && count($saskia->getDetaileak()) > 0) {
        $eskaria = new Eskaria();
        $eskaria->setData(date("Y-m-d H:i:s")); 
        $eskaria->setBezeroa($bezeroa);
        $eskaria->setDetaileak($saskia->getDetaileak()); 

        $id_berria = EskariaDB::insertEskaria($eskaria);

        if ($id_berria > 0) {
            unset($_SESSION['saskia']);
            $_SESSION['mezua'] = "Eskerrik asko! Zure eskaera (#$id_berria) ondo jaso dugu.";
            header("Location: index.php");
            exit();
        }
    }
}

$_SESSION['saskia'] = $saskia;

if ((isset($_GET['akzioa']) && $_GET['akzioa'] == 'datuak_bete') || isset($_POST['eskaria'])) {
    include 'eskaria-berria.php';
} else {
    include '../saskia/saskia_erakutsi.php';
}
?>