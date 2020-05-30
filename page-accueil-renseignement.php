<?php

$guid_perso = $_COOKIE['guid']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil de renseignement</title>
    <link rel="stylesheet" type="text/css" href="/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.css"/>
</head>
<body>
    <!--En-tête du formulaire-->
    <div class="en-tete">
        <div class="logo">
            <img src="/AP2019--Groupe3--ProjetWeb-ConnectLife/img/logo.PNG">
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
        <p>Bonjour ! </p>
            <p>Nous venons de migrer nos fichiers clients vers une base de données.</p>
            <p>Pour cela, nous vous prions de remplir le formulaire pour que nous puissions y enregistrer toutes vos coordonnées.</p>
            <p>Pour ce dérangement, nous vous offrons un dédommagement avec ce CODE PROMO -10% sur votre prochaine commande, que vous recevrez suite à l'envoi du Formulaire.</p>

            <p>Vous pouvez accéder au formulaire <a href="<?php echo "/AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-particulier.php/fic?q=",$guid_perso; ?>" > 
            Particulier</a> ou <a href="<?php echo "/AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-professionnel.php/fic?q=",$guid_perso; ?>" > Professionnel </a>
        </p>
    </div>
</body>
</html>