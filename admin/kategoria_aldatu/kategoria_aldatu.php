<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kategoria Aldatu</title>
    </head>
    <body>
        <h1>Produktuen administrazio gunea</h1>
        <p><a href="..">Hasiera</a> &gt; Kategoria Aldatu</p>
        
        <?php if ($mezua): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mezua); ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">
            <p>
                <label for="izena">Izena</label><br>
                <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo htmlspecialchars($izena); ?>">
            </p>
            <p>
                <label for="deskribapena">Deskribapena</label><br>
                <textarea id="deskribapena" name="deskribapena" cols="50" rows="5"><?php echo htmlspecialchars($deskribapena); ?></textarea>
            </p>
            <p>
                <input type="submit" value="Gorde" name="gorde">
                <a href="..">Utzi</a>
            </p>
        </form>
    </body>
</html>