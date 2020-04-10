<?php 
session_start();

if(isset($_POST['nom']) && isset($_POST['prenom'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="formulaire-professionnel.css">
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
    <br/>
    <br/>

    <!--Formulaire-->
    <form action="" method="post">
        <div class="formulaire">
            <div class="checkbox">
                Civilité
                <input type="checkbox"> Madame
                <input type="checkbox"> Monsieur
            </div>
            <div class="input">
                Nom <input type="text" name="nom">
            </div>
            <div class="input">
                Prenom <input type="text" name="prenom">
            </div>
            <div class="input">
                Nom de la société <input type="text" name="nom_societe">
            </div>
            <div class="input">
                Poste occupé <input type="text" name="poste_occupe">
            </div>        
            <div class="input">
                Adresse1 <input type="text" name="adresse">
            </div>
            <div class="input">
                Adresse2 <input type="text" name="adresse_2">
            </div>
            <div class="input">
                Code Postale <input type="text" name="code_postal">
            </div>
            <div class="input selection">
                Ville <input type="text" name="ville">
            </div>
            <div class="input">
                Téléphone Société <input type="text" name="portable_societe">
            </div>
            <div class="input">
                Téléphone Directe <input type="text" name="portable_perso">
            </div>
            <div class="input">
                Mail <input type="text" name="mail">
            </div>
        </div>
        <!--Validation-->
        <div class="validation">
            <input type="submit" value="Valider" />
        </div>
    </form>
</body>
</html>