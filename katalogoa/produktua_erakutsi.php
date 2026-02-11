<p><a href="index.php">Katalogoera itzuli</a></p> 
<h2>Produktua:</h2>
<div>
    <img src="../img/<?php echo htmlspecialchars((string)$produktuak->getId()); ?>.png" alt="Produktu irudia" style="width:200px;">
    <h2><?php echo htmlspecialchars($produktuak->getIzena()); ?></h2>
    <p><strong>Prezioa:</strong> <?php echo htmlspecialchars((string)$produktuak->getPrezioa()); ?>€</p>
    <p><strong>Deskribapena:</strong> <?php echo htmlspecialchars($produktuak->getDeskribapena()); ?></p>

    <hr>
    <form action="../saskia/index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$produktuak->getId()); ?>">
        <label for="kopurua">Kantitatea:</label>
        <input type="number" id="kopurua" name="kopurua" value="1" min="1" style="width: 50px;">
        <br><br>
        <button type="submit" name="gehitu" style="background-color: green; color: white; padding: 10px; cursor: pointer;">
            Saskira gehitu
        </button>
    </form>
</div>