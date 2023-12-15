<?php
include_once("connexion.php");

function insererAleat ($dateAchat,$produit,$prixUnitaire,$quantite){
    $sql="INSERT INTO achat VALUES (NULL,'%s','%s','%d','%d')";
    $sql=sprintf($sql,$dateAchat,$produit,$prixUnitaire,$quantite);

    // Get the PDO connection
    $pdo = mySQLconnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

?>