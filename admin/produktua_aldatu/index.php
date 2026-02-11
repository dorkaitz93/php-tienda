<?php 
require('../../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria.php'); 
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\Produktua;
use com\leartik\daw24doca\produktuak\ProduktuaDB;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$mezua = "";
$id = 0; 
$izena = "";
$deskribapena = "";
$prezioa = "";
$nobedadea = 0;
$eskaintza = 0;
$kategoria_aukera = "";

if(isset($_POST['gorde'])){
    $id = $_POST['id'] ?? null;
    $izena = $_POST['izena'] ?? '';
    $deskribapena = $_POST['deskribapena'] ?? '';
    $prezioa = $_POST['prezioa'] ?? '';
    $nobedadea = isset($_POST['nobedadea']) ? 1 : 0;
    $eskaintza = $_POST['eskaintza'] ?? 0;
    $kategoria_id = $_POST['kategoria'] ?? null;

    $kategoria_aukera = $kategoria_id;

    if(is_numeric($id) && strlen(trim($izena)) > 0 && strlen(trim($deskribapena)) > 0 && is_numeric($prezioa) && $prezioa > 0 && is_numeric($eskaintza) && $kategoria_id > 0) {
        
        $produktua = new Produktua();
        $produktua->setId((int)$id);
        $produktua->setIzena($izena);
        $produktua->setDeskribapena($deskribapena);
        $produktua->setPrezioa($prezioa);
        $produktua->setNobedadea($nobedadea);
        $produktua->setEskaintza((int)$eskaintza);
        $produktua->setKategoriaId((int)$kategoria_id);

        if(ProduktuaDB::aldatuProduktua($produktua) > 0){
            include('produktua_gorde_da.php');
            exit(); 
        }else{
            include('produktua_ez_da_gorde.php');
            exit();
        }
    }else{
        $id = (int)$id;
        $mezua = "Eremu guztiak bete behar dira eta prezioak zenbakia izan behar du";
        include('produktua_aldatu.php');
        exit();
    }
}else{
    $id_get = $_GET['id'] ?? null;

    if ($id_get && is_numeric($id_get)) {
        $produktua = ProduktuaDB::selectProduktua((int)$id_get);
        
        if ($produktua) { 
            $id = $produktua->getId(); 
            $izena = $produktua->getIzena();
            $deskribapena = $produktua->getDeskribapena();
            $prezioa = $produktua->getPrezioa();
            $nobedadea = $produktua->getNobedadea();
            $eskaintza = $produktua->getEskaintza();
            $kategoria_aukera = $produktua->getKategoriaId(); 

            include('produktua_aldatu.php');
            exit(); 
        } else {
            include('produktua_id_baliogabea.php');
            exit();
        }
    } else {
        include('produktua_id_baliogabea.php');
        exit();
    }
}
?>