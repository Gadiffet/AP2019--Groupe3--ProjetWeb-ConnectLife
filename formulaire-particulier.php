<?php 
session_start();

if(isset($_POST['nom']) || isset($_POST['prenom'])|| isset($_POST['adresse_1']) || isset($_POST['email']) || isset($_POST['adresse_2']) || isset($_POST['telephone_fixe']) || isset($_POST['telephone_portable']) || isset($_POST['is_societe'])) 
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

$guid_perso = $_COOKIE['guid']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="/AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-particulier.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
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

    <!--Formulaire-->
    <form action="#" method="post">
        <div class="formulaire" onclick="validationTotal()">
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
                    <div class="text">
                        Code Postal* : 
                    </div>
                    <div id="CPValidation"></div>
                    <input type="text" id="CP" name="CP" size="6">
                </div>
                <div class="input">
                    <div class="text">
                        Ville* :
                    </div>
                    <div id="nom_villeValidation"></div>
                    <input type="text" id="nom_ville" name="nom_ville">
                </div>
            <div class="input">
                <div class="text">
                    Téléphone Fixe* : 
                </div>
                <div id="telephone_fixeValidation"></div>
                <input type="text" id="telephone_fixe" name="telephone_fixe" oninput="validationInputTelephoneFixe()" value=" <?php if (isset($_SESSION['telephone_fixe'])){echo $_SESSION['telephone_fixe'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Téléphone Portable* : 
                </div>
                <div id="telephone_portableValidation"></div>
                <input type="text" id="telephone_portable" name="telephone_portable" oninput="validationInputTelephonePortable()" value=" <?php if (isset($_SESSION['telephone_portable'])){echo $_SESSION['telephone_portable'];} ?>">
            </div>
            <div class="input">
                <div class="text">
                    Email*: 
                </div>
                <div id="emailValidation"></div>
                <input type="text" id="email" name="email" oninput="validationInputmail()">
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
            <input type="submit" value="Valider" onclick="validationFormulaire()" placeholder="valider" class="valider"/>
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
                url: "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/AutoCompletion.php",
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

function validationFormulaire(){
        if (validationCheckbox() || validationInputNom() || validationInputPrenom() || validationInputAdresse1() || validationCodePostale() || validationInputTelephoneFixe() || validationInputTelephonePortable() || validationInputmail() == 1)
            {
                return false;
            }
            else{
                setTimeout(function redirection() {
                    window.location.href='<?php echo "/AP2019--Groupe3--ProjetWeb-ConnectLife/remerciement.php/fic?q=",$guid_perso; ?>';
                    },1);
                alert("Nous avons pris en compte votre formulaire ! Vous allez etre redirigé");
            }

    }

    function validationTotal(){
        validationCheckbox();
        validationCodePostale();
        validationInputmail();
    }

    function validationCheckbox() {
        let madame = document.querySelector('#madame');
        let monsieur = document.querySelector('#monsieur');
        let checkboxMadame = document.querySelector('.checkbox-Madame');
        let checkboxMonsieur = document.querySelector('.checkbox-Monsieur');
        if (madame.checked || monsieur.checked == true){
            checkboxMadame.dataset.state = 'valid';
            checkboxMonsieur.dataset.state = 'valid';
            return 0 ;
        }
        else {
            checkboxMadame.dataset.state = 'invalid';
            checkboxMonsieur.dataset.state = 'invalid';
            return 1 ;
        }
    }

    function verificationCheckboxMadame() {
    	document.querySelector('#monsieur').checked = false;
    }
      function verificationCheckboxMonsieur() {
    	document.querySelector('#madame').checked = false;
    }

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
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#nomValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
            return 1 ;
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
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#prenomValidation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
            return 1 ;
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
        let letters = /^[0-9a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#adresse_1Validation").innerHTML = "Correct!";
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#adresse_1Validation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
            return 1 ;
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
        let letters = /^[0-9a-zA-ZÀ-ú\- ]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#adresse_2Validation").innerHTML = "Correct!";
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#adresse_2Validation").innerHTML = "Incorrect! (Caractères autorisés : de a-z, de A-Z, Accents, \"-\" et les Espaces)";
        }
    }

    function validationCodePostale() {
        let input = document.querySelector('#CP');
        let input2 = document.querySelector('#nom_ville');
        let value = input.value;
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#CPValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que des chiffres
        let trimmed = value.trim();
        let letters = /^[0-9]+$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            input2.dataset.state = 'valid';
            document.querySelector("#CPValidation").innerHTML = "Correct!";
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            input2.dataset.state = 'invalid';
            document.querySelector("#CPValidation").innerHTML = "Incorrect!";
            return 1 ;
        }
    }

    function validationInputTelephoneFixe() {
        let input = document.querySelector('#telephone_fixe');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#telephone_fixeValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#telephone_fixeValidation").innerHTML = "Correct!";
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#telephone_fixeValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement 10 Chiffres (Caractères autorisés : Chiffres, \"-\", \".\" ou Espace)";
            return 1 ;
        }
    }

    function validationInputTelephonePortable() {
        let input = document.querySelector('#telephone_portable');
        let value = input.value;
        //Permet de "reset" l'input pour enlever le rouge ou vert
        if (!value) {
            input.dataset.state = '';
            document.querySelector("#telephone_portableValidation").innerHTML = "";
            return;
        }

        //On verifie qu'il y a que les chiffres, et on supprimer les espaces de la verification
        let trimmed = value.trim();
        let letters = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(trimmed.match(letters)){
            input.dataset.state = 'valid';
            document.querySelector("#telephone_portableValidation").innerHTML = "Correct!";
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#telephone_portableValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement 10 Chiffres (Caractères autorisés : Chiffres, \"-\", \".\" ou Espace)";
            return 1 ;
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
            return 0 ;
        }
        else {
            input.dataset.state = 'invalid';
            document.querySelector("#emailValidation").innerHTML = "Incorrect! Vous devez avoir obligatoirement \"@\" ainsi qu'un domaine (Caractères autorisés : de a-z, de A-Z, Chiffres, \"-\", \".\", \"@\")";
            return 1 ;
        }
    }

</script>