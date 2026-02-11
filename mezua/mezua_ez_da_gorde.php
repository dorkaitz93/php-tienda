<p style="color: red; font-weight: bold;">Errorea: Mezua ezin izan da gorde.</p>

<table cellspacing="5" cellpadding="5" border="1" style="border-collapse: collapse;">
    <tr>
        <td align="right" style="background-color: #f2f2f2;"><strong>Izena:</strong></td>
        <td><?php echo htmlspecialchars($izena); ?></td>
    </tr>
    <tr>
        <td align="right" style="background-color: #f2f2f2;"><strong>Email:</strong></td>
        <td><?php echo htmlspecialchars($email); ?></td>
    </tr>
    <tr>
        <td align="right" style="background-color: #f2f2f2;"><strong>Mezua:</strong></td>
        <td><?php echo htmlspecialchars($mezuaTextua); ?></td>
    </tr>
</table>

<form action="index.php" method="get">
    <p>
        <input type="submit" value="Saiatu berriro">
    </p>
</form>