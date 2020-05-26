<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom'])|| isset($_POST['adresse_1']) || isset($_POST['email']) 
|| isset($_POST['adresse_2']) || isset($_POST['telephone_fixe']) || isset($_POST['telephone_portable']) || isset($_POST['is_societe'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['adresse_1'] = $_POST['adresse_1'];
        $_SESSION['adresse_2'] = $_POST['adresse_2'];
        $_SESSION['telephone_fixe'] = $_POST['telephone_fixe'];
        $_SESSION['telephone_portable'] = $_POST['telephone_portable'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['is_societe'] = $_POST['is_societe'];
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
                        <input type="checkbox" id="madame" class="checkbox-box" onclick="verificationCheckboxMadame()"> Madame
                    </div>
                    <div class="checkbox-Monsieur">
                        <input type="checkbox" id="monsieur" class="checkbox-box" onclick="verificationCheckboxMonsieur()"> Monsieur
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
                    Téléphone Fixe* : 
                </div>
                <input type="text" id="telephone_fixe" name="telephone_fixe" oninput="validationInputTelephoneFixe()" value=" <?php if (isset($_SESSION['telephone_fixe'])){echo $_SESSION['telephone_fixe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Portable* : 
                </div>
                <input type="text" id="telephone_portable" name="telephone_portable" oninput="validationInputTelephonePortale()" value=" <?php if (isset($_SESSION['telephone_portable'])){echo $_SESSION['telephone_portable'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Email*: 
                </div>
                <input type="text" id="email" name="email" oninput="validationInputemail()">
            </div>
        </div>
        <div class="champ">
            *: Champ à saisie obligatoire
        </div>
        <div style="visibility:hidden;">
            <input type="checkbox" name="is_societe" checked=checked value=0 />
        </div>

        <!--Validation-->
        <div class="validation">
            <input type="submit" value="Valider" onclick="validation()" placeholder="valider" class="valider"/>
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

    function validationInputTelephoneFixe() {
        let input = document.querySelector('#telephone_fixe');
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

    function validationInputTelephonePortable() {
        let input = document.querySelector('#telephone_perso');
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

    function validationInputemail() {
        let input = document.querySelector('#email');
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

    function verificationCheckboxMadame() {
    	document.querySelector('#monsieur').checked = false;
    }
      function verificationCheckboxMonsieur() {
    	document.querySelector('#madame').checked = false;
    }
</script>