<?php
require_once('../../klaseak/com/leartik/daw24doca/produktuak/eskaria_db.php');
require_once('../../klaseak/com/leartik/daw24doca/produktuak/eskaria.php');
require_once('../../klaseak/com/leartik/daw24doca/produktuak/bezeroa.php');

use com\leartik\daw24doca\produktuak\EskariaDB;

$id = $_REQUEST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    include('eskaria_id_baliogabea.php');
    exit();
}

$id = (int)$id;
$eskaria = EskariaDB::selectEskaria($id);

if (!$eskaria) {
    include('eskaria_id_baliogabea.php');
    exit();
}

if (isset($_POST['aldatu'])) {
    $egoera_berria = $_POST['egoera'] ?? '';
    
    try {
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE eskariak SET egoera = :egoera WHERE id = :id";
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':egoera', $egoera_berria);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        include('eskaria_aldatu_da.php');
    } catch (Exception $e) {
        include('eskaria_ez_da_aldatu.php');
    }
} else {
    include('eskaria_aldatu.php');
}
?>