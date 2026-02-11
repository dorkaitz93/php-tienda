<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Produktua Ezabatu Berretsi</title>
</head>
<body>
    <h1>Produktuen Administrazio Gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Produktua Ezabatu</p>
    
    <h2>Ziur zaude Produktu Hau Ezabatu Nahi Duzula?</h2>

    <?php if ($produktua): ?>
    <table border="1">
        <tbody>
            <tr>
                <th>Izena</th>
                <td><?php echo htmlspecialchars($izena ?? ''); ?></td>
            </tr>
            <tr>
                <th>Deskribapena</th>
                <td><?php echo htmlspecialchars($produktua->getDeskribapena() ?? ''); ?></td>
            </tr>
            <tr>
                <th>Prezioa</th>
                <td><?php echo htmlspecialchars((string)$produktua->getPrezioa()); ?> €</td>
            </tr>
            <tr>
                <th>Nobedadea</th>
                <td><?php echo ($produktua->getNobedadea() == 1) ? 'Bai' : 'Ez'; ?></td>
            </tr>
            <tr>
                <th>Eskaintza</th>
                <td><?php echo htmlspecialchars((string)$produktua->getEskaintza()); ?>%</td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
        <p style="color: red;">Errorea: Ezin izan dira produktuaren datuak kargatu.</p>
    <?php endif; ?>

    <?php if (!empty($mezua)): ?>
        <p><?php echo htmlspecialchars($mezua); ?></p>
    <?php endif; ?>

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