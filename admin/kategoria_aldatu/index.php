<?php 
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria.php'); 
require('../../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\Kategoria;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$mezua = "";
$id = 0; 
$izena = "";
$deskribapena = "";

if(isset($_POST['gorde'])){
    $id = $_POST['id'] ?? null;
    $izena = $_POST['izena'] ?? '';
    $deskribapena = $_POST['deskribapena'] ?? '';

    if(!is_numeric($id)){
        include('kategoria_id_baliogabea.php');
        exit();
    }

    if(strlen(trim($izena)) > 0 && strlen(trim($deskribapena)) > 0){
        $kategoria = new Kategoria();
        $kategoria->setId((int)$id);
        $kategoria->setIzena($izena);
        $kategoria->setDeskribapena($deskribapena);

        if(KategoriaDB::aldatuKategoria($kategoria) > 0){
            include('kategoria_aldatu_da.php');
            exit(); 
        }else{
            include('kategoria_ez_da_aldatu.php');
            exit();
        }
    }else{
        $id = (int)$id;
        $mezua = "Eremu guztiak bete behar dira";
        include('kategoria_aldatu.php');
        exit();
    }
}else{
    $id = $_GET['id'] ?? null;
    if($id && is_numeric($id)){
        $kategoria = KategoriaDB::selectKategoria((int)$id);
        
        if ($kategoria) { 
            $id = $kategoria->getId(); 
            $izena = $kategoria->getIzena();
            $deskribapena = $kategoria->getDeskribapena();

            include('kategoria_aldatu.php');
            exit(); 
        } else {
            include('kategoria_id_baliogabea.php');
            exit();
        }
    }else{
        include('kategoria_id_baliogabea.php');
        exit();
    }
}
?>