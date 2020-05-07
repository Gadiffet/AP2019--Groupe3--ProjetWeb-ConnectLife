<?php
$pdo = new PDO('mysql:host=localhost;dbname=projetweb','root','');

function ajouterClient{
$request = $pdo->prepare("INSERT INTO client VALUES (uuid() ,:nom, :mail, :is_societe)");

   $request->execute([
        ":nom"=> $_POST["nom"],        
        ":mail"=> $_POST["mail"],
        // ":is_societe"=>
        )]

        // INSERT INTO clients values(uuid(), 'nom', 'mail', true or false);
}
