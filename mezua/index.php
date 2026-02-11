<?php
require('../klaseak/com/leartik/daw24doca/produktuak/mezua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/mezua_db.php');

use com\leartik\daw24doca\produktuak\Mezua;
use com\leartik\daw24doca\produktuak\MezuakDB;

if (isset($_POST['izena']) && isset($_POST['email']) && isset($_POST['mezua'])) {
    
    $izena = trim($_POST['izena']);
    $email = trim($_POST['email']);
    $mezuaTextua = trim($_POST['mezua']);
    
    if ($izena !== "" && $email !== "" && $mezuaTextua !== "") {
        $sortzeData = date('Y-m-d H:i:s');

        $mezuaObj = new Mezua();
        $mezuaObj->setIzena($izena);
        $mezuaObj->setEmail($email);
        $mezuaObj->setMezua($mezuaTextua);
        $mezuaObj->setErantzunda(0);
        $mezuaObj->setSortzeData($sortzeData);

        if (MezuakDB::insertMezua($mezuaObj) > 0) {
            include('mezua_gorde_da.php');
        } else {
            include('mezua_ez_da_gorde.php');
        }
    } else {
        echo "Errorea: Eremu guztiak bete behar dira.";
    }
} else {
    include('mezua_berria.php');
}
?>