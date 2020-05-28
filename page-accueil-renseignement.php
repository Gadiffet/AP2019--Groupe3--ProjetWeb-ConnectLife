<?php
session_start();

$guid_perso = $_SESSION['guid']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil de renseignement</title>
    <link rel="stylesheet" type="text/css" href="/projetweb/page-accueil-renseignement.css"/>
</head>
<body>
    <!--En-tête du formulaire-->
    <div class="en-tete">
        <div class="logo">
            <img src="/projetweb/img/logo.PNG">
        </div>
        <div class="titre">
            <div class="nom-entreprise">
                ConnectLife
            </div>
            <div class="slogan">
                Que la force vous guide
            </div>
        </div>
    </div>
    <!--Message-->
    <div class="text">
        <p>Bonjour !</p>
            <p>Pouvez vous renseigner vos coordonées !</p>
            <p>Vous pouvez accéder au formulaire <a href="<?php echo "/projetweb/formulaire-particulier.php/fic?q=",$guid_perso; ?>" > 
            Particulier</a> ou <a href="<?php echo "/projetweb/formulaire-professionnel.php/fic?q=",$guid_perso; ?>" > Professionnel </a>
        </p>
    </div>
</body>
</html>