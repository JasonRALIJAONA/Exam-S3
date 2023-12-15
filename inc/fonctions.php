<?php
include_once("connexion.php");

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

function refrech(){

    // Get the PDO connection
    $pdo = mySQLconnection();

    $sql="DELETE FROM trans";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

}

function insertAleat($debut,$range,$ligneAchat,$minAchat,$maxAchat,$ligneVente,$minVente,$maxVente) {
    $prixbase=getPrixInitial();
    
    $aleatVente=rand($minVente , $maxVente);
    
    // Get the PDO connection
    $pdo = mySQLconnection();
    
    for ($i=0; $i <$range ; $i++) {
        
        //boucle pour chaque devise
        for ($d=1; $d <=3 ; $d++) { 
            $qteTtotal=0;
            $produit=0;
            
            //Insertion ligne achat 
            for ($j=0; $j <$ligneAchat ; $j++) { 
                $sql="INSERT INTO trans VALUES (NULL , '%s' , 'ACHAT' , '%d' , '%d' , '%d')";
                
                //prix aleatoire
                $tempPrix=$prixbase[d-1]['prixInitial'];
                $min=$prixbase -  ($prixbase * 0.02);
                $max=$prixbase + ($prixbase * 0.1);
                $tempPrix=rand($min , $max);
                

                //quantite aleatoire
                $aleatAchat=rand($minAchat , $maxAchat);

                $produit=$produit+($tempPrix*$aleatAchat);

                $qteTtotal=$qteTtotal+$aleatAchat;

                $sql=sprintf($sql,$debut,$tempPrix,$aleatAchat,$d);

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

            }
            
            //insertion ligne vente
            for ($k=0; $k <$ligneVente ; $k++) { 
                $sql="INSERT INTO trans VALUES (NULL , '%s' , 'VENTE' , '%d' , '%d' , '%d')";
                
                //prix aleatoire
                $tempPrix=$prixbase[d-1]['prixInitial'];
                $min=$prixbase -  ($prixbase * 0.1);
                $max=$prixbase + ($prixbase * 0.02);
                $tempPrix=rand($min , $max);
                

                //quantite aleatoire
                $aleatVente=rand($minVente , $maxVente);
                $qteTtotal=$qteTtotal+$aleatVente;

                $produit=$produit+($tempPrix*$aleatVente);

                $sql=sprintf($sql,$debut,$tempPrix,$aleatVente,$d);

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            
            $prixbase[d-1]['prixInitial']=$produit/$qteTtotal;
        }


        $debut=prochainJour($debut);
    }

}

?>