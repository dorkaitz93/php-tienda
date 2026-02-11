<?php 
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria.php'); 
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\Kategoria;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$mezua = "";
$id_ezabatu = 0;

if (isset($_POST['ezabatu'])) {
    $id_ezabatu = $_POST['id'] ?? null;
    
    if ($id_ezabatu && is_numeric($id_ezabatu) && (int)$id_ezabatu > 0) {
        $kategoria = new Kategoria();
        $kategoria->setId((int)$id_ezabatu);
        
        $emaitza = KategoriaDB::ezabatuKategoria($kategoria);
        
        if ($emaitza > 0) {
            include('kategoria_ezabatu_da.php');
            exit();
        } else {
            include('kategoria_ez_da_ezabatu.php');
            exit();
        }
    } else {
        include('kategoria_id_baliogabea.php');
        exit();
    }
} 
elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_ezabatu = (int)$_GET['id'];
    $kategoria_obj = KategoriaDB::selectKategoria($id_ezabatu);
    
    if ($kategoria_obj) {
        $izena = $kategoria_obj->getIzena();
        $id = $kategoria_obj->getId();
        include('kategoria_ezabatu.php');
        exit();
    } else {
        include('kategoria_id_baliogabea.php');
        exit();
    }
}
else {
    include('kategoria_id_baliogabea.php');
    exit();
}
?>