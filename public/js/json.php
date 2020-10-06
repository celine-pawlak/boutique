<?php
    $bdd = new PDO("mysql:host=localhost;dbname=boutique", 'root', '');
    $requete = "SELECT * FROM produits";
    $allProducts = $bdd->query($requete)->fetchAll();
        
    echo $jsoned = json_encode($allProducts);    
?>