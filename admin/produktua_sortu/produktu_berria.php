<?php 
require_once('../../klaseak/com/leartik/daw24doca/produktuak/kategoria.php');
require_once('../../klaseak/com/leartik/daw24doca/produktuak/kategoria_db.php');
use com\leartik\daw24doca\produktuak\KategoriaDB;
?>
<!DOCTYPE html>
<html lang="eu">
    <head>
        <meta charset="utf-8">
        <title>Produktu Berria</title>
    </head>
    <body>
        <h1>Produktuen administrazio gunea</h1>
        <p><a href="..">Hasiera</a> &gt; Produktu Berria</p>
        
        <?php if ($mezua): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mezua); ?></p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <p>
                <label for="izena">Izena</label><br>
                <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo htmlspecialchars($izena); ?>">
            </p>
            <p>
                <label for="deskribapena">Deskribapena</label><br>
                <textarea id="deskribapena" name="deskribapena" cols="50" rows="5"><?php echo htmlspecialchars($deskribapena); ?></textarea>
            </p>
            <p>
                <label for="prezioa">Prezioa (€)</label><br>
                <input type="text" id="prezioa" name="prezioa" value="<?php echo htmlspecialchars((string)$prezioa); ?>">
            </p>
            
            <p>
                <label for="nobedadea">Nobedadea</label>
                <input type="checkbox" id="nobedadea" name="nobedadea" value="1" <?php echo ($nobedadea == 1) ? 'checked' : ''; ?>>
            </p>
            
            <p>
                <label for="eskaintza">Eskaintza (%)</label><br>
                <input type="text" id="eskaintza" name="eskaintza" value="<?php echo htmlspecialchars((string)$eskaintza); ?>">
            </p>
            
            <p>
                <label for="kategoria">Kategoria</label><br>
                <select id="kategoria" name="kategoria">
                    <option value="0">Aukeratu Kategoria bat</option>
                    <?php
                    $kategoriak = KategoriaDB::selectKategoriak();
                    foreach ($kategoriak as $kat) {
                        $id_kat = $kat->getId(); 
                        $izena_kat = $kat->getIzena(); 
                        $selected = ($id_kat == $kategoria_aukera) ? ' selected' : ''; 
                        echo "<option value=\"" . htmlspecialchars((string)$id_kat) . "\"$selected>" . htmlspecialchars($izena_kat) . "</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <input type="submit" value="Gorde" name="gorde">
                <a href="..">Utzi</a>
            </p>
        </form>
    </body>
</html>