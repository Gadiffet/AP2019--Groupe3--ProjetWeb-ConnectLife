<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['nom_societe']) || isset($_POST['poste_occupe']) || isset($_POST['email']) 
|| isset($_POST['adresse_1']) || isset($_POST['adresse_2']) || isset($_POST['telephone_societe']) || isset($_POST['telephone_directe']) || isset($_POST['is_societe'])) 
{
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['nom_societe'] = $_POST['nom_societe'];
        $_SESSION['poste_occupe'] = $_POST['poste_occupe'];
        $_SESSION['adresse_1'] = $_POST['adresse_1'];
        $_SESSION['adresse_2'] = $_POST['adresse_2'];
        $_SESSION['telephone_societe'] = $_POST['telephone_societe'];
        $_SESSION['telephone_directe'] = $_POST['telephone_directe'];
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
    <link rel="Stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" />
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
                <div id="nomValidation"></div>
                <input type="text" id="nom" name="nom" oninput="validationInputNom()" value=" <?php if (isset($_SESSION['nom'])){echo $_SESSION['nom'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Prenom* : 
                </div>
                <div id="prenomValidation"></div>
                <input type="text" id="prenom" name="prenom" oninput="validationInputPrenom()" value=" <?php if (isset($_SESSION['prenom'])){echo $_SESSION['prenom'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Nom de la société* : 
                </div>
                <div id="nom_societeValidation"></div>
                <input type="text" id="nom_societe" name="nom_societe" oninput="validationInputNomSociete()" value=" <?php if (isset($_SESSION['nom_societe'])){echo $_SESSION['nom_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Poste occupé* : 
                </div>
                <div id="poste_occupeValidation"></div>
                <input type="text" id="poste_occupe" name="poste_occupe" oninput="validationInputPosteOccupe()" value=" <?php if (isset($_SESSION['poste_occupe'])){echo $_SESSION['poste_occupe'];} ?>">
            </div>   
            <div class="input">
                <div class="text">
                    Adresse1* : 
                </div>
                <div id="adresse_1Validation"></div>
                <input type="text" id="adresse_1" name="adresse_1" oninput="validationInputAdresse1()" value=" <?php if (isset($_SESSION['adresse_1'])){echo $_SESSION['adresse_1'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Adresse2 : 
                </div>
                <div id="adresse_2Validation"></div>
                <input type="text" id="adresse_2" name="adresse_2" oninput="validationInputAdresse2()" value=" <?php if (isset($_SESSION['adresse_2'])){echo $_SESSION['adresse_2'];} ?>">
            </div>
            <div class="input">
                <form action="#">
                    <div class="text">
                        Code Postal* : 
                    </div>
                    <input type="text" id="CP" name="CP" size="6">
                    <div class="text">
                        Ville* :
                    </div>
                    <input type="text" id="nom_ville" name="nom_ville">
                </form>
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Société* : 
                </div>
                <div id="telephone_societeValidation"></div>
                <input type="text" id="telephone_societe" name="telephone_societe" oninput="validationInputTelephoneSociete()" value=" <?php if (isset($_SESSION['telephone_societe'])){echo $_SESSION['telephone_societe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Directe* : 
                </div>
                <div id="telephone_directeValidation"></div>
                <input type="text" id="telephone_directe" name="telephone_directe" oninput="validationInputTelephoneDirecte()" value=" <?php if (isset($_SESSION['telephone_directe'])){echo $_SESSION['telephone_directe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    mail*: 
                </div>
                <div id="emailValidation"></div>
                <input type="text" id="email" name="email" oninput="validationInputmail()">
            </div>
        </div>
        <div class="champ">
            *: Champ à saisie obligatoire
        </div>
        <div style="visibility:hidden;">
            <input type="checkbox" name="is_societe" checked=checked value=1 />
        </div>
        <!--Validation-->
        <div class="validation">
            <input type="submit" value="Valider" onclick="validation()" placeholder="valider" class="valider"/>
        </div>
    </form>
</body>
</html>

<script>
 
    $(function ()
    {
        $("#CP, #nom_ville").autocomplete({
            source: function (request, response)
            {
                var objData = {};
                if ($(this.element).attr('id') == 'CP')
                {
                    objData = { codePostal: request.term, maxRows: 500};
                }

                $.ajax({
                url: "./AutoCompletion.php",
                dataType: "json",
                data: objData,
                type: 'POST',
                success: function (data)
                {
                    response($.map(data, function (item)
                    {

                        return {
                            label: item.CodePostal + ", " + item.Ville,
                            value: function ()
                            {
                                if ($(this).attr('id') == 'CP')
                                {
                                    $('#nom_ville').val(item.Ville);
                                    return item.CodePostal;
                                }
                            }
                        }
                    }));
                }
                });
            },
            minLength: 3,
            delay: 600
        });
    });

    function validationInputNom() {
        let input = document.querySelector('#nom');
        let value = input.value; 
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#nomValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#nomValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#nomValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputPrenom() {
        let input = document.querySelector('#prenom');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#prenomValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#prenomValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#prenomValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputNomSociete() {
        let input = document.querySelector('#nom_societe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#nom_societeValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#nom_societeValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("nom_societeValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputPosteOccupe() {
        let input = document.querySelector('#poste_occupe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("poste_occupeValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("poste_occupeValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("poste_occupeValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputAdresse1() {
        let input = document.querySelector('#adresse_1');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#adresse_1Validation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#adresse_1Validation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#adresse_1Validation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputAdresse2() {
        let input = document.querySelector('#adresse_2');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#adresse_2Validation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des lettres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#adresse_2Validation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#adresse_2Validation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationInputTelephoneSociete() {
        let input = document.querySelector('#telephone_societe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#telephone_societeValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#telephone_societeValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#telephone_persoValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement 10 Chiffres (Caractères autorisés : Chiffres, \"-\", \".\" ou Espace)";
        }
    }

    function validationInputTelephoneDirecte() {
        let input = document.querySelector('#telephone_directe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#telephone_directeValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#telephone_directeValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#telephone_directeValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement 10 Chiffres (Caractères autorisés : Chiffres, \"-\", \".\" ou Espace)";
        }
    }

    function validationInputmail() {
        let input = document.querySelector('#email');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#emailValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des caractère autoriser et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^[0-9a-zA-ZÀ-ú\-. ]*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#emailValidation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#emailValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement \"@\" ainsi qu'un domaine (Caractères autorisés : de a-z, de A-Z, Chiffres, \"-\", \".\", \"@\")";
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