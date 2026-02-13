<?php
require('../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\ProduktuaDB;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$kategoriak = KategoriaDB::selectKategoriak() ?: [];
$productuIndibiduala = false; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (!is_numeric($id)) {
        header('Location: ../produktu_id_baliogabea.php');
        exit();
    }

    $produktuak = ProduktuaDB::selectProduktua((int)$id);
    
    if (!$produktuak) {
        header('Location: ../produktu_id_baliogabea.php');
        exit();
    }
    $productuIndibiduala = true;
} else {
    $nobedadeak = ProduktuaDB::selectNobedadea() ?: [];
    $eskaintzak = ProduktuaDB::selectEskaintza() ?: [];
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Hasiera</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div>
            <img id="Logo" src="../img/logoa-transparente.png" alt="Logoa">
        </div>
    </header>
    
    <div class="eskuma">
        <nav>
            <ul class="menua">
                <li><a href="../hasiera/">Hasiera</a></li>
                <li><a href="../katalogoa/">Katalogoa</a></li>
                <li><a href="../saskia/">Saskia</a></li>
                <li><a href="../mezua/">Kontaktua</a></li>
                <li><a href="../chatbot/">Chat-bota</a></li>
                <li><a href="../albisteak/">Albisteak</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="row">
            <div class="eskerra">
                <img src="../img/katua nobedadeak.png" class="katua" alt="Katua">
            </div>

            <div class="erdia">
                <?php if ($productuIndibiduala): ?>
                    <div class="detalle-producto">
                        <?php include('../katalogoa/produktua_erakutsi.php'); ?>
                    </div>
                <?php else: ?>
                    <h1 class="titulo-bienvenida">Ongi etorri!</h1>
                    <h2>DoggyShop animali domestikoen denda birtuala da.</h2>
                    <p>Ikusi gure <a href="../katalogoa/index.php">katalogoa</a></p>
                    
                    <section>
                        <h2>Nobedadeak</h2>
                        <div>
                            <?php 
                            $produktuak = $nobedadeak; 
                            if (!empty($produktuak)) {
                                include('../katalogoa/produktuak_erakutsi.php'); 
                            } else {
                                echo "<p>Oraingoz ez dago produktu berririk.</p>";
                            }
                            ?>
                        </div>
                    </section>

                    <section>
                        <h2>Eskaintzak</h2>
                        <div>
                            <?php 
                            $produktuak = $eskaintzak; 
                            if (!empty($produktuak)) {
                                include('../katalogoa/produktuak_erakutsi.php'); 
                            } else {
                                echo "<p>Oraingoz ez dago eskaintzarik.</p>";
                            }
                            ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
                <div class="section1-textua">
                    <h2>Animali batek betirako maitatuko zaitu</h2>
                    <p>Zure aukera da berari onena ematea.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 DoggyShop.inc</p>
    </footer>
</body>
</html>