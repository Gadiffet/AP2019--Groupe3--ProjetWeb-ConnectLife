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
//variable
$guid = GUID();
$_POST['guid'] = $guid;

//création cookie
if(isset($_POST['guid']))
{
    setcookie('guid', $guid, time() + 1800, '/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Générateur lien personnel</title>
</head>
<body>
    <p> lien perso <a href="<?php echo "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.php/fic?q=".$guid ?>"> <?php echo "http://localhost/AP2019--Groupe3--ProjetWeb-ConnectLife/page-accueil-renseignement.php/fic?q=".$guid ?></a> </p>
</body>
</html>