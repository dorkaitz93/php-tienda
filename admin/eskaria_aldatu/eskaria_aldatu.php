<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Eskariaren Egoera Aldatu</title>
</head>
<body>
    <h1>Aldatu #<?php echo htmlspecialchars($eskaria->getId()); ?> eskaeraren egoera</h1>
    
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($eskaria->getId()); ?>">
        
        <p>Bezeroa: <strong><?php echo htmlspecialchars($eskaria->getBezeroa()->getIzena()); ?></strong></p>
        
        <p>
            <label for="egoera">Eskariaren egoera berria:</label><br>
            <select name="egoera" id="egoera">
                <?php 
                $egoerak = ['Prestatzen', 'Bidalita', 'Entregatua'];
                foreach ($egoerak as $opt): 
                    $selected = ($eskaria->getEgoera() == $opt) ? 'selected' : '';
                ?>
                    <option value="<?php echo $opt; ?>" <?php echo $selected; ?>><?php echo $opt; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <button type="submit" name="aldatu">Gorde Egoera Berria</button>
        <a href="../index.php">Utzi</a>
    </form>
</body>
</html>