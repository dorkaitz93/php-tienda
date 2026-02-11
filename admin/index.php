<?php 
require('../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/mezua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/mezua_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/bezeroa.php');
require('../klaseak/com/leartik/daw24doca/produktuak/eskaria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/eskaria_db.php');

use com\leartik\daw24doca\produktuak\KategoriaDB;
use com\leartik\daw24doca\produktuak\MezuakDB;
use com\leartik\daw24doca\produktuak\ProduktuaDB;
use com\leartik\daw24doca\produktuak\EskariaDB;

$admin = false;

if(isset($_POST['sartu'])){
    if(isset($_POST['erabiltzailea']) && $_POST['erabiltzailea'] == 'admin' && isset($_POST['pasahitza']) && $_POST['pasahitza'] == 'admin'){
        $admin = true;
        setcookie("erabiltzailea", "admin", time() + 86400, "/"); 
    }
} elseif(isset($_COOKIE['erabiltzailea']) && $_COOKIE['erabiltzailea'] == 'admin'){
    $admin = true;
}

if($admin == true){
    $kategoriak = KategoriaDB::selectKategoriak() ?: [];
    $produktuak = ProduktuaDB::selectProduktuak() ?: [];
    $mezuak = MezuakDB::selectMezuak() ?: [];
    $eskariak = EskariaDB::selectEskariak() ?: []; 
    
    include('produktuak_erakutsi.php');
} else {
    $mezua = isset($_POST['sartu']) ? "Datuak ez dira zuzenak" : "";
    include('login.php');
}
?>