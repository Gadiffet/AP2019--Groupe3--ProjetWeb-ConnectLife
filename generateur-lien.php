<?php
session_start();

$guid = bin2hex(random_bytes(16));

$_POST['guid'] = $guid;

if(isset($_POST['guid']))
{
    $_SESSION['guid'] = $_POST['guid'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Générateur lien personnel</title>
</head>
<body>
    <?php echo "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.php/fic?q=".$guid ?>
</body>
</html>