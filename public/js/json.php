<?php
    $bdd = new PDO("mysql:host=localhost;dbname=boutique", 'root', '');
    $requete = "SELECT * FROM produits";
    $allProducts = $bdd->query($requete)->fetchAll(PDO::FETCH_ASSOC);    
        
    echo $jsoned = json_encode($allProducts);    
?>