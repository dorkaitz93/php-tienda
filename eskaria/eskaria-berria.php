<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Eskaria Berria</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div>
            <img id="Logo" src="../img/logoa transparente.png" alt="Logoa">
        </div>
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
                <h1>Eskaria</h1>
                <p><a href="../index.php">Hasiera</a> &gt; Datuak bete</p>
                
                <div id="komentarioa">
                    <h2>Eskaria amaitzeko, bete zure datuak</h2>
                    <form action="index.php" method="post" style="max-width: 500px; display: flex; flex-direction: column; gap: 10px;">
                        <label>Izena:</label>
                        <input type="text" name="izena" required>

                        <label>Abizenak:</label>
                        <input type="text" name="abizenak" required>

                        <label>Helbidea:</label>
                        <input type="text" name="helbidea" required>

                        <label>Herria:</label>
                        <input type="text" name="herria" required>

                        <label>Posta Kodea:</label>
                        <input type="number" name="posta_kodea" required>

                        <label>Probintzia:</label>
                        <input type="text" name="probintzia" required>

                        <label>Emaila:</label>
                        <input type="email" name="email" required>

                        <button type="submit" name="eskaria_gorde" style="background-color: green; color: white; padding: 10px; margin-top: 20px; cursor: pointer;">
                            Eskaria Egin eta Ordaindu
                        </button>
                    </form>
                </div>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 DoggyShop.inc</p>
    </footer>
</body>
</html>