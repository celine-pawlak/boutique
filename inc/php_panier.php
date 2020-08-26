<?php   
    $bdd = App::getDatabase();    
    Session::getInstance();

    $produitPanier = $bdd->query('SELECT produits.nom, prix, image_path, quantite, panier.id FROM panier INNER JOIN produits ON panier.id_produit = produits.id WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetchAll();       
    
?>