<?php 
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: /Erronka01/admin/index.php');
    exit();
}
require('../../klaseak/com/leartik/daw24doca/produktuak/mezua.php');
require('../../klaseak/com/leartik/daw24doca/produktuak/mezua_db.php');

use com\leartik\daw24doca\produktuak\Mezua;
use com\leartik\daw24doca\produktuak\MezuakDB;

$mezua = "";
$id = 0; 
$izena = "";
$email = ""; 
$mezuaTextua = "";
$erantzunda = 0;

if(isset($_POST['gorde'])){
    $id = $_POST['id'] ?? null;
    $izena = $_POST['izena'] ?? '';
    $email = $_POST['email'] ?? '';
    $mezuaTextua = $_POST['mezua'] ?? '';
    $erantzunda = isset($_POST['erantzunda']) ? 1 : 0;

    if(is_numeric($id) && (int)$id > 0 && strlen(trim($izena)) > 0 && strlen(trim($email)) > 0 && strlen(trim($mezuaTextua)) > 0){
        $mezuak = new Mezua();
        $mezuak->setId((int)$id);
        $mezuak->setIzena($izena);
        $mezuak->setEmail($email);
        $mezuak->setMezua($mezuaTextua);
        $mezuak->setErantzunda($erantzunda);
        
        if(MezuakDB::aldatuMezua($mezuak) > 0){
            include('mezua_aldatu_da.php');
            exit(); 
        }else{
            include('mezua_ez_da_aldatu.php');
            exit();
        }
    }else{
        $id = (int)$id;
        $mezua = "Eremu guztiak bete behar dira";
        include('mezua_aldatu.php');
        exit();
    }
}else{
    $id_get = $_GET['id'] ?? null;
    if($id_get && is_numeric($id_get) && (int)$id_get > 0){
        $mezuak = MezuakDB::selectMezua((int)$id_get);
        if ($mezuak) { 
            $id = $mezuak->getId(); 
            $izena = $mezuak->getIzena();
            $email = $mezuak->getEmail();
            $mezuaTextua = $mezuak->getMezua();
            $erantzunda = $mezuak->getErantzunda(); 
            include('mezua_aldatu.php');
            exit(); 
        } else {
            include('mezua_id_baliogabea.php');
            exit();
        }
    }else{
        include('mezua_id_baliogabea.php');
        exit();
    }
}
?>