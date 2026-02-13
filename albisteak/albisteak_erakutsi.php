<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>DoggyShop - Albisteak</title>
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
                <li><a href="../albisteak/">Albisteak</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="row">
            <div class="eskerra">
                <img src="../img/katua nobedadeak.png" class="katua" alt="Katua">
            </div>

            <div class="erdia">
                <h1>Azken Albisteak</h1>
                <hr>

                <?php if ($albisteak && count($albisteak) > 0): ?>
                    <?php foreach ($albisteak as $albistea): ?>
                        <div class="albiste-kaxa" style="border-bottom: 1px solid #ccc; padding: 15px 0;">
                            <h2><?php echo htmlspecialchars($albistea['izenburua']); ?></h2>
                            <p><em>Data: <?php echo htmlspecialchars($albistea['laburpena']); ?></em></p>
                            <p><?php echo htmlspecialchars($albistea['xehetasunak']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Ez dago albisterik une honetan.</p>
                <?php endif; ?>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
            </div>
        </div>
    </main>

    <footer><p>&copy; 2026 DoggyShop.inc</p></footer>
</body>
</html>