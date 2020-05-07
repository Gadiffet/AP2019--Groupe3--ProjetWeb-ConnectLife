<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['prenom']) || isset($_POST['prenom']) 
|| isset($_POST['prenom']) || isset($_POST['prenom']) || isset($_POST['prenom']) || isset($_POST['prenom'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['nom_societe'] = $_POST['nom_societe'];
        $_SESSION['poste_occupe'] = $_POST['poste_occupe'];
        $_SESSION['adresse'] = $_POST['adresse'];
        $_SESSION['adresse_2'] = $_POST['adresse_2'];
        $_SESSION['portable_societe'] = $_POST['portable_societe'];
        $_SESSION['portable_perso'] = $_POST['portable_perso'];
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
        <div class="civilité">
                Civilité :
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
                Nom <input type="text" name="nom" value=" <?php if (isset($_SESSION['nom'])){echo $_SESSION['nom'];} ?>" >
            </div>
            <div class="input">
                Prenom <input type="text" name="prenom" value=" <?php if (isset($_SESSION['prenom'])){echo $_SESSION['prenom'];} ?>">
            </div>
            <div class="input">
                Nom de la société <input type="text" name="nom_societe" value=" <?php if (isset($_SESSION['nom_societe'])){echo $_SESSION['nom_societe'];} ?>">
            </div>
            <div class="input">
                Poste occupé <input type="text" name="poste_occupe" value=" <?php if (isset($_SESSION['poste_occupe'])){echo $_SESSION['poste_occupe'];} ?>">
            </div>        
            <div class="input">
                Adresse1 <input type="text" name="adresse" value=" <?php if (isset($_SESSION['adresse'])){echo $_SESSION['adresse'];} ?>">
            </div>
            <div class="input">
                Adresse2 <input type="text" name="adresse_2" value=" <?php if (isset($_SESSION['adresse_2'])){echo $_SESSION['adresse_2'];} ?>">
            </div>
            <div class="input">
                Code Postale <input type="text" name="code_postal">
            </div>
            <div class="input selection">
                Ville <input type="text" name="ville">
            </div>
            <div class="input">
                Téléphone Société <input type="text" name="portable_societe" value=" <?php if (isset($_SESSION['portable_societe'])){echo $_SESSION['portable_societe'];} ?>">
            </div>
            <div class="input">
                Téléphone Directe <input type="text" name="portable_perso" value=" <?php if (isset($_SESSION['portable_perso'])){echo $_SESSION['portable_perso'];} ?>">
            </div>
            <div class="input">
                Mail <input type="text" name="mail">
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