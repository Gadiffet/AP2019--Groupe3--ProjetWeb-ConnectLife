<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="XMLTotalClient
.css">
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

<!--Generation XML Clients (Total) avec le DOMDocument -->
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');
    $r = $pdo->query('SELECT * FROM clients');

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
    }

    $xmlFile->formatOutput = true;
    $xmlFile->save('TotalClients.xml');
?>