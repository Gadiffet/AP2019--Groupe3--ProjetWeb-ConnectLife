<?php
//recupération guid
$guid_perso = $_COOKIE['guid']; 

if ($guid_perso === null)
{
    header('Location: /AP2019--Groupe3--ProjetWeb-ConnectLife/lien-inconnu.php');
}   

// connection à la BDD
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    }
catch(PDOException $e){
    echo 'erreur de connexion à la BDD';
    }

// requete SQL récupération GUID
$guid_bdd = $pdo->prepare('SELECT GUID FROM clients');
$guid_bdd->execute();

$resultatguid = $guid_bdd->fetchAll(PDO::FETCH_ASSOC);

$nombreval = $pdo->prepare('SELECT COUNT(GUID) FROM clients');
$nombreval->execute();
	  
$nombreguid = $nombreval->fetch();
$count = $nombreguid[0];

for ($i = 0; $i < $count; $i++)
{
    if ($guid_perso == implode($resultatguid[$i]))
    {
        header('Location: /AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-deja-renseigne.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil de renseignement</title>
    <link rel="stylesheet" type="text/css" href="/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.css"/>
</head>
<body>
    <!--En-tête du formulaire-->
    <div class="en-tete">
        <div class="logo">
            <img src="/AP2019--Groupe3--ProjetWeb-ConnectLife/img/logo.PNG">
        </div>
        <div class="titre">
        <?php 
        ?>
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
        <p>Bonjour ! </p>
            <p>Nous venons de migrer nos fichiers clients vers une base de données.</p>
            <p>Pour cela, nous vous prions de remplir le formulaire pour que nous puissions y enregistrer toutes vos coordonnées.</p>
            <p>Pour ce dérangement, nous vous offrons un dédommagement avec ce CODE PROMO -10% sur votre prochaine commande, que vous recevrez suite à l'envoi du Formulaire.</p>
            <p>Vous pouvez accéder au formulaire <a href="<?php echo "/AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-particulier.php/fic?q=",$guid_perso; ?>" > 
            Particulier</a> ou <a href="<?php echo "/AP2019--Groupe3--ProjetWeb-ConnectLife/formulaire-professionnel.php/fic?q=",$guid_perso; ?>" > Professionnel </a></p>
    </div>
</body>
</html>