<?php
$pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');

function ajouterParticulier{
$request = $pdo->prepare("INSERT into clients (nom, prenom, adresse, adresse_2, code_postal, ville, portable_fixe, portable_perso, mail ) values (:nom, :prenom, :adresse, :adresse_2, :ville, :portable_fixe, :portable_perso, :mail )");

   $request->execute([
        ":nom"=> $_POST["nom"],
        ":prenom"=> $_POST["prenom"],
        ":adresse"=> $_POST["adresse"],
        ":adresse_2"=> $_POST["adresse_2"],
        ":code_postal"=> $_POST["code_postal"],
        ":ville"=> $_POST["ville"],
        ":portable_fixe"=> $_POST["portable_fixe"],
        ":portable_perso"=> $_POST["portable_perso"],
        ":mail"=> $_POST["mail"],
        )]


       select @i:=uuid();
	update clients set GUID = (@i:=uuid());
}


function ajouterProfessionnel {
$request = $pdo->prepare("INSERT into clients (nom, prenom, nom_societe, poste_occupe, adresse, adresse_2, code_postal, ville, portable_societe, portable_direct, mail ) values (:nom, :prenom, :nom_societe, :poste_occupe, :adresse, :adresse_2, :ville, :portable_societe, :portable_direct, :mail )");

   $request->execute([
        ":nom"=> $_POST["nom"],
        ":prenom"=> $_POST["prenom"],
        ":poste_occupe"=> $_POST["poste_occupe"],
        ":nom_societe"=> $_POST["nom_societe"],
        ":adresse"=> $_POST["adresse"],
        ":adresse_2"=> $_POST["adresse_2"],
        ":code_postal"=> $_POST["code_postal"],
        ":ville"=> $_POST["ville"],
        ":portable_societe"=> $_POST["portable_societe"],
        ":portable_direct"=> $_POST["portable_direct"],
        ":mail"=> $_POST["mail"],
        )]

    select @i:=uuid();
	update clients set GUID = (@i:=uuid());

}
