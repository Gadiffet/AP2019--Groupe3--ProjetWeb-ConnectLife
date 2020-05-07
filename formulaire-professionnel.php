<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['nom_societe']) || isset($_POST['poste_occupe']) 
|| isset($_POST['adresse']) || isset($_POST['adresse_2']) || isset($_POST['portable_societe']) || isset($_POST['portable_perso'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['nom_societe'] = $_POST['nom_societe'];
        $_SESSION['poste_occupe'] = $_POST['poste_occupe'];
        $_SESSION['adresse'] = $_POST['adresse'];
        $_SESSION['adresse_2'] = $_POST['adresse_2'];
        $_SESSION['portable_societe'] = $_POST['portable_societe'];
        $_SESSION['portable_directe'] = $_POST['portable_directe'];
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
                <input type="text" name="nom" value=" <?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" >
            </div>
            <div class="input">
                <div class="text">
                    Prenom : 
                </div>
                <input type="text" name="prenom" value=" <?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Nom de la société : 
                </div>
                <input type="text" name="nom_societe" value=" <?php if (isset($_SESSION['nom_societe'])){echo $_SESSION['nom_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Poste occupé : 
                </div>
                <input type="text" name="poste_occupe" value=" <?php if (isset($_SESSION['poste_occupe'])){echo $_SESSION['poste_occupe'];} ?>">
            </div>   
            <div class="input">
                <div class="text">
                    Adresse1 : 
                </div>
                <input type="text" name="adresse" value=" <?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Adresse2 : 
                </div>
                <input type="text" name="adresse_2" value=" <?php if (isset($_POST['adresse_2'])){echo $_POST['adresse_2'];} ?>">
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
                    Téléphone Société : 
                </div>
                <input type="text" name="portable_societe" value=" <?php if (isset($_SESSION['portable_societe'])){echo $_SESSION['portable_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Directe : 
                </div>
                <input type="text" name="portable_perso" value=" <?php if (isset($_SESSION['portable_directe'])){echo $_SESSION['portable_perso'];} ?>">
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