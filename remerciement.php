<?php  
session_start();


$guid = $_SESSION['guid'];
$Nomclient = $_SESSION['nom'];
$mailclient = $_SESSION['email'];
$societe = $_SESSION['is_societe'];

try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch(PDOException $e){
    echo 'erreur de connexion à la BDD';
    }

$req = $pdo->prepare('INSERT INTO clients(GUID, nom, email, is_societe) VALUES(:GUID, :nom, :email, :is_societe)');
$req->execute(array(
    'GUID' => $guid,
    'nom' => $Nomclient,
    'email' => $mailclient,
    'is_societe' => $societe,
));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Merci</title>
    <link rel="stylesheet" type="text/css" href="/projetweb/remerciement.css">
</head>
<body>
    <!--En-tête du formulaire-->
    <div class="en-tete">
        <div class="logo">
            <img src="/projetweb/img/logo.PNG">
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
    </div>
</body>
</html>