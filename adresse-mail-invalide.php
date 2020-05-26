<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adresse email Invalide</title>
    <link rel="stylesheet" type="text/css" href="adresse-email-invalide.css">
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
    <div class="text">
        <p>Nous sommes désolés <?php echo $_SESSION['nom'] .' '. $_SESSION['prenom'] ; ?>, votre Adresse email est invalide.</p>

        <p>Vous pouvez retourner au formulaire <a href="formulaire-particulier.php"> ici</a></p>

        <P>Veuillez contacter le service de Mass-emailing pour des informations complémentaires.</p>
    </div>
</body>
</html>