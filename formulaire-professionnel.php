<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['nom_societe']) || isset($_POST['poste_occupe']) 
|| isset($_POST['adresse_1']) || isset($_POST['adresse_2']) || isset($_POST['telephone_societe']) || isset($_POST['telephone_directe'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['nom_societe'] = $_POST['nom_societe'];
        $_SESSION['poste_occupe'] = $_POST['poste_occupe'];
        $_SESSION['adresse_1'] = $_POST['adresse_1'];
        $_SESSION['adresse_2'] = $_POST['adresse_2'];
        $_SESSION['telephone_societe'] = $_POST['telephone_societe'];
        $_SESSION['telephone_directe'] = $_POST['telephone_directe'];
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

    <!--Formulaire-->
    <form action="" method="post">
        <div class="formulaire">
            <div class="civilité">
                <div class="text">
                    Civilité* :
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
                    Nom* : 
                </div>
                <input type="text" id="nom" name="nom" oninput="validationInputNom()" value=" <?php if (isset($_SESSION['nom'])){echo $_SESSION['nom'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Prenom* : 
                </div>
                <input type="text" id="prenom" name="prenom" oninput="validationInputPrenom()" value=" <?php if (isset($_SESSION['prenom'])){echo $_SESSION['prenom'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Nom de la société* : 
                </div>
                <input type="text" id="nom_societe" name="nom_societe" oninput="validationInputNomSociete()" value=" <?php if (isset($_SESSION['nom_societe'])){echo $_SESSION['nom_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Poste occupé* : 
                </div>
                <input type="text" id="poste_occupe" name="poste_occupe" oninput="validationInputPosteOccupe()" value=" <?php if (isset($_SESSION['poste_occupe'])){echo $_SESSION['poste_occupe'];} ?>">
            </div>   
            <div class="input">
                <div class="text">
                    Adresse1* : 
                </div>
                <input type="text" id="adresse_1" name="adresse_1" oninput="validationInputAdresse1()" value=" <?php if (isset($_SESSION['adresse_1'])){echo $_SESSION['adresse_1'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Adresse2 : 
                </div>
                <input type="text" id="adresse_2" name="adresse_2" oninput="validationInputAdresse2()" value=" <?php if (isset($_SESSION['adresse_2'])){echo $_SESSION['adresse_2'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Code Postale* : 
                </div>
                <input type="int" name="code_postale">
            </div>
            <div class="input">
                <div class="text">
                    Ville* :
                </div>
                <select>
                    <option value="ville" name="ville">
                </select>
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Société* : 
                </div>
                <input type="text" id="telephone_societe" name="telephone_societe" oninput="validationInputTelephoneSociete()" value=" <?php if (isset($_SESSION['telephone_societe'])){echo $_SESSION['telephone_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Directe* : 
                </div>
                <input type="text" id="telephone_directe" name="telephone_directe" oninput="validationInputTelephoneDirecte()" value=" <?php if (isset($_SESSION['telephone_directe'])){echo $_SESSION['telephone_directe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    EMail*: 
                </div>
                <input type="text" id="mail" name="mail" oninput="validationInputMail()">
            </div>
        </div>
        <div class="champ">
            *: Champ à saisie obligatoire
        </div>
        <div style="visibility:hidden;">
            <input type="checkbox" name="is_societe"/>
        </div>
        <!--Validation-->
        <div onclick="validation()" class="validation">
            <input type="submit" value="Valider" placeholder="valider" class="valider"/>
        </div>
    </form>
</body>
</html>

<script>
    function validationInputNom() {
        let input = document.querySelector('#nom');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputPrenom() {
        let input = document.querySelector('#prenom');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputAdresse1() {
        let input = document.querySelector('#adresse_1');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z0-9\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputNomSociete() {
        let input = document.querySelector('#nom_societe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z0-9\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputPosteOccupe() {
        let input = document.querySelector('#poste_occupe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputAdresse2() {
        let input = document.querySelector('#adresse_2');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-Z0-9\-]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputTelephoneSociete() {
        let input = document.querySelector('#telephone_societe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputTelephoneDirecte() {
        let input = document.querySelector('#telephone_directe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validationInputMail() {
        let input = document.querySelector('#mail');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
        }
        else {
            input.dataset.state = 'invalid';
        }
    }

    function validation() {
        setTimeout(function redirection() {
            window.location.href='remerciement.php';
            },1);
        alert("Nous avons pris en compte votre formulaire ! Vous allez etre redirigé");
    }
</script>