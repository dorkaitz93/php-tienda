<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kategoria Berria</title>
    </head>
    <body>
        <h1>Produktuen administrazio gunea</h1>
        <p><a href="..">Hasiera</a> &gt; Kategoria Berria</p>
        
        <?php if ($mezua): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mezua); ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <p>
                <label for="izena">Izena</label><br>
                <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo htmlspecialchars($izena); ?>">
            </p>
            <p>
                <label for="deskribapena">Deskribapena</label><br>
                <textarea id="deskribapena" name="deskribapena" cols="50" rows="5" placeholder="Kategoriaren Deskribapena"><?php echo htmlspecialchars($deskribapena); ?></textarea>
            </p>
            <p>
                <input type="submit" value="Gorde" name="gorde">
                <a href="..">Utzi</a>
            </p>
        </form>
    </body>
</html>