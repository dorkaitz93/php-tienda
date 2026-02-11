<!DOCTYPE html>
<html lang="eu">
    <head>
        <meta charset="utf-8">
        <title>Administrazio Gunea</title>
    </head>
    <body>
        <h1>Produktuen Administrazio gunea</h1>
        
        <h3>Kategoriak</h3>
        <ul>
            <?php foreach($kategoriak as $kat): ?>
            <li>
                <?php echo htmlspecialchars($kat->getIzena()); ?>
                [<a href="kategoria_aldatu/?id=<?php echo $kat->getId(); ?>">Aldatu</a>]
                [<a href="kategoria_ezabatu/?id=<?php echo $kat->getId(); ?>">Ezabatu</a>]
            </li>
            <?php endforeach; ?>
        </ul>
        <form action="kategoria_sortu/index.php" method="post">
            <input type="submit" value="Kategoria Berria">
        </form>
        <hr>
        
        <h3>Produktuak</h3>
        <ul>
            <?php foreach($produktuak as $prod): ?>
            <li>
                <?php echo htmlspecialchars($prod->getIzena()); ?>
                [<a href="produktua_aldatu/?id=<?php echo $prod->getId(); ?>">Aldatu</a>]
                [<a href="produktua_ezabatu/?id=<?php echo $prod->getId(); ?>">Ezabatu</a>]
            </li>
            <?php endforeach; ?>
        </ul>
        <form action="produktua_sortu/" method="post">
            <input type="submit" value="Produktu Berria">
        </form>
        <hr>

        <h3>Mezuak</h3>
        <ul>
            <?php foreach($mezuak as $m): ?>
            <li>
                <strong><?php echo htmlspecialchars($m->getIzena()); ?>:</strong> 
                <?php echo htmlspecialchars($m->getMezua()); ?>
                [<a href="mezua_aldatu/index.php?id=<?php echo $m->getId(); ?>">Aldatu</a>]
                [<a href="mezua_ezabatu/index.php?id=<?php echo $m->getId(); ?>">Ezabatu</a>]
            </li>
            <?php endforeach; ?>
        </ul>
        <hr>

        <h3>Dendako Eskaerak</h3>
        <ul>
            <?php if (count($eskariak) > 0): ?>
                <?php foreach ($eskariak as $eskaria): ?>
                <li>
                    #<?php echo htmlspecialchars((string)$eskaria->getId()); ?> - 
                    <?php echo htmlspecialchars($eskaria->getData()); ?> - 
                    <?php 
                        $bezeroaObj = $eskaria->getBezeroa();
                        if ($bezeroaObj != null) {
                            echo htmlspecialchars($bezeroaObj->getIzena() . " " . $bezeroaObj->getAbizenak());
                        } else {
                            echo "Bezero daturik ez";
                        }
                    ?>
                    [<a href="eskaria_aldatu/?id=<?php echo $eskaria->getId(); ?>">Aldatu</a>]
                    [<a href="eskaria_ezabatu/?id=<?php echo $eskaria->getId(); ?>">Ezabatu</a>]
                </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Ez dago eskaerarik erregistratuta.</li>
            <?php endif; ?>
        </ul>
        <hr>
        
        <p><a href="irten.php">Sesiotik irten</a></p>
    </body>
</html>