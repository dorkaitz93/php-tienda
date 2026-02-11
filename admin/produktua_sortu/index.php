<?php 
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}
require('../../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');

use com\leartik\daw24doca\produktuak\Produktua;
use com\leartik\daw24doca\produktuak\ProduktuaDB;

$mezua = "";
$izena = "";
$deskribapena = "";
$prezioa = "";
$nobedadea = 0;
$eskaintza = "";
$kategoria_aukera = "";

if(isset($_POST['gorde'])){
    $izena = $_POST['izena'] ?? '';
    $deskribapena = $_POST['deskribapena'] ?? '';
    $prezioa = $_POST['prezioa'] ?? '';
    $nobedadea = isset($_POST['nobedadea']) ? 1 : 0; 
    $eskaintza = $_POST['eskaintza'] ?? '';
    $kategoria = $_POST['kategoria'] ?? 0;
    
    $kategoria_aukera = $kategoria;

    if(strlen(trim($izena)) > 0 && strlen(trim($deskribapena)) > 0 && is_numeric($prezioa) && $prezioa > 0 && is_numeric($eskaintza) && (int)$kategoria > 0) {
        
        $produktua = new Produktua();
        $produktua->setIzena($izena);
        $produktua->setDeskribapena($deskribapena);
        $produktua->setPrezioa((float)$prezioa);
        $produktua->setNobedadea((int)$nobedadea);
        $produktua->setEskaintza((int)$eskaintza);
        $produktua->setKategoriaId((int)$kategoria);

        if(ProduktuaDB::insertProduktua($produktua) > 0){
            include('produktua_gorde_da.php');
            exit();
        }else{
            include('produktua_ez_da_gorde.php');
            exit();
        }
    }else{
        $mezua = "Eremu guztiak bete behar dira eta balioak zuzenak izan behar dira";
        include('produktu_berria.php');
        exit();
    }
}else{
    include('produktu_berria.php');
}
?>