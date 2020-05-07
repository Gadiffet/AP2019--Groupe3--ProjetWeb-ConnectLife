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
            <div class="civilité">
                <div class="text">
                Civilité :
                </div>
                <div class="checkbox">
                    <div class="checkbox-Madame">
                        <input type="checkbox" class="checkbox-box"> Madame
                    </div>
                    <div class="checkbox-Monsieur">
                        <input type="checkbox" class="checkbox-box"> Monsieur
                    </div>
                </div>
            </div>
            <div class="input">
                <div class="text">
                Nom : 
                </div>
                <input type="text" name="nom">
            </div>
            <div class="input">
                <div class="text">
                Prenom : 
                </div>
                <input type="text" name="prenom">
            </div>
            <div class="input">
                <div class="text">
                Adresse1 : 
                </div>
                <input type="text" name="adresse">
            </div>
            <div class="input">
                <div class="text">
                Adresse2 : 
                </div>
                <input type="text" name="adresse_2">
            </div>
            <div class="input">
                <div class="text">
                    Code Postale : 
                </div>
                <input type="int" name="code_postal">
            </div>
            <div class="input">
                <div class="text">
                    Ville :
                </div>
                <select>
                    <option value="ville">
                </select>
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Fixe : 
                </div>
                <input type="int" name="portable_fixe">
            </div>
            <div class="input">
                <div class="text">
                Téléphone Portable : 
                </div>
                <input type="int" name="portable_perso">
            </div>
            <div class="input">
                <div class="text">
                    Mail: 
                </div>
                <input type="text" name="mail">
            </div>
        </div>
        <!--Validation-->
        <div onclick="validation()" class="validation">
            <input type="submit" value="Valider" placeholder="valider" class="valider"/>
        </div>
    </form>
</body>
</html>

<script>
    function validation() {
        window.alert("Nous avons pris en compte votre formulaire ! Vous allez etre redirigé")
    }
</script>