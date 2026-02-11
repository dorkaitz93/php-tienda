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
$id_ezabatu = 0;
$izena = "";
$produktua = null;

if (isset($_POST['ezabatu'])) {
    $id_ezabatu = $_POST['id'] ?? null;
    
    if ($id_ezabatu && is_numeric($id_ezabatu) && (int)$id_ezabatu > 0) {
        $produktua = new Produktua();
        $produktua->setId((int)$id_ezabatu);
        
        $emaitza = ProduktuaDB::ezabatuProduktua($produktua);
        
        if ($emaitza > 0) {
            include('produktua_ezabatu_da.php');
            exit();
        } else {
            include('produktua_ez_da_ezabatu.php');
            exit();
        }
    } else {
        include('produktua_id_baliogabea.php');
        exit();
    }
} 
elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_del_get = (int)$_GET['id'];
    $produktua = ProduktuaDB::selectProduktua($id_del_get); 
    
    if ($produktua) {
        $id_ezabatu = $produktua->getId(); 
        $izena = $produktua->getIzena(); 
        include('produktua_ezabatu.php');
        exit();
    } else {
        include('produktua_id_baliogabea.php');
        exit();
    }
}
else {
    include('produktua_id_baliogabea.php');
    exit();
}
?>