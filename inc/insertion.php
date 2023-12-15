<?php
include_once("fonctions.php");

$debut=$_POST['dateAction'];
$range=$_POST['nbJour'];
$ligneAchat=$_POST['nbAchat'];
$minAchat=$_POST['minAchat'];
$maxAchat=$_POST['maxAchat'];
$ligneVente=$_POST['nbVente'];
$minVente=$_POST['minVente'];
$maxVente=$_POST['maxVente'];

insertAleat($debut,$range,$ligneAchat,$minAchat,$maxAchat,$ligneVente,$minVente,$maxVente);

echo json_encode(true);

?>