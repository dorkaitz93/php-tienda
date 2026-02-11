<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kategoria Ezabatu Berretsi</title>
</head>
<body>
    <h1>Produktuen Administrazio Gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Kategoria Ezabatu</p>
    <?php if ($mezua): ?>
        <p><?php echo htmlspecialchars($mezua); ?></p>
    <?php endif; ?>
    <table>
        <tbody>
            <tr>
                <th>Izena</th>
                <td><?php echo htmlspecialchars($izena ?? ''); ?></td>
            </tr>
            <tr>
                <th>Deskribapena</th>
                <td><?php echo htmlspecialchars($kategoria_obj->getDeskribapena()); ?></td>
            </tr>
        </tbody>
    </table>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id_ezabatu); ?>">
        <p>
            <input type="submit" name="ezabatu" value="Bai">
            <a href="..">
                <input type="button" value="Ez">
            </a>
        </p>
    </form>
</body>
</html>