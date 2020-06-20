<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="XMLNewClient.css">
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
        GENERATION DU FICHIER XML
    </div>
</body>
</html>

<!--Generation XML Clients (Nouveau) avec le DOMDocument -->
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    //On prend les clients qui ont comme valeur exported = 0
    $r = $pdo->query('SELECT * FROM clients WHERE exported = 0');

    $xmlFile = new DOMDocument('1.0', 'utf-8');
    $xmlFile->xmlStandalone = false;
    $implementation = new DOMImplementation();
    $dtd = $implementation->createDocumentType('clients', '', 'Totalclients.dtd');
    $xmlFile = $implementation->createDocument("", "", $dtd);
    $xmlFile->appendChild($clients = $xmlFile->createElement('clients'));

    while($rs = $r->fetch(PDO::FETCH_ASSOC)){
            $clients->appendChild($personne = $xmlFile->createElement('personne'));
            $personne->setAttribute('GUID', $rs['GUID']);
            $personne->appendChild($xmlFile->createElement('nom', $rs['nom']));
            $personne->appendChild($xmlFile->createElement('email', $rs['email']));
            $personne->appendChild($xmlFile->createElement('professionel', $rs['is_societe']));
            //On ajoute la valeur 1 a Export
            $r = 'UPDATE connectlife.clients SET exported = 1 WHERE id=:id';
        }

    $xmlFile->formatOutput = true;
    $xmlFile->save('NouveauxClients.xml');
?>