<?php

//fonction création GUID
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

//fonction de Generation de mail
function makeEmail() {
    $characters = "abcdefghijklmnopqrstuvwxyz";
    $strEmail = "";
    for ($i = 0; $i < 8; $i++) {
        $randNum = rand(0, strlen($characters) - 1);
        $strEmail .= $characters[$randNum];
      }
      return $strEmail;
}

//variable
$mailClient = makeEmail()."@gmail.com";
$guid = GUID();
$_POST['guid'] = $guid;
$_POST['mailClient'] = $mailClient;

//création cookie
if(isset($_POST['guid']) || isset($_POST['mailClient']))
{
    setcookie('guid', $guid, time() + 1800, '/');
    setcookie('mailClient', $mailClient, time() + 1800, '/');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Générateur lien personnel</title>
</head>
<body>
    <p>Mail du Client : <?php echo $mailClient;?></p>
    <p>Lien perso : <a href="<?php echo "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.php/fic?q=".$guid ?>"> <?php echo "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.php/fic?q=".$guid ?></a> </p>
</body>
</html>