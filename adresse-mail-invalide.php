<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adresse mail Invalide</title>
    <link rel="stylesheet" type="text/css" href="/AP2019--Groupe3--ProjetWeb-ConnectLife/adresse-mail-invalide.css">
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
        <p>Nous sommes désolés <?php echo $_SESSION['nom'] .' '. $_SESSION['prenom'] ; ?>, votre Adresse mail est diffèrent de celui inscrit dans notre fichier client.</p>
        <p>Veuillez saisir l'adresse mail dans laquelle vous avez reçu notre formulaire.</p>
        <!--Retour à la page precedente-->
        <p>Vous pouvez retourner au formulaire <a href="<?php echo $_SERVER['HTTP_REFERER'];?>"> ici</a></p> 
        <P>Veuillez contacter le service de Mass-mailing pour des informations complémentaires.</p>
    </div>
</body>
</html>