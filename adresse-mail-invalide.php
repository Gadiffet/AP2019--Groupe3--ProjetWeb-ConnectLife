<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adresse Mail Invalide</title>
    <link rel="stylesheet" type="text/css" href="adresse-mail-invalide.css">
</head>
<body>
    <!--En-tête du formulaire-->
    <div class="en-tete">
        <div class="logo">
            <img src="img/logo.PNG">
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
    <div class="formulaire">
        Nous sommes désolés <?php echo $_SESSION['nom'] .' '. $_SESSION['prenom'] ; ?>, votre Adresse Mail est invalide.

        Vous pouvez retourner au formulaire <a href="formulaire-professionnel.php"> ici </a> (Le formulaire doit rester saisie donc utiliser Session)

        Veuillez contacter le service de Mass-Mailing pour des informations complémentaires.
    </div>
</body>
</html>