<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Kontaktua</title>
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="api.js"></script>
</head>
<body>
    <header>
        <div>
            <img id="Logo" src="../img/logoa-transparente.png" alt="Logoa">
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
                <h1>Mezuak</h1>
                <p><a href="../hasiera/">Hasiera</a> &gt; Kontaktua</p>
                <h2>Mezu berria</h2>
                
                <div id="komentarioa">
                    <form>
                        <p>
                            <label for="izena">Izena:</label><br>
                            <input type="text" id="izena" name="izena" size="40" maxlength="50" required>
                        </p>
                        <p>
                            <label for="email">Emaila:</label><br>
                            <input type="email" id="email" name="email" size="40" maxlength="50" required>
                        </p>
                        <p>
                            <label for="mezua">Mezua:</label><br>
                            <textarea id="mezua" name="mezua" cols="40" rows="5" required></textarea>
                        </p>
                        <p>
                            <input type="button" id="bidali" value="Bidali" onClick="mezuaBidali()">
                            <input type="reset" id="utzi" value="Garbitu">
                        </p>
                    </form>
                </div>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
                <div class="section1-textua">
                    <h2>Animali batek betirako</h2>
                    <h2>Maitatuko zaitu</h2>
                    <p>Txakur batek ez du denbora edo baldintzarik ulertzen.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 DoggyShop.inc</p>
    </footer>
</body>
</html>