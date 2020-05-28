<?php
session_start();

$guid = bin2hex(random_bytes(16));
header("location:page-accueil-renseignement.php/fic?q=".$guid);

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
    <?php echo " le guid = ",$_SESSION['guid']; ?>
</body>
</html>