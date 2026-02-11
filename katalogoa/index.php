<?php
require('../klaseak/com/leartik/daw24doca/produktuak/produktua.php');
require('../klaseak/com/leartik/daw24doca/produktuak/produktuak_db.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require('../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');

use com\leartik\daw24doca\produktuak\ProduktuaDB;
use com\leartik\daw24doca\produktuak\KategoriaDB;

$kategoriak = KategoriaDB::selectKategoriak() ?: [];
$productuIndibiduala = false;
$produktuak = [];

if (isset($_GET['id'])) {
    if (!is_numeric($_GET['id'])) {
        header('Location: ../produktu_id_baliogabea.php');
        exit();
    }
    $produktuak = ProduktuaDB::selectProduktua((int)$_GET['id']);
    if (!$produktuak) {
        header('Location: ../produktu_id_baliogabea.php');
        exit();
    }
    $productuIndibiduala = true;

} elseif (isset($_GET['kategoria_id']) && is_numeric($_GET['kategoria_id'])) {
    $produktuak = ProduktuaDB::selectProduktuaketaKategoria((int)$_GET['kategoria_id']) ?: [];

} else {
    $produktuak = ProduktuaDB::selectProduktuak() ?: [];
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Katalogoa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div><img id="Logo" src="../img/logoa-transparente.png" alt="Logoa"></div>
    </header>
    
    <div class="eskuma">
        <nav>
            <ul class="menua">
                <li><a href="../hasiera/">Hasiera</a></li>
                <li><a href="../katalogoa/">Katalogoa</a></li>
                <li><a href="../saskia/">Saskia</a></li>
                <li><a href="../mezua/">Kontaktua</a></li>
                <li><a href="../chatbot/">Chat-bota</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="row">
            <div class="eskerra">
                <h2>Kategoriak</h2>
                <ul>
                    <li><a href="../katalogoa/">Guztiak</a></li>
                    <?php foreach ($kategoriak as $kat): ?>
                        <li>
                            <a href="?kategoria_id=<?php echo $kat->getId(); ?>">
                                <?php echo htmlspecialchars($kat->getIzena()); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="erdia">
                <?php if ($productuIndibiduala): ?>
                    <?php include('produktua_erakutsi.php'); ?>
                <?php else: ?>
                    <h1><?php echo isset($_GET['kategoria_id']) ? 'Filtratutako Produktuak' : 'Katalogo Osoa'; ?></h1>
                    <div class="produktuen-zerrenda">
                        <?php 
                        if (!empty($produktuak)) {
                            include('produktuak_erakutsi.php'); 
                        } else {
                            echo "<p>Ez da produkturik aurkitu kategoria honetan.</p>";
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 DoggyShop.inc</p>
    </footer>
</body>
</html>