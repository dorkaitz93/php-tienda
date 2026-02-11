<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Chatbota</title>
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
            </ul>
        </nav>
    </div>

    <main>
        <div class="row">
            <div class="eskerra">
                <img src="../img/katua nobedadeak.png" class="katua" alt="Katua">
            </div>

            <div class="erdia">
                <h1>DoggyBot</h1>
                <div id="txataren-mezuak" style="border: 1px solid #ccc; height: 350px; overflow-y: scroll; padding: 15px; background: white; margin-bottom: 10px; border-radius: 8px; font-family: sans-serif;">
                    <p><strong>Bot:</strong> Kaixo! DoggyShop laguntzailea naiz. Nola lagundu zaitzaket gaur?</p>
                </div>

                <div style="display: flex; gap: 5px;">
                    <textarea id="erabiltzailearen-mezua" placeholder="Galdetu zerbait :)" style="width: 85%; height: 60px; padding: 8px; border-radius: 5px; border: 1px solid #bbb;"></textarea>
                    <input type="button" value="Bidali" onClick="mezuaBidali()" style="background-color: #28a745; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-weight: bold; flex-grow: 1;">
                </div>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
            </div>
        </div>
    </main>

    <script>
        function mezuaBidali() {
            let mezuaInput = document.getElementById('erabiltzailearen-mezua');
            let mezua = mezuaInput.value;
            if (mezua.trim() == "") return;

            let mezuakDiv = document.getElementById('txataren-mezuak');
            
            // Erabiltzailearen mezua gehitu
            mezuakDiv.innerHTML += "<p style='margin-bottom: 10px;'><strong>Zuk:</strong> " + mezua + "</p>";
            mezuaInput.value = '';
            
            // Scroll-a behera mugitu
            mezuakDiv.scrollTop = mezuakDiv.scrollHeight;

            // AJAX eskaria
            let httpRequest = new XMLHttpRequest();
            httpRequest.open("POST", "index.php", true);
            httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            httpRequest.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Bot-aren erantzuna gehitu
                    mezuakDiv.innerHTML += "<p style='color: #0056b3; margin-bottom: 10px;'><strong>Bot:</strong> " + this.responseText + "</p>";
                    // Scroll-a berriro behera mugitu
                    mezuakDiv.scrollTop = mezuakDiv.scrollHeight;
                }
            };
            
            // Datuak bidali
            httpRequest.send("erabiltzailearen_mezua=" + encodeURIComponent(mezua));
        }

        // Enter sakatzean mezua bidaltzeko aukera (erabiltzailearentzat erosoagoa)
        document.getElementById('erabiltzailearen-mezua').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                mezuaBidali();
            }
        });
    </script>

    <footer><p>&copy; 2026 DoggyShop.inc</p></footer>
</body>
</html>