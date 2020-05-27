<?php  
session_start();

$Nomclient = $_SESSION['nom'];
$mailclient = $_SESSION['email'];
$societe = $_SESSION['is_societe'];

$guid = bin2hex(random_bytes(16));

try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch(PDOException $e){
    echo 'erreur de connexion à la BDD';
    }

$req = $pdo->prepare('INSERT INTO clients(GUID, nom, email, is_societe) VALUES(:GUID, :nom, :email, :is_societe)');
$req->execute(array(
    'GUID' => $guid,
    'nom' => $_SESSION['nom'],
    'email' => $_SESSION['email'],
    'is_societe' => $_SESSION['is_societe'],
));

echo 'le mec est cool et enregistré';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Merci</title>
    <link rel="stylesheet" type="text/css" href="remerciement.css">
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
    <!--Message-->
    <div class="text">
        Merci de votre confiance !
    </div>
</body>
</html>