// sesioneas ->/*

session_start();


// Saioa guztiz amaitu
session_destroy();

// Hasierako orrira birbideratu
header("Location: index.php");
exit; */
<?php
setcookie("erabiltzailea","",time()-3600);
header("location: index.php");
?>