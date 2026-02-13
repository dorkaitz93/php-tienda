<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Saskia</title>
    <link rel="stylesheet" href="../css/style.css">
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
                <h1>Saskiaren Kudeaketa</h1>
                <p><a href="../hasiera/">Hasiera</a> &gt; Saskia</p>
                
                <div id="komentarioa">
                    <h2>Zure Saskia</h2>
                    <hr>

                    <?php if (isset($_SESSION['mezua'])): ?>
                        <div style="background-color: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px; font-weight: bold; text-align: center;">
                            <?php 
                                echo htmlspecialchars($_SESSION['mezua']); 
                                unset($_SESSION['mezua']); 
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if (count($saskia->getDetaileak()) > 0) { ?>
                        <table cellspacing="5" cellpadding="5" border="1" style="width: 100%; border-collapse: collapse;">
                            <tr style="background-color: #f2f2f2;">
                                <td><strong>Produktua</strong></td>
                                <td><strong>Prezioa</strong></td>
                                <td><strong>Kopurua</strong></td>
                                <td><strong>Guztira</strong></td>
                                <td><strong>Ekintzak</strong></td>
                            </tr>
                            
                            <?php foreach ($saskia->getDetaileak() as $detailea) { ?>
                                <tr valign="middle">
                                    <td><?php echo htmlspecialchars($detailea->getArtikulua()->getIzena()); ?></td>
                                    <td><?php echo htmlspecialchars((string)$detailea->getArtikulua()->getPrezioa()); ?> &euro;</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 5px;">
                                            <?php echo htmlspecialchars((string)$detailea->getKopurua()); ?>
                                            <form action="index.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                                <button type="submit" name="gehitubat" style="background-color: green; color: white; border: none; padding: 5px 10px; cursor: pointer;">+</button>
                                            </form>
                                            <form action="index.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                                <button type="submit" name="kendubat" style="background-color: green; color: white; border: none; padding: 5px 10px; cursor: pointer;">-</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($detailea->getGuztira(), 2); ?> &euro;</td>
                                    <td>
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                            <button type="submit" name="ezabatu" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">X</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            
                            <tr style="background-color: #f9f9f9;">
                                <td colspan="3" align="right"><strong>GUZTIRA:</strong></td>
                                <td><strong><?php echo number_format($saskia->getSaskiaGuztira(), 2); ?> &euro;</strong></td>
                                <td>
                                    <form action="index.php" method="post">
                                        <button type="submit" name="ezabatudena" style="background-color: #333; color: white; border: none; padding: 10px; cursor: pointer;">Hustu</button>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <br>
                        <form action="../eskaria/index.php" method="post" style="text-align: right;">
                            <button type="submit" name="eskaria" style="background-color: #28a745; color: white; padding: 15px 30px; font-size: 18px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                                ESKARIA EGIN
                            </button>
                        </form>

                    <?php } else { ?>
                        <div style="padding: 20px; text-align: center; border: 1px dashed #ccc;">
                            <p>Saskia hutsik dago.</p>
                            <a href="../katalogoa/" style="color: green; font-weight: bold;">Itzuli katalogora produktuak gehitzeko.</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
                <div class="section1-textua">
                    <h2>Animali batek betirako</h2>
                    <h2>Maitatuko zaitu</h2>
                    <p>Zure aukera da berari onena ematea.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 DoggyShop.inc</p>
    </footer>
</body>
</html>