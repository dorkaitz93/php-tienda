<?php
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\Kategoria;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$izena = "";
$deskribapena = "";
$mezua = "";

if(isset($_POST['gorde'])){
    $izena = $_POST['izena'] ?? '';
    $deskribapena = $_POST['deskribapena'] ?? '';

    if(strlen(trim($izena)) > 0 && strlen(trim($deskribapena)) > 0){
        $kategoria = new Kategoria();
        $kategoria->setIzena($izena);
        $kategoria->setDeskribapena($deskribapena);

        if(KategoriaDB::insertKategoria($kategoria) > 0){
            include('kategoria_gorde_da.php');
            exit();
        }else{
            include('kategoria_ez_da_gorde.php');
            exit();
        }
    }else{
        $mezua = "Eremu guztiak bete behar dira";
        include('kategoria_berria.php');
        exit();
    }
}else{
    include('kategoria_berria.php');
}
?>