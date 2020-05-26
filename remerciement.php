<?php  
session_start();

$Nomclient = $_SESSION['nom'];
$emailclient = $_SESSION['email'];
$societe = $_SESSION['is_societe'];


try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch(PDOException $e){
    echo 'erreur de connexion à la BDD';
    }

$request = $pdo->prepare('INSERT INTO (GUID, nom, email, is_societe) VALUES (:uuid() ,:nom, :email, :is_societe');

$request->bindValue(':uuid', '', PDO::PARAM_STR);
$request->bindValue(':nom', $Nomclient, PDO::PARAM_STR);
$request->bindValue(':email', $emailclient, PDO::PARAM_STR);
$request->bindValue(':is_societe', $societe, PDO::PARAM_BOOL);

$insertintoBDD = $request->execute();   

if ($insertintoBDD){
    $message = 'Le contact est enregistré';
}
else{
    $message = 'Echec de l\'enregistrement';
}

echo 'is societe = ',$_SESSION['is_societe']

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

    <p> <?php echo $message ?> </p>
</body>
</html>