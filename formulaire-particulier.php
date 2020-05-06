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
    <link rel="stylesheet" type="text/css" href="formulaire-particulier.css">
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
                Nom <input type="text" name="nom" value=" <?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" >
            </div>
            <div class="input">
                Prenom <input type="text" name="prenom" value=" <?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
            </div>
            <div class="input">
                Adresse1 <input type="text" name="adresse" value=" <?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>">
            </div>
            <div class="input">
                Adresse2 <input type="text" name="adresse_2" value=" <?php if (isset($_POST['adresse_2'])){echo $_POST['adresse_2'];} ?>">
            </div>
            <div class="input">
                Code Postale <input type="text" name="code_postal">
            </div>
            <div class="input selection">
                Ville <input type="text" name="ville">
            </div>
            <div class="input">
                Téléphone Société <input type="text" name="portable_societe" value=" <?php if (isset($_POST['portable_societe'])){echo $_POST['portable_societe'];} ?>">
            </div>
            <div class="input">
                Téléphone Directe <input type="text" name="portable_perso" value=" <?php if (isset($_POST['portable_perso'])){echo $_POST['portable_perso'];} ?>">
            </div>
            <div class="input">
                Mail <input type="text" name="mail">
            </div>
        </div>
        <!--Validation-->
        <div class="validation">
            <input type="submit" value="Valider" />
        </div>
        <a href="adresse-mail-invalide.php" > ICI </a>
    </form>
</body>
</html>