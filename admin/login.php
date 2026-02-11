<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Produktuak</title>
    </head>
    <body>
        <h1>Administrazio gunea</h1>
        <p><?php echo $mezua ?></p>
        <form action="" method="post">
            <p>
                <label for="erabiltzailea">erabiltzailea</label>
                <input type="text" id="erabiltzailea" name="erabiltzailea">
            </p>
            <p>
                <label for="pasahitza">pasahitza</label>
                <input type="password" id="pasahitza" name="pasahitza">
            </p>
            <p>
                <input type="submit" name="sartu" value="sartu">
            </p>
        </form>
    </body>
</html>