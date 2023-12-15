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

function getPrixInitial(){
    $sql="SELECT * FROM devise";

    // Get the PDO connection
    $pdo = mySQLconnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all rows as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;    
}

function prochainJour($dateString) {
    $date = new DateTime($dateString);

    // Ajoute un jour à la date
    $date->add(new DateInterval('P1D'));

    // Retourne la nouvelle date sous forme de chaîne
    return $date->format('Y-m-d');
}

function insertAleat($debut,$range,$ligneAchat,$minAchat,$maxAchat,$ligneVente,$minVente,$maxVente) {
    $prixbase=getPrixInitial();
    
    $aleatAchat=rand($minAchat , $maxAchat);
    $aleatVente=rand($minVente , $maxVente);

    // Get the PDO connection
    $pdo = mySQLconnection();

    for ($i=0; $i <$range ; $i++) {

        //Insertion ligne achat 
        for ($j=0; $j <$ligneAchat ; $j++) { 
            
        }
        
        //insertion ligne vente
        for ($k=0; $k <$ligneVente ; $k++) { 
            # code...
        }

        $debut=prochainJour($debut);
    }

}

?>