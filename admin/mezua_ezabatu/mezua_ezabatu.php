<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Mezua Ezabatu Berretsi</title>
</head>
<body>
    <h1>Produktuen Administrazio Gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Mezua Ezabatu</p>
    
    <p>Ziur zaude mezu hau ezabatu nahi duzula?</p>

    <table border="1">
        <tbody>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars((string)$id_ezabatu); ?></td>
            </tr>
            <tr>
                <th>Bidaltzailea</th>
                <td><?php echo htmlspecialchars($mezua_obj->getIzena()); ?></td>
            </tr>
            <tr>
                <th>Emaila</th>
                <td><?php echo htmlspecialchars($mezua_obj->getEmail()); ?></td>
            </tr>
            <tr>
                <th>Mezua</th>
                <td><?php echo htmlspecialchars($mezua_obj->getMezua()); ?></td>
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