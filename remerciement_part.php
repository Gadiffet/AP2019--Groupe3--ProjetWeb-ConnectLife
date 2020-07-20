<?php  
//demarrage sessions et var
session_start();

$guid = $_COOKIE['guid'];
$nom_client = $_SESSION['nom'];
$prenom_client = $_SESSION['prenom'];
$mail_client = $_SESSION['email'];
$adresse_1 = $_SESSION['adresse_1'];
$adresse_2 = $_SESSION['adresse_2'];
$tel_fixe = $_SESSION['telephone_fixe'];
$tel_portable = $_SESSION['telephone_portable'];
$CP = $_SESSION['CP'];
$nom_ville = $_SESSION['nom_ville'];
$sexe = $_SESSION['sexe']; 

// connection à la BDD
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch(PDOException $e)
    {
        throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());
        exit;
    }

// requête SQL
$req = $pdo->prepare('INSERT INTO client_particulier (GUID, sexe, nom, prenom, adresse_1, adresse_2, CP, nom_ville, telephone_fixe, telephone_portable, email) VALUES(:GUID, :sexe, :nom, :prenom, :adresse_1, :adresse_2, :CP, :nom_ville, :telephone_fixe, :telephone_portable, :email)');
// execute SQL
$req->execute(array(
    'GUID' => $guid,
    'sexe' => $sexe,
    'nom' => $nom_client,
    'prenom' => $prenom_client,
    'adresse_1' => $adresse_1,
    'adresse_2' => $adresse_2,
    'CP' => $CP,
    'nom_ville' => $nom_ville,
    'telephone_fixe' => $tel_fixe,
    'telephone_portable' => $tel_portable,
    'email' => $mail_client,
));

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Merci</title>
    <link rel="stylesheet" type="text/css" href="/AP2019--Groupe3--ProjetWeb-ConnectLife/remerciement.css">
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
    <!--Message-->
    <div class="text">
        Merci de votre confiance !

        Voici votre CODE PROMO de 10% : C4DR-D4RJE-FR7Y
    </div>
</body>
</html>