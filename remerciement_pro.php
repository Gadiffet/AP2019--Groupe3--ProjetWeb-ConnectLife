<?php  
//demarrage sessions et var
session_start();

$guid = $_COOKIE['guid'];
$nom_client = $_SESSION['nom'];
$prenom_client = $_SESSION['prenom'];
$mail_client = $_SESSION['email'];
$nom_societe = $_SESSION['nom_societe'];
$poste_occupe = $_SESSION['poste_occupe']; 
$adresse_1 = $_SESSION['adresse_1'];
$adresse_2 = $_SESSION['adresse_2'];
$tel_societe = $_SESSION['telephone_societe'];
$tel_direct = $_SESSION['telephone_directe'];
$CP = $_SESSION['CP'];
$nom_ville = $_SESSION['nom_ville'];
$sexe = $_SESSION['sexe'];  

// connection à la BDD
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch (PDOException $e) {
        throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());
        exit;
    }

// requête SQL
$req = $pdo->prepare('INSERT INTO client_pro(GUID, sexe, nom, prenom, nom_societe, poste_occupe, adresse_1, adresse_2, CP, nom_ville, telephone_societe, telephone_directe, email) VALUES(:GUID, :sexe, :nom, :prenom, :nom_societe, :poste_occupe, :adresse_1, :adresse_2, :CP, :nom_ville, :telephone_societe, :telephone_directe, :email)');
// execute SQL
$req->execute(array(
    'GUID' => $guid,
    'sexe' => $sexe,
    'nom' => $nom_client,
    'prenom' => $prenom_client,
    'nom_societe' => $nom_societe,
    'poste_occupe' => $poste_occupe,
    'adresse_1' => $adresse_1,
    'adresse_2' => $adresse_2,
    'CP' => $CP,
    'nom_ville' => $nom_ville,
    'telephone_societe' => $tel_societe,
    'telephone_directe' => $tel_direct,
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
                <?php
                    echo($guid); 
                    echo($nom_client);
                    echo($prenom_client);
                    echo($mail_client);
                    echo($nom_societe);
                    echo($poste_occupe);
                    echo($adresse_1);
                    echo($adresse_2);
                    echo($tel_societe);
                    echo($tel_direct);
                    echo($CP);
                    echo($nom_ville);
                    echo($sexe);
                ?>
        Merci de votre confiance !

        Voici votre CODE PROMO de 10% : C4DR-D4RJE-FR7Y
    </div>
</body>
</html>