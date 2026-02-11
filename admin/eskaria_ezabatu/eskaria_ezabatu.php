<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Eskaria Ezabatu</title>
</head>
<body>
    <h1>Produktuen Administrazio Gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Eskaria Ezabatu</p>
    
    <p>Ziur zaude eskaera hau ezabatu nahi duzula?</p>
    
    <table>
        <tbody>
            <tr>
                <th>Eskaria ID</th>
                <td><?php echo htmlspecialchars((string)$id); ?></td>
            </tr>
            <tr>
                <th>Data</th>
                <td><?php echo htmlspecialchars($eskaria->getData()); ?></td>
            </tr>
            <tr>
                <th>Bezeroa</th>
                <td>
                    <?php 
                        if ($eskaria->getBezeroa() != null) {
                            echo htmlspecialchars($eskaria->getBezeroa()->getIzena() . " " . $eskaria->getBezeroa()->getAbizenak()); 
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Egoera</th>
                <td><?php echo htmlspecialchars($eskaria->getEgoera()); ?></td>
            </tr>
        </tbody>
    </table>

    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">
        <p>
            <input type="submit" name="ezabatu" value="Bai">
            <a href="..">
                <input type="button" value="Ez">
            </a>
        </p>
    </form>
</body>
</html>