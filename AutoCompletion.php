<?php
require_once('./AutoCompletionCPVille.class.php');

//Initialisation de la liste pour l'ajax
$list = array();

//Connexion à la BDD
try
{
    $db = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}

//Construction de la requete SQL
$strQuery = "SELECT CP CodePostal, nom_ville Ville FROM Ville_france WHERE ";
if (isset($_POST["codePostal"]))
{
    $strQuery .= "CP LIKE :codePostal ";
}
else
{
    $strQuery .= "nom_ville LIKE :ville ";
}

//Limite maxRows
if (isset($_POST["maxRows"]))
{
    $strQuery .= "LIMIT 0, :maxRows";
}
$query = $db->prepare($strQuery);
if (isset($_POST["codePostal"]))
{
    $value = $_POST["codePostal"]."%";
    $query->bindParam(":codePostal", $value, PDO::PARAM_STR);
}

//Limite maxRows
if (isset($_POST["maxRows"]))
{
    $valueRows = intval($_POST["maxRows"]);
    $query->bindParam(":maxRows", $valueRows, PDO::PARAM_INT);
}

//execute request et conversion en JSON
$query->execute();

$list = $query->fetchAll(PDO::FETCH_CLASS, "AutoCompletionCPVille");;

echo json_encode($list);
?>