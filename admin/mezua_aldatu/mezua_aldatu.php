<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mezua Aldatu</title>
</head>
<body>
    <h1>Produktuen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Mezua Aldatu</p>
    <h2>Mezua Aldatu</h2>
    <?php if ($mezua): ?>
        <p style="color: red;"><?php echo htmlspecialchars($mezua); ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">
        <p>
            <label for="izena">Izena:</label><br>
            <input type="text" id="izena" name="izena" size="50" maxlength="50" value="<?php echo htmlspecialchars($izena); ?>">
        </p>
        <p>
            <label for="email">Emaila:</label><br>
            <input type="text" id="email" name="email" size="50" maxlength="50" value="<?php echo htmlspecialchars($email); ?>">
        </p>
        <p>
            <label for="mezua">Mezua:</label><br>
            <textarea id="mezua" name="mezua" cols="50" rows="5"><?php echo htmlspecialchars($mezuaTextua); ?></textarea>
        </p>
        <p>
            <label for="erantzunda">Erantzunda:</label>
            <input type="checkbox" name="erantzunda" value="1" <?php echo ($erantzunda == 1) ? 'checked' : ''; ?>>
        </p>
        <p>
            <input type="submit" value="Gorde" name="gorde">
            <a href="..">Utzi</a>
        </p>
    </form>
</body>
</html>