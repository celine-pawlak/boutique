<?php
    $bdd = new PDO("mysql:host=localhost;dbname=boutique", 'root', '');
    $requete = "SELECT nom, image_path FROM produits";
    $allProducts = $bdd->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($allProducts);
